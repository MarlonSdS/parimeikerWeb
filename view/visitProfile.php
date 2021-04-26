<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/parimeikerWeb/assets/styles/profile.css">
    <?php include("../util/commonHead.php"); 
    session_start();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $tipo = $_GET['tipo'];
        $user = "";
        if($tipo == "empresa"){
            include("../controller/conexao.php");
            $result_user = "SELECT * FROM empresa WHERE id = '$id'";
            $resultado_user = mysqli_query($conexao, $result_user);
            $user = mysqli_fetch_array($resultado_user);
        }elseif($tipo == "auto"){
            include("../controller/conexao.php");
            $result_user = "SELECT * FROM autonomo WHERE id = '$id'";
            $resultado_user = mysqli_query($conexao, $result_user);
            $user = mysqli_fetch_array($resultado_user);
        }
    }else{
        header("location: homepage.php");
    }?>
    <title><?php echo $user['nome']; ?></title>
</head>
<body>
    <header>
        <?php include("../util/header.php"); ?>
    </header>
    <div id="vazio"></div>
    
    <main>
    <div class="infosetexto">
        <div class="infos">
            <?php if($tipo == "empresa"): ?>
                <img src="../userData/userProfilePictures/Empresa/userProfile<?php echo $id ?>.png" class="profile-picture">
            <?php elseif($tipo == "auto"): ?>
                <img src="../userData/userProfilePictures/Autonomo/userProfile<?php echo $id ?>.png" class="profile-picture">
            <?php else: ?>
                <img src="../userData/userProfilePictures/Cliente/userProfile<?php echo $id ?>.png" class="profile-picture">
            <?php endif; ?>
            
            <p><img src="../assets/images/icons/gmail.png" class="icon"><?php echo $user['email']; ?></p>
            <p><img src="../assets/images/icons/whatsapp.png" class="icon"><?php echo $user['tel']; ?></p>

            
        </div>
        
        <div class="texto">
            <h1><p><?php echo $user['nome']; ?></p></h1>
        <?php if($tipo == "empresa"): ?>
            <p class="texto-apre"><?php include("../userData/userTexts/Empresa/userText{$id}.html"); ?></p>
        <?php elseif($tipo == "auto"): ?>
            <p class="texto-apre"> <?php include("../userData/userTexts/Autonomo/userText{$id}.html"); ?></p>
        <?php endif; ?>
        </div>
    </div>
    
        

        <div class="portfolio">
            <div class="portfolio-card">
                <?php if($tipo == "empresa"): ?>
                    <img src="../userData/userPictures/Empresa/<?php echo $id?>portImage1.png" alt="">
                    <div class="image-info">
                        <p><?php include("../userData/userTexts/Empresa/portTexts/{$id}portText1.html") ?></p>
                    </div>
                    
                <?php elseif($tipo == "auto"): ?>
                    <img src="../userData/userPictures/Auto/<?php echo $id?>portImage1.png" alt="">
                    <div class="image-info">
                        <p><?php include("../userData/userTexts/Autonomo/portTexts/{$id}portText1.html") ?></p>
                    </div>
                    
                <?php endif; ?>
            </div>
            <div class="portfolio-card">
                <?php if($tipo == "empresa"): ?>
                    <img src="../userData/userPictures/Empresa/<?php echo $id?>portImage2.png" alt="">
                    <div class="image-info">
                        <p><?php include("../userData/userTexts/Empresa/portTexts/{$id}portText2.html") ?></p>
                    </div>
                    
                <?php elseif($tipo == "auto"): ?>
                    <img src="../userData/userPictures/Auto/<?php echo $id?>portImage2.png" alt="">
                    <div class="image-info">
                        <p><?php include("../userData/userTexts/Autonomo/portTexts/{$id}portText2.html") ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="portfolio-card">
                <?php if($tipo == "empresa"): ?>
                    <img src="../userData/userPictures/Empresa/<?php echo $id?>portImage3.png" alt="">
                    <div class="image-info">
                        <p><?php include("../userData/userTexts/Empresa/portTexts/{$id}portText3.html") ?></p>
                    </div>
                    
                <?php elseif($tipo == "auto"): ?>
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