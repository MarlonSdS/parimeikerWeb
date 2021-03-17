<!DOCTYPE html>
<html>
    <head>
        <?php include'../../util/commonHead.php'; ?>
        <title>Entrar</title>
    </head>
    <body>    
        <?php 
                $tipo = $_GET["tipo"];
                // login de cliente
                if($tipo == "cliente"):            ?>
        <main>
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
        </main>
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
        </main>
        <?php /*login de empresa*/ elseif($tipo == "empresa"): ?>
        <main>
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
        </main>
        <?php endif; ?>
        
    </body>
</html>