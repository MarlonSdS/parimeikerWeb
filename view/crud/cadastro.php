<!DOCTYPE html>
<html>
    <head>
        <?php include('../../util/commonHead.php'); ?>
        <title>Cadastro</title>
    </head>
    <body>
        <header>
            <?php include('../../util/header.php'); ?>
        </header>
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
        <?php endif; ?>
            <?php //cadastro de autonomo
            if ($_GET["tipo"] == "auto") :
        ?>
            <h1>Preencha seus dados</h1>
            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">
                <div class="form-group">
                    <label for="nome">Seu Nome</label>
                    <input type="text" name="nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">E-mail de contato</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tel">Telefone de Contato</label>
                    <input type="number" name="tel" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cpf">Seu CPF</label>
                    <input type="text" name="cpf" class="form-control" maxlength="14">
                </div>
                <div class="form-group">
                    <label for="senha">Crie Sua Senha</label>
                    <input type="password" name="senha" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nome"></label>
                    <input type="hidden" name="tipo" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" name="cadastro">Cadastrar</button>
            </form>
            
        <?php //cadastro de cliente
        elseif($_GET["tipo"] == "cliente"): ?>
            <main>
            <h1>Preencha seus dados</h1>
            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">
                <div class="form-group">
                    <label for="nome">Seu Nome</label>
                    <input type="text" name="nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Seu e-mail</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tel">Seu telefone</label>
                    <input type="number" name="tel" class="form-control">
                </div>
                <div class="form-group">
                    <label for="senha">Crie Sua Senha</label>
                    <input type="password" name="senha" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nome"></label>
                    <input type="hidden" name="tipo" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" name="cadastro">Cadastrar</button>
            </form>
            
        <?php //cadastro de empresa
        elseif($_GET["tipo"] == "empresa"): ?>
            <main>
            <h1>Preencha os dados da sua empresa</h1>
            <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST">
                <div class="form-group">
                    <label for="nome">Nome da Empresa</label>
                    <input type="text" name="nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">E-mail de contato</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tel">Telefone de Contato</label>
                    <input type="number" name="tel" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cnpj">CNPJ da Empresa</label>
                    <input type="text" name="cnpj" class="form-control" maxlength="14">
                </div>
                <div class="form-group">
                    <label for="senha">Crie Sua Senha</label>
                    <input type="password" name="senha" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nome"></label>
                    <input type="hidden" name="tipo" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" name="cadastro">Cadastrar</button>
            </form>
            
        <?php endif; ?>
        </main>
        
    </body>
</html>