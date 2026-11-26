/*
 * DoaTEC — assets/js/app.js
 * Dono: Pessoa 3 · PRONTO (carregado pelo footer.php em todas as páginas)
 *
 * Só conforto de uso. Nenhuma regra ou segurança mora aqui: o PHP valida tudo.
 */

document.addEventListener('submit', function (evento) {
    var form = evento.target;

    // Formulários com data-confirmar="texto" pedem confirmação antes de enviar
    // (o botao_acao() de componentes.php usa isso em Cancelar, Remover, Pausar).
    var pergunta = form.getAttribute('data-confirmar');
    if (pergunta && !window.confirm(pergunta)) {
        evento.preventDefault();
        return;
    }

    // Desabilita o botão depois do clique para não enviar duas vezes.
    var botoes = form.querySelectorAll('button[type="submit"]');
    botoes.forEach(function (botao) {
        setTimeout(function () { botao.disabled = true; }, 0);
    });
});
