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
            <?php include("../controller/getFile.php"); ?>
            <?php if($tipo == "empresa"): ?>
                <?php pegarImagemPerfil($tipo, $id, "profile-picture"); ?>
            <?php elseif($tipo == "auto"): ?>
                <?php pegarImagemPerfil($tipo, $id, "profile-picture"); ?>
            <?php else: ?>
                <?php pegarImagemPerfil($tipo, $id, "profile-picture"); ?>
            <?php endif; ?>
            
            <p><img src="../assets/images/icons/gmail.png" class="icon"><?php echo $user['email']; ?></p>
            <p><img src="../assets/images/icons/whatsapp.png" class="icon"><?php echo $user['tel']; ?></p>

            
        </div>
        
        <div class="texto">
        
            <h1><p><?php echo $user['nome']; ?></p></h1>
        <?php if($tipo == "empresa"): ?>
            <p class="texto-apre"><?php pegarTextoPerfil($tipo, $id); ?></p>
        <?php elseif($tipo == "auto"): ?>
            <p class="texto-apre"> <?php pegarTextoPerfil($tipo, $id); ?></p>
        <?php endif; ?>
        </div>
    </div>
    
        

        <div class="portfolio">
            <div class="portfolio-card">
                <?php if($tipo == "empresa"): ?>
                    <?php pegarImagemPortfolio($tipo, $id, 1); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($tipo, $id, 1); ?></p>
                    </div>
                    
                <?php elseif($tipo == "auto"): ?>
                    <img src="../userData/userPictures/Auto/<?php echo $id?>portImage1.png" alt="">
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($tipo, $id, 1); ?></p>
                    </div>
                    
                <?php endif; ?>
            </div>
            <div class="portfolio-card">
                <?php if($tipo == "empresa"): ?>
                    <?php pegarImagemPortfolio($tipo, $id, 2); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($tipo, $id, 2); ?></p>
                    </div>
                    
                <?php elseif($tipo == "auto"): ?>
                    <?php pegarImagemPortfolio($tipo, $id, 2); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($tipo, $id, 2); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="portfolio-card">
                <?php if($tipo == "empresa"): ?>
                    <?php pegarImagemPortfolio($tipo, $id, 3); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($tipo, $id, 3); ?></p>
                    </div>
                    
                <?php elseif($tipo == "auto"): ?>
                    <?php pegarImagemPortfolio($tipo, $id, 3); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($tipo, $id, 3); ?></p>
                    </div>
                    
                <?php endif; ?>
            </div>
        </div>

        <h2>Avaliações dos clientes</h2>

        <?php  
                if(isset($_SESSION['usertype']) and $_SESSION['usertype'] == "cliente"): ?>
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
                    
                </div>
                <div class="ampo-coment">
                    <p>Deixe um comentário</p>
                    <textarea name="coment" id="" cols="30" rows="5"></textarea>
                </div>
                <input type="submit" value="Avaliar">
            </form>
        </div>    
    <?php endif; ?>
        <div>
            <?php 
                function formatarData($data){
                    $dataFormatada = explode("-", $data);
                    $ano = $dataFormatada[0];
                    $mes = $dataFormatada[1];
                    $dia = $dataFormatada[2];
                    return "$dia/$mes/$ano";
                }
                if($tipo == "auto"){
                    include("../controller/conexao.php");
                    $result_nomes = "SELECT * FROM notas WHERE idAutonomo LIKE '$id' ORDER BY data DESC LIMIT 10";
                    $resultado_nomes = mysqli_query($conexao, $result_nomes);
                    
                    while($rows_nomes = mysqli_fetch_array($resultado_nomes)):
                
            ?>
            <div class="coment">
                <?php 
                    $idUser = $rows_nomes['idUser'];
                    include("../controller/conexao.php");
                    $search_user = "SELECT * FROM cliente WHERE id LIKE '$idUser' LIMIT 10";
                    $result_user = mysqli_query($conexao, $search_user);
                    $userName = mysqli_fetch_array($result_user);
                    $userName = $userName['nome'];
                ?>
                <div class="coment-infos">
                    <div>
                        <img src="../userData/userProfilePictures/Cliente/userProfile<?php echo $rows_nomes['idUser']; ?>.png" alt="">
                    <h2><?php echo $userName; ?> </h2>
                    </div>
                    
                    <h2><?php $data = $rows_nomes['data'];
                    echo formatarData($data); ?></h2>
                </div>
                <div class="coment-box">
                    <p><?php echo $rows_nomes['comentario']; ?></p>
                    <p class="nota">Nota: <?php echo $rows_nomes['nota']; ?></p>
                </div>
            </div>
            <?php endwhile; }?>
        </div>
    </main>

    <footer>

    </footer>
</body>
</html>