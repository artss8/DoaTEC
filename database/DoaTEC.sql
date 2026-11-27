-- MySQL 8.0.16+; instalação limpa. Não executar sobre o esquema antigo.
CREATE DATABASE IF NOT EXISTS doatec CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE doatec;
CREATE TABLE tb_usuarios (
 id_usuario INT AUTO_INCREMENT PRIMARY KEY,
 nome_usuario VARCHAR(100) NOT NULL,
 email_usuario VARCHAR(150) NOT NULL UNIQUE,
 senha_hash VARCHAR(255) NOT NULL,
 perfil_usuario ENUM('DOADOR','ORGANIZADOR','ADMIN') NOT NULL DEFAULT 'DOADOR',
 dt_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
CREATE TABLE tb_campanhas (
 id_campanha INT AUTO_INCREMENT PRIMARY KEY,
 titulo_campanha VARCHAR(120) NOT NULL,
 descricao_campanha TEXT,
 img_campanha VARCHAR(64),
 dt_inicio DATE NOT NULL,
 dt_fim DATE,
 status_campanha ENUM('ATIVA','PAUSADA','ENCERRADA') NOT NULL DEFAULT 'ATIVA',
 CHECK (dt_fim IS NULL OR dt_fim >= dt_inicio)
) ENGINE=InnoDB;
CREATE TABLE tb_itens (
 id_item INT AUTO_INCREMENT PRIMARY KEY,
 nome_item VARCHAR(80) NOT NULL,
 unidade_medida VARCHAR(30) NOT NULL DEFAULT 'Unidade',
 descricao_item TEXT,
 ativo BOOLEAN NOT NULL DEFAULT TRUE,
 UNIQUE (nome_item, unidade_medida)
) ENGINE=InnoDB;
CREATE TABLE tb_pontos_entrega (
 id_ponto INT AUTO_INCREMENT PRIMARY KEY,
 nome_ponto VARCHAR(100) NOT NULL,
 endereco_ponto VARCHAR(200) NOT NULL,
 ativo BOOLEAN NOT NULL DEFAULT TRUE,
 UNIQUE (nome_ponto, endereco_ponto)
) ENGINE=InnoDB;
CREATE TABLE tb_campanha_itens (
 id_campanha INT NOT NULL,
 id_item INT NOT NULL,
 meta_item DECIMAL(12,3) NOT NULL CHECK (meta_item > 0),
 PRIMARY KEY (id_campanha,id_item),
 FOREIGN KEY (id_campanha) REFERENCES tb_campanhas(id_campanha),
 FOREIGN KEY (id_item) REFERENCES tb_itens(id_item)
) ENGINE=InnoDB;
CREATE TABLE tb_campanha_pontos (
 id_campanha INT NOT NULL,
 id_ponto INT NOT NULL,
 horario_entrega VARCHAR(150) NOT NULL,
 instrucoes_entrega TEXT,
 PRIMARY KEY (id_campanha,id_ponto),
 FOREIGN KEY (id_campanha) REFERENCES tb_campanhas(id_campanha),
 FOREIGN KEY (id_ponto) REFERENCES tb_pontos_entrega(id_ponto)
) ENGINE=InnoDB;
CREATE TABLE tb_campanha_organizadores (
 id_campanha INT NOT NULL,
 id_usuario INT NOT NULL,
 PRIMARY KEY (id_campanha,id_usuario),
 FOREIGN KEY (id_campanha) REFERENCES tb_campanhas(id_campanha),
 FOREIGN KEY (id_usuario) REFERENCES tb_usuarios(id_usuario)
) ENGINE=InnoDB;
CREATE TABLE tb_doacoes (
 id_doacao INT AUTO_INCREMENT PRIMARY KEY,
 id_usuario INT NOT NULL,
 id_campanha INT NOT NULL,
 id_item INT NOT NULL,
 id_ponto INT NOT NULL,
 qtd_prometida DECIMAL(12,3) NOT NULL CHECK (qtd_prometida > 0),
 qtd_recebida DECIMAL(12,3),
 status_doacao ENUM('PENDENTE','RECEBIDA','CANCELADA') NOT NULL DEFAULT 'PENDENTE',
 dt_intencao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
 dt_recebimento DATETIME,
 id_recebedor INT,
 dt_cancelamento DATETIME,
 FOREIGN KEY (id_usuario) REFERENCES tb_usuarios(id_usuario),
 FOREIGN KEY (id_recebedor) REFERENCES tb_usuarios(id_usuario),
 FOREIGN KEY (id_campanha,id_item) REFERENCES tb_campanha_itens(id_campanha,id_item),
 FOREIGN KEY (id_campanha,id_ponto) REFERENCES tb_campanha_pontos(id_campanha,id_ponto),
 CHECK (
 (status_doacao='PENDENTE' AND qtd_recebida IS NULL AND dt_recebimento IS NULL AND id_recebedor IS NULL AND dt_cancelamento IS NULL)
 OR (status_doacao='RECEBIDA' AND qtd_recebida IS NOT NULL AND qtd_recebida > 0 AND dt_recebimento IS NOT NULL AND dt_recebimento >= dt_intencao AND id_recebedor IS NOT NULL AND dt_cancelamento IS NULL)
 OR (status_doacao='CANCELADA' AND qtd_recebida IS NULL AND dt_recebimento IS NULL AND id_recebedor IS NULL AND dt_cancelamento IS NOT NULL AND dt_cancelamento >= dt_intencao)
 )
) ENGINE=InnoDB;
CREATE VIEW vw_arrecadacao_item AS
SELECT ci.id_campanha,ci.id_item,i.nome_item,i.unidade_medida,ci.meta_item,
 COALESCE(SUM(CASE WHEN d.status_doacao='RECEBIDA' THEN d.qtd_recebida END),0) AS qtd_arrecadada,
 COALESCE(SUM(CASE WHEN d.status_doacao='PENDENTE' THEN d.qtd_prometida END),0) AS qtd_a_caminho,
 GREATEST(ci.meta_item-COALESCE(SUM(CASE WHEN d.status_doacao='RECEBIDA' THEN d.qtd_recebida END),0),0) AS qtd_faltante
FROM tb_campanha_itens ci JOIN tb_itens i ON i.id_item=ci.id_item
LEFT JOIN tb_doacoes d ON d.id_campanha=ci.id_campanha AND d.id_item=ci.id_item
GROUP BY ci.id_campanha,ci.id_item,i.nome_item,i.unidade_medida,ci.meta_item;
