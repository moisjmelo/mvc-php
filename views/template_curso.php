<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php BASE_URL; ?>/assets/css/template.css" />
    <link rel="stylesheet" href="<?php BASE_URL; ?>/assets/cursos/css/cursos.css" />
    <title>simulai</title>
</head>

<body>
    <div class="header">
        <div class="center">
            <div class="about-header">
                <div class="title">Portal de simuladores</div>
                <?php if (!empty($viewData['info'])) { ?>
                    <a href="<?php echo BASE_URL ?>login/logout">
                        <div class="logout">Sair</div>
                    </a>
                    <div class="user"><?php echo utf8_encode($viewData['info']->getNome()); ?></div>

                <?php } ?>


            </div>

        </div>

        <nav class="menu-header" style="margin-top: 3px;">
            <ulli id="item1"><a href="<?php echo BASE_URL; ?>home">Home</a></ulli>
            <ulli id="item2"><a href="<?php echo BASE_URL; ?>cursos/">cursos</a></ulli>
            <ulli id="item3"><a href="<?php echo BASE_URL; ?>urnaeletronica">Urna Eletronica</a></ulli>
            <ulli id="item4"><a href="<?php echo BASE_URL; ?>conversaodolar">converte dolar</a></ulli>
            <ulli id="item5"><a href="<?php echo BASE_URL; ?>provadetran">Prova Detran</a></ulli>
        </nav>
    </div>
    <div class="container">
        <?php $this->loadViewIntemplate($viewName, $viewData); ?>
    </div>
    <script type="text/javascript" src="<?php BASE_URL; ?>/assets/jquery/jquery.js"></script>
    <script type="text/javascript" src="<?php BASE_URL; ?>/assets/js/teste.js"></script>
    <script type="text/javascript" src="<?php BASE_URL; ?>/assets/cursos/js/curso.js"></script>
</body>

</html>