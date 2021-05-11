<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/parimeikerWeb/assets/styles/profile.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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

        <?php  
                if(isset($_SESSION['logado']) and $_SESSION['logado'] == true): ?>
        <div class="notas">
            <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg']."<br><br>";
                unset($_SESSION['msg']);
            }
            ?>
            <form method="POST" action="/parimeikerWeb/controller/feedback.php" enctype="multipart/form-data">
                <div class="estrelas">
                    <input type="radio" id="vazio" name="estrela" value="" checked>
                    <input type="text" class="ocultar" name="id-usuario" value="<?php echo $_SESSION['id']; ?>" > 
                    <input type="text" class="ocultar" name="id-avaliado" value="<?php echo $id; ?>">
                    <input type="text" class="ocultar" name="tipo" value="<?php echo $tipo; ?>">
                    
                    <label for="estrela_um"><i class="fa"></i></label>
                    <input type="radio" id="estrela_um" name="estrela" value="1">
                    
                    <label for="estrela_dois"><i class="fa"></i></label>
                    <input type="radio" id="estrela_dois" name="estrela" value="2">
                    
                    <label for="estrela_tres"><i class="fa"></i></label>
                    <input type="radio" id="estrela_tres" name="estrela" value="3">
                    
                    <label for="estrela_quatro"><i class="fa"></i></label>
                    <input type="radio" id="estrela_quatro" name="estrela" value="4">
                    
                    <label for="estrela_cinco"><i class="fa"></i></label>
                    <input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>
                    
                    <input type="submit" value="Avaliar">
                    
                </div>
            </form>
        </div>    
    <?php endif; ?>
    </main>

    <footer>

    </footer>
</body>
</html>