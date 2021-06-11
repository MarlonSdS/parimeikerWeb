<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include("../util/commonHead.php"); 
    session_start(); 
    if($_SESSION['logado'] != true){
        header("location: /parimeikerWeb/index.php");
    }
    $texto = fopen("../userData/userTexts/Autonomo/userText{$_SESSION['id']}.txt", "w");
    $id = $_SESSION['id'];
    $tipo = "";
    if(mb_strlen($_SESSION['cpf'])>2){
        $tipo = "auto";
    }elseif(mb_strlen($_SESSION['cnpj'])> 2){
        $tipo = "empresa";}else{
            $tipo = "cliente";}?>
    <link rel="stylesheet" href="../assets/styles/crud.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['nome'];?></title>
    <style>#hiddenSenha{display: none;}</style>
</head>
<body>

    <header><?php
    include("../controller/getFile.php");
    include("../util/header.php"); ?></header>
    <div id="vazio"></div>
    <main>
    <form action="/parimeikerWeb/controller/usuarioDAO.php" method="POST" autocomplete="off">
    <h2>Informações do perfil</h2>
                <div class="campo-texto">
                    <label for="nome"></label>
                    <input type="text" name="nome" 
                    value="<?php echo $_SESSION['nome']; ?>" placeholder="Nome da Empresa" class="form-control">
                </div>
                <div class="campo-texto">
                    <label for="email"></label>
                    <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" 
                    placeholder="E-mail de contato" class="form-control">
                </div>
                <div class="campo-texto">
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
                <div class="campo-texto" id="hiddenSenha">
                    <label for="senha"></label>
                    <input type="password" name="senha" autocomplete="off" placeholder="Senha" required>
                    <span></span>
                </div>
                <div class="campo-texto">
                    <label for="senha"></label>
                    <input type="password" name="senha" autocomplete="off" placeholder="Senha" required>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="id"></label>
                    <input type="hidden" name="id" placeholder="" value="<?php echo $_SESSION['id']; ?>" 
                    class="form-control">
                </div>
                <input type="submit" class="btn-cadastrar" name="editar" value="SALVAR">
                <input type="submit" class="btn-cadastrar" name="excluir" value="EXCLUIR">
            </form>
            
            <form action="../controller/upload.php" enctype="multipart/form-data" method="POST">
                    <div class="form-grop">
                        <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
                            <label for="texto">Esse é o texto que é exibido ao entrar no seu perfil</label>
                            <textarea id="texto" name="texto" class="textfield" rows="7" cols="50"><?php pegarTextoPerfil($tipo, $id); ?></textarea>
                        <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
                            <label for="texto">Esse é o texto que é exibido ao entrar no seu perfil</label>
                            <textarea id="texto" name="texto" class="textfield" rows="7" cols="50"><?php pegarTextoPerfil($tipo, $id); ?> </textarea>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
                            <?php pegarImagemPerfil($tipo, $id, "profPic"); ?>
                            <label for="picture">Selecione uma imagem de perfil</label>
                            <input name="picture" type="file"  />
                        <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
                            <?php pegarImagemPerfil($tipo, $id, "profPic"); ?>
                            <label for="picture">Selecione uma imagem de perfil</label>
                            <input name="picture" type="file" />
                        <?php else: ?>
                            <?php pegarImagemPerfil($tipo, $id, "profPic"); ?>
                            <label for="picture">Selecione uma imagem de perfil</label>
                            <input name="picture" type="file"/>
                        <?php endif; ?>
                    </div>

                        <p>Adicione itens ao seu portfólio</p>
                        <div  class="form-group">
                            <label for="item1">Primeiro item</label>
                            <input name="img1" type="file">
                            <label for="item1">Texto a ser exibido junto com a imagem:</label>
                            <input name="item1" type="text" value="<?php pegarTextoPortfolio($tipo, $id, 1); ?>">
                        </div>
                        <div  class="form-group">
                            <label for="item2">Segundo item</label>
                            <input name="img2" type="file">
                            <label for="">Texto a ser exibido junto com a imagem:</label>
                            <input name="item2" type="text" value="<?php pegarTextoPortfolio($tipo, $id, 2); ?>">
                        </div>
                        <div  class="form-group">
                            <label for="item3">Terceiro item</label>
                            <input name="img3" type="file">
                            <label for="">Texto a ser exibido junto com a imagem:</label>
                            <input name="item3" type="text" value="<?php pegarTextoPortfolio($tipo, $id, 3); ?>">
                        </div>

                        <div class="tags">
                            <label for="tags">Adicione Tags para ser encontrado(a) mais facilmente
                            (separe cada tag com vírgula)</label>
                            <textarea id="tags" name="tags" class="textfield" rows="7" cols="50"> </textarea>
                        </div>
                    <button type="submit" class="btn-cadastrar" name="editar">Salvar</button>
            </form>
    </main>
    <footer>
    </footer>
</body>
</html>