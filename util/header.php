<nav>
        <ul>
            <li class="logo"><a href="/parimeikerWeb/"><img src="/parimeikerWeb/assets/images/logo.png"></a>  </li>
            <li class="search-icon">
            <input type="search" placeholder="Pesquise">
            <label class="icon">
                <span class="fas fa-search"></span>
            </label>
            </li>
            <?php if(!isset($_SESSION['nome'])): ?>
                <li class="dropdown">
            <button class="dropbtn">ENTRAR</button>
            <div class="dropdown-content">
                <a href="/parimeikerWeb/view/crud/login.php?tipo=cliente">ENTRAR COMO CLIENTE</a>
                <a href="/parimeikerWeb/view/crud/login.php?tipo=empresa">ENTRAR COMO EMPRESA</a>
                <a href="/parimeikerWeb/view/crud/login.php?tipo=auto">ENTRAR COMO PRESTADOR</a>
            </div>
            </li>
            <?php else: ?>  
            <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?> <!-- empresa -->
               
             <li class="dropdown">

             <img class="dropbtn-logado" src="/parimeikerWeb/userData/userProfilePictures/Empresa/userProfile<?php echo $_SESSION['id']; ?>.png" class="perfil-img"  class="img-menu" alt="">

            <div class="dropdown-content">
            <a href="/parimeikerWeb/view/profile.php">Ver perfil</a>
            <a href="/parimeikerWeb/controller/usuarioDAO.php?sair=sim">Sair</a>
            </div>
            </li>
                

            <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>  <!-- autonomo -->
                <img src="/parimeikerWeb/userData/userProfilePictures/Autonomo/userProfile<?php echo $_SESSION['id']; ?>.png" class="perfil-img"  class="img-menu" alt="">
                
                <li class="dropdown">
            <button class="dropbtn-logado"></button>
            <div class="dropdown-content">
            <a href="/parimeikerWeb/view/profile.php">Ver perfil</a>
            <a href="/parimeikerWeb/controller/usuarioDAO.php?sair=sim">Sair</a>
            </div>
            </li>

            <?php else: ?>

                <!-- cliente -->

            <li class="dropdown">
              <img class="dropbtn-logado" src="/parimeikerWeb/userData/userProfilePictures/Cliente/userProfile<?php echo $_SESSION['id']; ?>.png"  class="dropbtn" class="perfil-img" class="img-menu" alt="">
           
            <div class="dropdown-content">
            <a href="/parimeikerWeb/view/profile.php">Ver perfil</a>
            <a href="/parimeikerWeb/controller/usuarioDAO.php?sair=sim">Sair</a>
            </div>
            </li>

            <?php endif; ?>
            <?php endif; ?>
        </ul>
    </nav>