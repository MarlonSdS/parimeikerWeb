<!DOCTYPE html>
<html>
    <head>
        <?php include('../../util/commonHead.php'); ?>
        <title>Cadastro de Profissional Autônomo</title>
    </head>
    <body>
        <header></header>
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
                    <input type="number" name="tel" class="form-control">
                </div>
                <div class="form-group">
                    <label for="senha">Crie Sua Senha</label>
                    <input type="password" name="senha" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" name="cadastro">Cadastrar</button>
            </form>
            
        </main>
    </body>
</html>