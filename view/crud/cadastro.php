<!DOCTYPE html>
<html>
    <head>
        <?php include('../../util/commonHead.php'); ?>
        <link rel="stylesheet" href="../../assets/styles/crud.css">
        <title>Cadastro</title>
    </head>
    <body>
        <header>
            <?php include('../../util/header.php'); ?>
        </header>
        <div id="vazio"></div>
        <main>
        <?php //verificar se usuário já existe 
        $erro ="";
                if(isset($_GET["erro"])){
                        $erro = $_GET["erro"];
                }
                if($erro == "exis"):
        ?>
        <div class="alert alert-warning" role="alert">
                <p>Usuário já cadastrado</p>
        </div>

        <?php //cadastro de cliente
        elseif($_GET["tipo"] == "cliente"): ?>

            <img class="icon-logo" src="/parimeikerWeb/assets/images/icon.png">

            <div class="center-cadastro">      

            <h1 class="fill">Crie sua Conta</h1> 

            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">
            
            
            <div class="campo-texto">
                  <input type="text" name="nome" required>
                  <span></span>
                  <label>Nome</label>      
                </div>

                <div class="campo-texto">
                  <input type="text" name="email" required>
                  <span></span>
                  <label>Email</label>      
                </div>

                <div class="campo-texto">
                  <input type="number" name="tel" required>
                  <span></span>
                  <label>Telefone</label>      
                </div>

                <div class="campo-texto">
                  <input type="password" name="senha" required>
                  <span></span>
                  <label>Senha</label>      
                </div>
                <div class="form-group">
                    <label for="nome"></label>
                    <input type="hidden" name="tipo" placeholder="" class="form-control">

                </div>

                <div class="btt-cadastro">
                <input type="submit" name="cadastro" value="CADASTRO">
                <div class="link-conta">
                        Já tem uma conta? <a href="login.php?tipo=cliente">Login</a>
                </div>
                </div>

            </form>
        </div>


        <?php endif; ?>
            <?php //cadastro de autonomo
            if ($_GET["tipo"] == "auto") :
        ?>

            <img class="icon-logo" src="/parimeikerWeb/assets/images/icon.png">

            <div class="center-cadastro">      

            <h1 class="fill">Crie sua Conta</h1>

            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">
            
            <div class="campo-texto">
                  <input type="text" name="nome" required>
                  <span></span>
                  <label>Nome</label>      
                </div>

                <div class="campo-texto">
                  <input type="text" name="email" required>
                  <span></span>
                  <label>Email</label>      
                </div>

                <div class="campo-texto">
                  <input type="number" name="tel" required>
                  <span></span>
                  <label>Telefone</label>      
                </div>

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
                <div class="form-group">
                    <label for="nome"></label>
                    <input type="hidden" name="tipo" placeholder="" class="form-control">

                </div>

                <div class="btt-cadastro">
                <input type="submit" name="cadastro" value="CADASTRO">
                <div class="link-conta">
                        Já tem uma conta? <a href="login.php?tipo=auto">Login</a>
                </div>
                </div>
            
            </form>
            </div>

        <?php //cadastro de empresa
        elseif($_GET["tipo"] == "empresa"): ?>

            <img class="icon-logo" src="/parimeikerWeb/assets/images/icon.png">

            <div class="center-cadastro">      

            <h1 class="fill">Crie sua Conta</h1>

            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">

            <div class="campo-texto">
                  <input type="text" name="nome" required>
                  <span></span>
                  <label>Nome</label>      
                </div>

                <div class="campo-texto">
                  <input type="text" name="email" required>
                  <span></span>
                  <label>Email</label>      
                </div>

                <div class="campo-texto">
                  <input type="number" name="tel" required>
                  <span></span>
                  <label>Telefone</label>      
                </div>

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
                <div class="form-group">
                    <label for="nome"></label>
                    <input type="hidden" name="tipo" placeholder="" class="form-control">

                </div>

                <div class="btt-cadastro">
                <input type="submit" name="cadastro" value="CADASTRO">
                <div class="link-conta">
                        Já tem uma conta? <a href="login.php?tipo=empresa">Login</a>
                </div>
                </div>
                
            </form> 
        </div> 
        <?php endif; ?>
        </main>
        
            <!-- Footer -->

            <?php include('../../util/footer.php'); ?>  

    </body>
</html>