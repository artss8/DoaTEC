<?php
/*
 * DoaTEC — includes/footer.php
 * Dono: Pessoa 1 · PRONTO
 * Rodapé idêntico em todas as páginas (exigência do enunciado), no visual
 * do Figma: logo à esquerda, frase no meio, créditos à direita.
 */
?>
</main>

<footer class="rodape-doatec py-4 mt-auto">
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between gap-2 small">
        <span class="logo-doatec fs-5 fw-bold text-white">Doa<span class="tec">TEC</span></span>
        <span>Conectando solidariedade e comunidade.</span>
        <span>&copy; <?= date('Y') ?> Fatec Araraquara</span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= e(BASE_URL) ?>/assets/js/app.js"></script>
</body>
</html>
