<div class="logo">
            <a href="/parimeikerWeb/index.php"><img class="img-logo" src="/parimeikerWeb/assets/images/logo.png" alt=""></a>
        </div>
        <div class="menu">
            <form action="" method="get">
                <input class="pesquisa" type="text" placeholder="Pesquisar...">
            </form>
            <!--Alternar entre o botão entrar e as opções de conta do usuário-->
            <?php if(isset($_SESSION['nome'])): ?>
            <div class="account" >
            <input type="checkbox" id="chec">
                <label for="chec"> 
               <img src="https://lh3.googleusercontent.com/ogw/ADGmqu9rdNkN1yOf9Gw99wfhGrMwlVelAeBsnOoZS3rksQ=s83-c-mo" for="chec" alt="">

                <label class="nomeUsuario" for="chec"><?php echo $_SESSION['nome']?></label>
                </label>

                <nav class="nav">
                    <li class="ul">
                        <li><b><a href="/parimeikerWeb/view/profile.php">Ver perfil</a></b></li>
                        <li><b><a href="/parimeikerWeb/controller/usuarioDAO.php?sair=sim">Sair</a></b></li>
                    </li>
                </nav>
            </div>
            
 
            <?php else: ?>
            <div class="btn-entrar">
                <input type="checkbox" id="chec">
                <label for="chec">
                    Entrar
                </label>

                <nav>
                    <li class="ul">
                        <li><b><a href="/parimeikerWeb/view/crud/login.php?tipo=cliente">Entrar como cliente</a></b></li>
                        <li><b><a href="/parimeikerWeb/view/crud/login.php?tipo=auto">Entrar como autônomo</a></b></li>
                        <li><b><a href="/parimeikerWeb/view/crud/login.php?tipo=empresa">Entrar como empresa</a></b></li>
                    </li>
                </nav>
            </div> 
            <?php endif; ?>      
        </div>