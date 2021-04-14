<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include'../util/commonHead.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
            session_start();
            $id = $_SESSION['id'];
            //caso por algum motivo o usuário acesse as páginas que requeram autenticação
            //sem se logar ele será redirecionado para a index
            
        ?>
    <title><?php echo $_SESSION['nome']; ?></title>
    <link rel="stylesheet" href="../assets/styles/profile.css">
</head>
<body>
    <header>
        <?php include'../util/header.php'; ?>
    </header>
    <div id="vazio"></div>
    
    <main>
    <div class="infos">
        <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
            <img src="../userData/userProfilePictures/Empresa/userProfile<?php echo $id ?>.png" class="profile-picture">
        <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
            <img src="../userData/userProfilePictures/Autonomo/userProfile<?php echo $id ?>.png" class="profile-picture">
        <?php else: ?>
            <img src="../userData/userProfilePictures/Cliente/userProfile<?php echo $id ?>.png" class="profile-picture">
        <?php endif; ?>
        <h1><?php echo $_SESSION['nome']; ?></h1>
        <h2><?php echo $_SESSION['email']; ?></h2>
        <h2><?php echo $_SESSION['tel']; ?></h2>

        <a href="/parimeikerWeb/view/editProfile.php"><buttom>Editar Perfil</button></a>
    </div>
        <div class="texto">
        <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
            <p><?php include("../userData/userTexts/Empresa/userText{$id}.html"); ?></p>
        <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
            <p><?php include("../userData/userTexts/Autonomo/userText{$id}.html"); ?></p>
        <?php endif; ?>
        </div>
    </main>
</body>
</html>