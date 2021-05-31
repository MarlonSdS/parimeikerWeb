<!DOCTYPE html>
<html>
    <head>
        <?php include'../../util/commonHead.php'; ?>
        
        <link rel="stylesheet" href="../../assets/styles/crud.css">

        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        
        <title>Entrar</title>
    </head>
    <body>    
        
                <?php include('../../util/header.php'); ?>
        
        <div id="vazio"></div>
        <main>
                 <?php $erro ="";
                if(isset($_GET["erro"])){
                        $erro = $_GET["erro"];
                }
                if($erro == "login"):
        ?>
        <div class="alert alert-warning" role="alert">
                <p>Login ou senha incorretos</p>
        </div>
        <?php endif; ?>
        <?php 
                $tipo = $_GET["tipo"];
                // login de cliente
                if($tipo == "cliente"): ?>

                <img class="icon-logo" src="/parimeikerWeb/assets/images/icon.png">

                <div class="center"> 

                <h1 class="fill">Faça Seu Login</h1> 

            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">
                
            <div class="campo-texto">
                  <input type="email" name="email" required>
                  <span></span>
                  <label>Email</label>     
                  
                </div>

                <div class="campo-texto">
                  <input type="password" name="senha" required>
                  <span></span>
                  <label>Senha</label>      
                </div>
              
            </div>

                        <div class="center-cadastro">
            <input type="submit" value="LOGIN" name="login">
                <div class="link-conta">
                        Ainda não tem uma conta? <a href="cadastro.php?tipo=cliente">Crie agora</a>
                </div>
                <div class="senha-cadastro">Esqueçeu a Senha?</div>
                </div>
        </form>
        </div>   
        
                </div>

        <?php /*login de autonomo*/elseif($tipo == "auto"): ?>

         <img class="icon-logo" src="/parimeikerWeb/assets/images/icon.png">

            <div class="center">      

             <h1 class="fill">Faça Seu Login</h1> 

            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">

            <<div class="campo-texto">
                  <input type="text" required>
                  <span></span>
                  <label>Usuário</label>      
                </div>

                <div class="campo-texto">
                  <input type="password" required>
                  <span></span>
                  <label>Senha</label>      
                </div>
            
                <div class="senha">Esqueçeu a Senha?</div>
                <input type="submit" value="LOGIN">
                <div class="link-conta">
                        Ainda não tem uma conta? <a href="cadastro.php?tipo=auto">Crie agora</a>
                </div>

            <!--
            <div class="form-group">
            <img src="../../assets/images/icons/usuario.png" alt="">
                    <input type="text" name="cpf" placeholder="CPF" class="form-control">
            </div>
            <div class="form-group">
            <img src="../../assets/images/icons/cadeado.png" alt="">
                    <input type="password" name="senha" placeholder="Senha" class="form-control">
            </div>

            <button type="submit" class="btn-login" name="login">Entrar</button>
            <a href="/parimeikerWeb/view/crud/cadastro.php?tipo=auto" class="btn-cadastrar">Cadastrar</a>
                -->
        </form>
        </div>
        
        <?php /*login de empresa*/ elseif($tipo == "empresa"): ?>


                <img class="icon-logo" src="/parimeikerWeb/assets/images/icon.png">

            <div class="center">      

             <h1 class="fill">Faça Seu Login</h1> 

            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">

            <div class="campo-texto">
                  <input type="text" required>
                  <span></span>
                  <label>Usuário</label>      
                </div>


                <div class="campo-texto">
                  <input type="password" required>
                  <span></span>
                  <label>Senha</label>      
                </div>
            
                <div class="senha">Esqueçeu a Senha?</div>
                <input type="submit" value="LOGIN">
                <div class="link-conta">
                        Ainda não tem uma conta? <a href="cadastro.php?tipo=empresa">Crie agora</a>
                </div>

            <!--
            <div class="form-group">
            <img src="../../assets/images/icons/usuario.png" alt="">
                    <input type="text" name="cnpj" placeholder="CNPJ" class="form-control">
            </div>
            <div class="form-group">
            <img src="../../assets/images/icons/cadeado.png" alt="">
                    <input type="password" name="senha" placeholder="Senha" class="form-control">
            </div>

            <button type="submit" class="btn-login" name="login">Entrar</button>
            <a href="/parimeikerWeb/view/crud/cadastro.php?tipo=empresa" class="btn-cadastrar">Cadastrar</a>
        -->
        </form>
        <?php endif; ?>
        
        </main>
      
        <!-- Footer -->

        <?php include('../../util/footer.php'); ?>      

    </body>
</html>