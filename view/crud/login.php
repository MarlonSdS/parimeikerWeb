<!DOCTYPE html>
<html>
    <head>
        <?php include'../../util/commonHead.php'; ?>
        <title>Entrar</title>
    </head>
    <body>    
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
                if($tipo == "cliente"):            ?>
            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">

            <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" class="form-control">
            </div>

            <button type="submit" class="btn btn-secondary" name="login">Entrar</button>
        </form>
        <?php /*login de autonomo*/elseif($tipo == "auto"): ?>
        <main>
            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">

            <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" class="form-control">
            </div>
            <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" class="form-control">
            </div>

            <button type="submit" class="btn btn-secondary" name="login">Entrar</button>
        </form>
        <?php /*login de empresa*/ elseif($tipo == "empresa"): ?>
            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">

            <div class="form-group">
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" name="cnpj" class="form-control">
            </div>
            <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" class="form-control">
            </div>

            <button type="submit" class="btn btn-secondary" name="login">Entrar</button>
        </form>
        <?php endif; ?>
        
        </main>
       
    </body>
</html>