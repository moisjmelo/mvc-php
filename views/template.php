<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/template.css" />
    <title>Código e Cia</title>
</head>

<body>
    <div class="header">
        <div class="about-header">
            <div class="header_icon">
                <img id="header_icon" src="/images/template/banner_cod.png" alt="banner" />
            </div>
            <div class="title">Plataforma de cursos</div>

            <nav class="menu-header">
                <a href="<?php echo BASE_URL; ?>home">
                    <ulli id="item1">
                        <p>Home</p>
                    </ulli>
                </a>
                <a href="<?php echo BASE_URL; ?>cursos/">
                    <ulli id="item2">
                        <p>Cursos</p>
                </a></ulli>
                <a href="<?php echo BASE_URL; ?>institucional">
                    <ulli id="item3">
                        <p>Institucioal</p>
                </a></ulli>
            </nav>
            <div class="menu-mobile">
                <img id="menu-mobile-image" src="/images/template/menu_mobile.png" alt="menu_mobile" />
                <div class="nav-mobile">
                    <a href="<?php echo BASE_URL; ?>home">
                        <ulli id="item1">
                            <p>Home</p>
                        </ulli>
                    </a>
                    <a href="<?php echo BASE_URL; ?>cursos/">
                        <ulli id="item2">
                            <p>Cursos</p>
                    </a></ulli>
                    <a href="<?php echo BASE_URL; ?>institucional">
                        <ulli id="item3">
                            <p>Institucioal</p>
                    </a></ulli>
                </div>
            </div>

            <?php if (!empty($viewData['info'])) { ?>
                <div class="user">
                    <p><?php echo utf8_encode($viewData['info']->getNome()); ?>eu jose</p>
                </div>
                <a href="<?php echo BASE_URL ?>login/logout">
                    <div class="logout">
                        <p>Sair</p>
                    </div>
                </a>


            <?php } ?>


        </div>


    </div>
    <div class="container">
        <?php $this->loadViewIntemplate($viewName, $viewData); ?>
    </div>

    <div class="footer">
        <div class="footer-container">
            <div class="footer_icon">
                <img id="footer_icon" src="/images/template/banner_foot.png" alt="banner" />
            </div>
            <p>Todos os direitos reservados</p>
        </div>
    </div>
    <script type="text/javascript" src="/assets/jquery/jquery.js"></script>
    <script type="text/javascript" src="/assets/js/template.js"></script>
</body>

</html>