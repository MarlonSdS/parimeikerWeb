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
            <li class="btn-entrar">
            <button class="input-btn" href="www.youtube.com">ENTRAR</button>
            <ul>
                <li><a href="view/crud/login.php?tipo=cliente">Entrar como cliente</a></li>
                <li><a href="view/crud/login.php?tipo=auto">Entrar como autônomo</a></li>
                <li><a href="view/crud/login.php?tipo=empresa">Entrar como empresa</a></li>
            </ul>
            </li>
            <?php else: ?>  
            <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
                <img src="/parimeikerWeb/userData/userProfilePictures/Empresa/userProfile<?php echo $_SESSION['id']; ?>.png" class="img-menu" alt="">
                <li class="ul">
                        <li><b><a href="/parimeikerWeb/view/profile.php">Ver perfil</a></b></li>
                        <li><b><a href="/parimeikerWeb/controller/usuarioDAO.php?sair=sim">Sair</a></b></li>
                    </li>
            <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>  
                <img src="/parimeikerWeb/userData/userProfilePictures/Autonomo/userProfile<?php echo $_SESSION['id']; ?>.png" class="img-menu" alt="">
                <li class="ul">
                        <li><b><a href="/parimeikerWeb/view/profile.php">Ver perfil</a></b></li>
                        <li><b><a href="/parimeikerWeb/controller/usuarioDAO.php?sair=sim">Sair</a></b></li>
                    </li>
            <?php else: ?>
                <img src="/parimeikerWeb/userData/userProfilePictures/Cliente/userProfile<?php echo $_SESSION['id']; ?>.png" class="img-menu" alt="">
                <li class="ul">
                        <li><b><a href="/parimeikerWeb/view/profile.php">Ver perfil</a></b></li>
                        <li><b><a href="/parimeikerWeb/controller/usuarioDAO.php?sair=sim">Sair</a></b></li>
                    </li>
            <?php endif; ?>
            <?php endif; ?>
        </ul>
    </nav>