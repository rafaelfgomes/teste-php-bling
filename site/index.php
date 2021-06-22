<!DOCTYPE html>

<html lang="pt-br">

    <? require_once 'partials/head.php'; ?>

    <body>

        <div class="title">
            <h2>Teste PHP Bling</h2>
        </div>
        
        <div class="content">

            <?php foreach ( range(1, 7) as $page ): ?>

                <p>Teste <?= $page; ?>: <a href="pages/exerc<?= $page; ?>/result.php">Ir para o teste <?= $page; ?></a></p>

            <?php endforeach; ?>

        </div>

        <? require_once 'partials/footer.php'; ?>

    </body>

</html>