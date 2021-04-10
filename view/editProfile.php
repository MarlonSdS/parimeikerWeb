<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include("../util/commonHead.php"); 
    session_start(); ?>
    <link rel="stylesheet" href="../assets/styles/crud.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['nome'];?></title>
    <style>#hiddenSenha{display: none;}</style>
</head>
<body>

    <header><?php include("../util/header.php"); ?></header>
    <div id="vazio"></div>
    <main>
    <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST" autocomplete="off">
                <div class="form-group">
                    <label for="nome"></label>
                    <input type="text" name="nome" 
                    value="<?php echo $_SESSION['nome']; ?>" placeholder="Nome da Empresa" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email"></label>
                    <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" 
                    placeholder="E-mail de contato" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tel"></label>
                    <input type="number" name="tel" value="<?php echo $_SESSION['tel']; ?>" 
                    placeholder="Telefone de Contato" class="form-control">
                </div>
                <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
                <div class="form-group">
                    <label for="cnpj"></label>
                    <input type="text" name="cnpj" value="<?php echo $_SESSION['cnpj']; ?>" 
                    placeholder="CNPJ da Empresa" class="form-control" maxlength="14">
                </div>
                <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
                <div class="form-group">
                    <label for="cpf"></label>
                    <input type="text" name="cpf" value="<?php echo $_SESSION['cpf']; ?>" 
                    placeholder="Seu CPF" class="form-control" maxlength="14">
                </div>
                <?php endif; ?>
                <div class="form-group" id="hiddenSenha">
                    <label for="senha"></label>
                    <input type="password" name="senha" autocomplete="off" placeholder="Crie Sua Senha" class="form-control">
                </div>
                <div class="form-group">
                    <label for="senha"></label>
                    <input type="password" name="senha" autocomplete="off" placeholder="Crie Sua Senha" class="form-control">
                </div>
                <div class="form-group">
                    <label for="id"></label>
                    <input type="hidden" name="id" placeholder="" value="<?php echo $_SESSION['id']; ?>" 
                    class="form-control">
                </div>
                <button type="submit" class="btn-cadastrar" name="editar">Salvar</button>
                <button type="submit" class="btn-cadastrar" name="excluir">Excluir</button>
            </form>
    </main>
    
</body>
</html>