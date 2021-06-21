

<nav>

    <ul>
        <li class="logo"><a href="/parimeikerWeb/"><img src="/parimeikerWeb/assets/images/logo.png"></a> </li>
       
            <form action="/parimeikerWeb/view/pesquisa.php" method="GET" class="form-pesquisa">
            <div class="search-box">
            <input class="search-txt" type="search" placeholder="Pesquise" name="search" autocomplete="off">
                <a class="search-btn">
                    <i class="fas fa-search"></i>
                </a>
                </div>
            </form>

            <?php $tipo = "";
            $id = ""; ?>
            <?php if (!isset($_SESSION['id'])) : ?>


                <li class="dropdown">
                    <button class="dropbtn">Entrar</button>
                    <div class="dropdown-content">
                        <a href="/parimeikerWeb/view/crud/login.php?tipo=cliente">Entrar como Cliente</a>
                        <a href="/parimeikerWeb/view/crud/login.php?tipo=empresa">Entrar como Empresa</a>
                        <a href="/parimeikerWeb/view/crud/login.php?tipo=auto">Entrar como Autonomo</a>
                    </div>
                </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                if (mb_strlen($_SESSION['cnpj']) > 2) {
                    $tipo = "empresa";
                } elseif (mb_strlen($_SESSION['cpf']) > 2) {
                    $tipo = "auto";
                } else {
                    $tipo = "cliente";
                }
                if (mb_strlen($_SESSION['cnpj']) > 2) {
            ?>
                   <? php // include("../controller/getFile.php"); 
                    ?>

                    <!-- empresa -->

                    <li class="dropdown">

                        <!--<img class="dropbtn-logado" src="/parimeikerWeb/userData/userProfilePictures/Empresa/userProfile<?php //echo $_SESSION['id']; 
                                                                                                                            ?>.png" class="perfil-img"  class="img-menu" alt="">-->
                        <?php pegarImagemPerfil($tipo, $id, "dropbtn-logado"); ?>

                        <div class="dropdown-content">
                            <a href="/parimeikerWeb/view/profile.php">Ver perfil</a>
                            <a href="/parimeikerWeb/controller/usuarioDAO.php?sair=sim">Sair</a>
                        </div>
                    </li>


                <?php } elseif (mb_strlen($_SESSION['cpf']) > 2) { ?>
                    <!-- autonomo -->


                    <li class="dropdown">
                        <?php pegarImagemPerfil($tipo, $id, "dropbtn-logado"); ?>

                        <div class="dropdown-content">
                            <a href="/parimeikerWeb/view/profile.php">Ver perfil</a>
                            <a href="/parimeikerWeb/controller/usuarioDAO.php?sair=sim">Sair</a>
                        </div>
                    </li>

                <?php } else { ?>

                    <!-- cliente -->

                    <li class="dropdown">
                        <?php pegarImagemPerfil($tipo, $id, "dropbtn-logado"); ?>

                        <div class="dropdown-content">
                            <a href="/parimeikerWeb/view/profile.php">Ver perfil</a>
                            <a href="/parimeikerWeb/controller/usuarioDAO.php?sair=sim">Sair</a>
                        </div>
                    </li>

            <?php }
            } ?>

    </ul>
</nav>