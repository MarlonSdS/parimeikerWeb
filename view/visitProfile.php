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
        $idd = $_GET['id'];
        $type = $_GET['tipo'];
        $user = "";
        if($type == "empresa"){
            include("../controller/conexao.php");
            $result_user = "SELECT * FROM empresa WHERE id = '$idd'";
            $resultado_user = mysqli_query($conexao, $result_user);
            $user = mysqli_fetch_array($resultado_user);
        }elseif($type == "auto"){
            include("../controller/conexao.php");
            $result_user = "SELECT * FROM autonomo WHERE id = '$idd'";
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
        <?php include("../controller/getFile.php"); 
        include("../util/header.php"); 
        ?>
    </header>
    <div id="vazio"></div>
    
    <main>
    <div class="infosetexto">
        <div class="infos">
            <?php// include("../controller/getFile.php"); ?>
            <?php if($type == "empresa"): ?>
                <?php pegarImagemPerfil($type, $idd, "profile-picture"); ?>
            <?php elseif($type == "auto"): ?>
                <?php pegarImagemPerfil($type, $idd, "profile-picture"); ?>
            <?php else: ?>
                <?php pegarImagemPerfil($type, $idd, "profile-picture"); ?>
            <?php endif; ?>
            
            <p><i class="fas fa-envelope" class="icons-prof">  </i> <?php echo $user['email']; ?> </p>
            <p><i class="fab fa-whatsapp fa-lg" class="icons-prof">  </i> <?php echo $user['tel']; ?> </p>

            
        </div>
        
        <div class="texto">
            <h1><p><?php echo $user['nome']; ?></p></h1>
        <?php if($type == "empresa"){ ?>
            <p class="texto-apre"><?php pegarTextoPerfil($type, $idd); ?></p>
        <?php }elseif($type == "auto"){ ?>
            <p class="texto-apre"><?php pegarTextoPerfil($type, $idd); ?></p>
        <?php } ?>
        </div>
    </div>
    
        

        <div class="portfolio">
            <div class="portfolio-card">
                <?php if($type == "empresa"): ?>
                    <?php pegarImagemPortfolio($type, $idd, 1); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($type, $idd, 1); ?></p>
                    </div>
                    
                <?php elseif($type == "auto"): ?>
                    <?php pegarImagemPortfolio($type, $idd, 1); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($type, $idd, 1); ?></p>
                    </div>
                    
                <?php endif; ?>
            </div>
            <div class="portfolio-card">
                <?php if($type == "empresa"): ?>
                    <?php pegarImagemPortfolio($type, $idd, 2); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($type, $idd, 2); ?></p>
                    </div>
                    
                <?php elseif($type == "auto"): ?>
                    <?php pegarImagemPortfolio($type, $idd, 2); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($type, $idd, 2); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="portfolio-card">
                <?php if($type == "empresa"): ?>
                    <?php pegarImagemPortfolio($type, $idd, 3); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($type, $idd, 3); ?></p>
                    </div>
                    
                <?php elseif($type == "auto"): ?>
                    <?php pegarImagemPortfolio($type, $idd, 3); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($type, $idd, 3); ?></p>
                    </div>
                    
                <?php endif; ?>
            </div>
        </div>

        <h2>Avalia????es dos clientes</h2>

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
                    <input type="text" class="ocultar" name="id-avaliado" value="<?php echo $idd; ?>">
                    <input type="text" class="ocultar" name="tipo" value="<?php echo $type; ?>">
                    
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
                <div class="campo-coment">
                    <p>Deixe um coment??rio</p>
                    <textarea name="coment" id="" cols="30" rows="5" class="form-control"></textarea><br>
                </div>
                <input type="submit" value="Avaliar" class="btn btn-danger">
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
                if($type == "auto"){
                    include("../controller/conexao.php");
                    $result_nomes = "SELECT * FROM notas WHERE idAutonomo LIKE '$idd' ORDER BY data DESC LIMIT 10";
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
                        <?php pegarImagemPerfil("cliente", $rows_nomes['idUser'], ""); ?>
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
            <br>
            <?php endwhile; }?>
            <?php
                if($type == "empresa"){
                    include("../controller/conexao.php");
                    $result_nomes = "SELECT * FROM notas WHERE idEmpresa LIKE '$idd' ORDER BY data DESC LIMIT 10";
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
                        <?php pegarImagemPerfil("cliente", $rows_nomes['idUser'], ""); ?>
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

    <?php include("../util/footer.php"); ?>         

    </footer>
</body>
</html>