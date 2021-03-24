<!DOCTYPE html>
<html>
    <head>
        <?php include'../../util/commonHead.php'; ?>
        <link rel="stylesheet" href="../../assets/styles/crud.css">
        <title>Entrar</title>
    </head>
    <body>    
        <header>
                <?php include('../../util/header.php'); ?>
        </header>
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
                if($tipo == "cliente"):            ?>
            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">

            <div class="form-group">
                <img src="../../assets/images/icons/usuario.png" alt="">
                    <input type="email" name="email" placeholder="E-mail" class="form-control">
            </div>
            <div class="form-group">
                <img src="../../assets/images/icons/cadeado.png" alt="">
                    <input type="password" name="senha" placeholder="Senha" class="form-control">
            </div>

            <button type="submit" class="btn-login" name="login">Entrar</button>
            <a href="/parimeikerWeb/view/crud/cadastro.php?tipo=cliente" class="btn-cadastrar">Cadastrar</a>
        </form>
        <?php /*login de autonomo*/elseif($tipo == "auto"): ?>
            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">

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
        </form>
        <?php /*login de empresa*/ elseif($tipo == "empresa"): ?>
            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">

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
        </form>
        <?php endif; ?>
        
        </main>
       <footer>

       </footer>
    </body>
</html>