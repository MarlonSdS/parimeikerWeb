<nav>
        <ul>
            <li class="logo"><a href="/parimeikerWeb/"><img src="/parimeikerWeb/assets/images/logo.png"></a>  </li>
            <li class="search-icon">
            <form action="/parimeikerWeb/view/pesquisa.php" method="GET" class="form-pesquisa">
                <input type="search" placeholder="Pesquise" name="search">
                <label class="icon">
                    <span class="fas fa-search" type="submit"></span>
                </label>
            </form>
           
            </li> 
            <?php $tipo = "";
                $id = ""; ?>
            <?php if(!isset($_SESSION['id'])): ?>
            
            
                <li class="dropdown">
            <button class="dropbtn">ENTRAR</button>
            <div class="dropdown-content">
                <a href="/parimeikerWeb/view/crud/login.php?tipo=cliente">ENTRAR COMO CLIENTE</a>
                <a href="/parimeikerWeb/view/crud/login.php?tipo=empresa">ENTRAR COMO EMPRESA</a>
                <a href="/parimeikerWeb/view/crud/login.php?tipo=auto">ENTRAR COMO PRESTADOR</a>
            </div>
            </li>
            <?php endif; ?>
            <?php if(isset($_SESSION['id'])){
                $id = $_SESSION['id']; 
                if(mb_strlen($_SESSION['cnpj']) > 2){
                $tipo = "empresa";
                }elseif(mb_strlen($_SESSION['cpf']) > 2){
                 $tipo = "auto";
                }else{
                    $tipo="cliente";
            }
              if(mb_strlen($_SESSION['cnpj']) > 2){ 
                ?>  
            <?php// include("../controller/getFile.php"); ?>
            <!-- empresa -->
               
             <li class="dropdown">

             <!--<img class="dropbtn-logado" src="/parimeikerWeb/userData/userProfilePictures/Empresa/userProfile<?php //echo $_SESSION['id']; ?>.png" class="perfil-img"  class="img-menu" alt="">-->
            <?php pegarImagemPerfil($tipo, $id, "dropbtn-logado"); ?>
            <div class="dropdown-content">
            <a href="/parimeikerWeb/view/profile.php">Ver perfil</a>
            <a href="/parimeikerWeb/controller/usuarioDAO.php?sair=sim">Sair</a>
            </div>
            </li>
                

            <?php }elseif(mb_strlen($_SESSION['cpf']) > 2){ ?>  <!-- autonomo -->
                <?php pegarImagemPerfil($tipo, $id, "dropbtn-logado"); ?>
                
                <li class="dropdown">
            <button class="dropbtn-logado"></button>
            <div class="dropdown-content">
            <a href="/parimeikerWeb/view/profile.php">Ver perfil</a>
            <a href="/parimeikerWeb/controller/usuarioDAO.php?sair=sim">Sair</a>
            </div>
            </li>

            <?php }else{ ?>

                <!-- cliente -->

            <li class="dropdown">
            <?php pegarImagemPerfil($tipo, $id, "dropbtn-logado"); ?>
           
            <div class="dropdown-content">
            <a href="/parimeikerWeb/view/profile.php">Ver perfil</a>
            <a href="/parimeikerWeb/controller/usuarioDAO.php?sair=sim">Sair</a>
            </div>
            </li>

            <?php } 
            }?>
            
        </ul>
    </nav>