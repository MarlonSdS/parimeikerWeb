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

        <div class="alert show">
                  <span class="fas fa-exclamation-circle"></span>
                  <span>Login ou Senha incorretos!</span>
                  <span class="close-btn">
                    <span class="fas fa-times"></span>
                </span>
        </div>
  <!--
        <div class="alert alert-warning" role="alert">
                <p>Login ou senha incorretos</p>
        </div>

        -->
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

                <div class="center-login">
                <input type="submit" value="LOGIN" name="login">
                <div class="link-conta">
                Ainda não tem uma conta? <a href="cadastro.php?tipo=cliente">Crie agora</a>
                </div>
                <div class="senha-login">Esqueçeu a Senha?</div>
                </div>
        </form>
        </div>   
        

        <?php /*login de autonomo*/elseif($tipo == "auto"): ?>

         <img class="icon-logo" src="/parimeikerWeb/assets/images/icon.png">

            <div class="center">      

             <h1 class="fill">Faça Seu Login</h1> 

            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">

            <div class="campo-texto">
                  <input type="text" name="cpf" maxlength="14" required>
                  <span></span>
                  <label>CPF</label>  
                </div>

                <div class="campo-texto">
                  <input type="password" name="senha" required>
                  <span></span>
                  <label>Senha</label>      
                </div>
              
            </div>

                <div class="center-login">
                <input type="submit" value="LOGIN" name="login">
                <div class="link-conta">
                Ainda não tem uma conta? <a href="cadastro.php?tipo=auto">Crie agora</a>
                </div>
                <div class="senha-login">Esqueçeu a Senha?</div>
                </div>

        </form>
        </div>
        
        <?php /*login de empresa*/ elseif($tipo == "empresa"): ?>


                <img class="icon-logo" src="/parimeikerWeb/assets/images/icon.png">

            <div class="center">      

             <h1 class="fill">Faça Seu Login</h1> 

            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">

            <div class="campo-texto">
                  <input type="text" name="cnpj" required>
                  <span></span>
                  <label>CNPJ</label>  
                </div>

                <div class="campo-texto">
                  <input type="password" name="senha" required>
                  <span></span>
                  <label>Senha</label>      
                </div>
              
            </div>

                <div class="center-login">
                <input type="submit" value="LOGIN" name="login">
                <div class="link-conta">
                Ainda não tem uma conta? <a href="cadastro.php?tipo=empresa">Crie agora</a>
                </div>
                <div class="senha-login">Esqueçeu a Senha?</div>
                </div>

        </form>
        </div>
        <?php endif; ?>
        
      

        </main>
      
        <!-- Footer -->
      
        <?php include('../../util/footer.php'); ?>

    </body>
</html>