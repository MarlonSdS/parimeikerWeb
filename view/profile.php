<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include'../util/commonHead.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
            session_start();
            if($_SESSION['logado'] != true){
                header("location: /parimeikerWeb/index.php");
            }
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
    <div class="infosetexto">
        <div class="infos">
            <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
                <img src="../userData/userProfilePictures/Empresa/userProfile<?php echo $id ?>.png" class="profile-picture">
            <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
                <img src="../userData/userProfilePictures/Autonomo/userProfile<?php echo $id ?>.png" class="profile-picture">
            <?php else: ?>
                <img src="../userData/userProfilePictures/Cliente/userProfile<?php echo $id ?>.png" class="profile-picture">
            <?php endif; ?>
            
            <p><img src="../assets/images/icons/gmail.png" class="icon"><?php echo $_SESSION['email']; ?></p>
            <p><img src="../assets/images/icons/whatsapp.png" class="icon"><?php echo $_SESSION['tel']; ?></p>

            
        </div>
        
        <div class="texto">
            <h1><p><?php echo $_SESSION['nome']; ?></p>
            <a href="/parimeikerWeb/view/editProfile.php"><img src="../assets/images/icons/lapis.png" class="btn-editar"></a></h1>
        <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
            <p class="texto-apre"><?php include("../userData/userTexts/Empresa/userText{$id}.html"); ?></p>
        <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
            <p class="texto-apre"s> <?php include("../userData/userTexts/Autonomo/userText{$id}.html"); ?></p>
        <?php endif; ?>
        </div>
    </div>
    
        

        <div class="portfolio">
            <div class="portfolio-card">
                <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
                    <img src="../userData/userPictures/Empresa/<?php echo $id?>portImage1.png" alt="">
                    <div class="image-info">
                        <p><?php include("../userData/userTexts/Empresa/portTexts/{$id}portText1.html") ?></p>
                    </div>
                    
                <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
                    <img src="../userData/userPictures/Auto/<?php echo $id?>portImage1.png" alt="">
                    <div class="image-info">
                        <p><?php include("../userData/userTexts/Autonomo/portTexts/{$id}portText1.html") ?></p>
                    </div>
                    
                <?php endif; ?>
            </div>
            <div class="portfolio-card">
                <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
                    <img src="../userData/userPictures/Empresa/<?php echo $id?>portImage2.png" alt="">
                    <div class="image-info">
                        <p><?php include("../userData/userTexts/Empresa/portTexts/{$id}portText2.html") ?></p>
                    </div>
                    
                <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
                    <img src="../userData/userPictures/Auto/<?php echo $id?>portImage2.png" alt="">
                    <div class="image-info">
                        <p><?php include("../userData/userTexts/Autonomo/portTexts/{$id}portText2.html") ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="portfolio-card">
                <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
                    <img src="../userData/userPictures/Empresa/<?php echo $id?>portImage3.png" alt="">
                    <div class="image-info">
                        <p><?php include("../userData/userTexts/Empresa/portTexts/{$id}portText3.html") ?></p>
                    </div>
                    
                <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
                    <img src="../userData/userPictures/Auto/<?php echo $id?>portImage3.png" alt="">
                    <div class="image-info">
                        <p><?php include("../userData/userTexts/Autonomo/portTexts/{$id}portText3.html") ?></p>
                    </div>
                    
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>