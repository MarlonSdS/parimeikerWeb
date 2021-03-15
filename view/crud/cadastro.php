<!DOCTYPE html>
<html>
    <head>
        <?php include('../../util/commonHead.php'); ?>
        <title>Cadastro de Profissional Autônomo</title>
    </head>
    <body>
        <header></header>
        <?php //cadastro de autonomo
            $tipo = $_GET["tipo"];
            if ($tipo == "auto") :
        ?>
        <main>
            <h1>Preencha seus dados</h1>
            <form action="">
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
                    <label for="tel">Seu CPF</label>
                    <input type="text" name="cpf" class="form-control">
                </div>
                <div class="form-group">
                    <label for="senha">Crie Sua Senha</label>
                    <input type="password" name="senha" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" name="cadastro">Cadastrar</button>
            </form>
            
        </main>
        <?php //cadastro de cliente
        elseif($tipo == "cliente"): ?>
            <main>
            <h1>Preencha seus dados</h1>
            <form action="">
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
                <button type="submit" class="btn btn-primary" name="cadastro">Cadastrar</button>
            </form>
            
        </main>
        <?php //cadastro de empresa
        elseif($tipo == "empresa"): ?>
            <main>
            <h1>Preencha os dados da sua empresa</h1>
            <form action="">
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
                    <label for="tel">CNPJ da Empresa</label>
                    <input type="text" name="cnpj" class="form-control">
                </div>
                <div class="form-group">
                    <label for="senha">Crie Sua Senha</label>
                    <input type="password" name="senha" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" name="cadastro">Cadastrar</button>
            </form>
            
        </main>
        <?php endif; ?>
    </body>
</html>