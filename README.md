# DoaTEC

Sistema web para organizar campanhas de doação. Campanha piloto: **Campanha do Agasalho**.
Projeto de Curricularização da Extensão — 4º semestre de ADS, Fatec Araraquara (Programação Web + Banco de Dados).

Quem quer doar vê o que está faltando, quanto já foi recebido e onde entregar. Quem organiza confirma o que chegou ao ponto de coleta. **Só a quantidade efetivamente recebida entra no total arrecadado.**

- PHP procedural (sem orientação a objetos) + MySQL/MariaDB
- Bootstrap 5 com a paleta do Figma
- Três perfis: Doador, Organizador e Administrador

---

## Como rodar (ambiente de desenvolvimento)

1. Instale o XAMPP e deixe o projeto em `C:\xampp\htdocs\DoaTEC`.
2. Copie `config.exemplo.php` para `config.php` e coloque a senha do seu MySQL (o `config.php` não vai para o GitHub).
3. Ligue Apache e MySQL no painel do XAMPP.
4. Abra `http://localhost/DoaTEC/`.

> Instalação do banco e credencial do primeiro acesso: **a fazer (Pessoa 2 / Pessoa 1)** quando o `database/doatec.sql` existir.

---

## Divisão do trabalho: quem faz cada pasta

Cada pessoa mexe **só na sua pasta**. Todo arquivo já vem com três partes nos comentários:

1. **Prompt para IA** — texto pronto para colar numa IA, explicando exatamente o que fazer.
2. **Contexto** — para que o arquivo serve e com o que ele se liga.
3. **#ToDo** — checklist para ir marcando.

### ✅ Já está pronto (não precisa mexer)

| Arquivo | O que faz |
|---|---|
| `includes/iniciar.php` | Primeira linha de toda página: config, sessão, conexão `db()` e todas as funções |
| `includes/seguranca.php` | `e()`, `senha_hash()`, `entrar()`, `sair()`, `exigir_perfil()`, `mensagem()`, `ir_para()` |
| `includes/componentes.php` | Botões, imagem da campanha, badges de status, barra de progresso, aviso de lista vazia, link de ordenar |
| `includes/header.php` / `footer.php` | Topo e rodapé iguais em todas as páginas |
| `includes/painel.php` | Painel único: bloco da campanha igual para todos + botões e seção conforme o perfil |
| `index.php` | Página inicial e painel de todo mundo |
| `assets/css/estilo.css` | Paleta do Figma (cores e fonte) |
| `assets/js/app.js` | Confirmação antes de enviar formulário |

---

### 👤 Enzo — pasta `usuarios/`

**O que faz:** login, cadastro, troca de senha e a tela onde o admin promove alguém a Organizador ou Admin.

| Arquivo | O que fazer |
|---|---|
| `login.php` | Tela igual ao Figma (duas colunas) |
| `cadastro.php` | Nome, e-mail e senha. **Sem campo de cargo**: toda conta nasce Doador |
| `senha.php` | Alterar a própria senha |
| `perfis.php` | Lista de usuários ordenável + trocar perfil (só o admin vê) |
| `processar_usuario.php` | Recebe todos os formulários da pasta |
| `funcoes.php` / `repository.php` | Regras / SQL |

**Também cuida de:** este README, o GitHub e o pacote final da entrega.
**Pronto quando:** os 3 perfis entram e saem, o cadastro nunca cria admin e um doador não consegue abrir `perfis.php`.

---

### 🛠️ Pedro Riva — pasta `admin/` + banco

**O que faz:** o banco de dados e tudo o que o administrador cadastra.

| Arquivo | O que fazer |
|---|---|
| `database/doatec.sql` | Tabelas, a view do total e o admin inicial — **fazer primeiro, todo mundo depende disso** |
| `campanha.php` | Criar e editar campanha (título, descrição, local, horário, datas) |
| `itens.php` | Itens e metas da campanha |
| `secao_painel.php` | Tabela de campanhas no painel, com Editar, Itens e Pausar/Reabrir |
| `processar_admin.php` | Recebe todos os formulários da pasta |
| `funcoes.php` / `repository.php` | Regras / SQL |

**Entrega para os outros:** `campanha_atual()` e `campanha_aberta()`.
**Também cuida de:** o diagrama do banco (brModelo) e o relatório da entrega.
**Pronto quando:** o script roda num banco vazio, o admin cadastra tudo pela tela e campanha pausada bloqueia novas doações.

---

### 💚 Arthur — pasta `doador/` + visual

**O que faz:** tudo o que o doador vê e faz, e o visual do site.

| Arquivo | O que fazer |
|---|---|
| `doar.php` | Escolher o item e a quantidade |
| `secao_painel.php` | "Minhas doações", com botão de cancelar nas pendentes |
| `processar_doador.php` | Recebe todos os formulários da pasta |
| `funcoes.php` / `repository.php` | Regras / SQL |
| `assets/css/estilo.css` e `includes/componentes.php` | Dona do visual: se alguém precisar de cor ou componente novo, pede para a P3 |

**Também cuida de:** o manual com prints (cada pessoa manda os prints das próprias telas).
**Pronto quando:** o doador registra e cancela só as próprias doações pendentes, e o total não muda até o organizador confirmar.

---

### 📦 Rhyan — pasta `organizador/`

**O que faz:** confirmar as entregas, a imagem da campanha e o relatório.

| Arquivo | O que fazer |
|---|---|
| `secao_painel.php` | Entregas pendentes com "Confirmar recebimento" + enviar/trocar/remover a imagem |
| `relatorio.php` | Relatório ordenável por nome ou pelo que mais falta |
| `processar_organizador.php` | Recebe todos os formulários da pasta |
| `funcoes.php` / `repository.php` | Regras / SQL |
| `uploads/.htaccess` | Proteção da pasta de imagens |

**Entrega para os outros:** `total_por_item()` — a **única** função que calcula o total. O painel e o relatório usam ela.
**Também cuida do:** vídeo do YouTube.
**Pronto quando:** passar no teste dos cobertores (abaixo).

---

## 📏 Regras para todo mundo

1. **Página** = HTML + PHP pequeno. **`processar_*.php`** = recebe o formulário e verifica a permissão. **`funcoes.php`** = regras. **`repository.php`** = SQL.
2. Toda página começa assim:
   ```php
   require __DIR__ . '/../includes/iniciar.php';
   exigir_perfil('ADMIN'); // quem pode abrir
   ```
3. **Nunca escreva cor na página.** Use as classes do `estilo.css` (`btn-primary`, `.rotulo`, `.text-destaque`, `.painel-verde`...).
4. Repetiu em 2 páginas? Vira função no `includes/componentes.php`.
5. Funções do `repository.php` começam com `repo_` (os nomes não podem se repetir entre pastas).
6. **Só a quantidade RECEBIDA conta no total.** Ninguém soma quantidades na tela: use `total_por_item()`.
7. Uma branch por tarefa, e alguém do grupo revisa antes de juntar na `main`.

## 🎨 Paleta do Figma

| Cor | Hex | Uso |
|---|---|---|
| Verde | `#1B4A40` | Botão principal, painel verde, links |
| Verde escuro | `#143A32` | Rodapé, hover |
| Laranja | `#F2A469` | Destaque em títulos |
| Laranja forte | `#D9772B` | Rótulos em caixa alta |
| Creme | `#F5F3EE` | Fundo |
| Texto / texto suave | `#1F2B28` / `#5E6B66` | Textos |
| Borda | `#E3E0D8` | Bordas e campos |

Fonte: **DM Sans**. Os valores ficam só em `assets/css/estilo.css` — se mudar no Figma, muda lá.

## 🧪 Teste dos cobertores (todo mundo junto, no final)

1. Meta de 50 cobertores, 12 já recebidos.
2. Alguém promete 3 → **continua 12**.
3. Entrega 2 e o organizador confirma → **vira 14**.
4. Clica em confirmar de novo → **continua 14**.
5. Painel e relatório mostram **14 recebidos e 36 faltando**.

## ⏭️ Ordem de trabalho

1. **P2 faz o `database/doatec.sql` primeiro.** Enquanto isso, os outros montam o HTML das telas.
2. P2 entrega `campanha_atual()` e P4 entrega `total_por_item()` → o painel ganha vida.
3. Cada um termina a própria pasta.
4. Teste dos cobertores → prints → manual → vídeo → entrega.
