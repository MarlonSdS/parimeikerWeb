<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    


    <!--para ser mais prático o head de todas as páginas será feito apenas incluindo este arquivo com informções
    pré definidas, com excessão apenas do que é exclusivo para cada página -->
    <?php include("util/commonHead.php"); ?>
    <!-- <link rel="stylesheet" href="assets/styles/index.css"> -->
    
    <link rel="stylesheet" href="style.css">
    <!-- Link Style do Header-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0.">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Link Style do Footer-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
    <title>Party Maker — Ferramenta de Promoção de Eventos</title>
    <?php session_start(); ?>
    <!--Se o usuário estiver logado ele será mandado para a homepage-->
    <?php if (isset($_SESSION['logado'])) {
        if($_SESSION['logado'] == true){
            
        }

    } ?>

</head>
<body>
    


    <!-- Header -->
    <?php include("controller/getFile.php"); ?>
    <?php include("util/header.php"); ?>



<div id="slider">
		<figure>
			<img src="assets/images/Banner-03.png">
			<img src="assets/images/Banner-02.png">
			<img src="assets/images/Banner-01.png">
			<img src="assets/images/Banner-02.png">
			<img src="assets/images/Banner-03.png">
		</figure>
	</div>

<!-- Feed -->

<h1 class="titulo-feed">MAIS AVALIADOS</h1>

        <div class="container-feed">
        <?php include("controller/conexao.php"); ?>
               
        <?php 
            $query = "SELECT * FROM notas WHERE nota > 3 AND idEmpresa > 0 ORDER BY nota DESC LIMIT 4";
            $query2 = "SELECT * FROM empresa";
            $result = mysqli_query($conexao, $query);
            $result2 = mysqli_query($conexao, $query2);
            while($linhas = mysqli_fetch_array($result)){
                $idb = $linhas['idEmpresa']; 
                $query2 = "SELECT * FROM empresa WHERE id = '$idb'";
                $result2 = mysqli_query($conexao, $query2);
                $nomes = mysqli_fetch_array($result2);
                $nome = $nomes['nome'];
                ?>
                <div class="feed">
                <?php pegarImagemPortfolio("empresa", $idb, 1); ?>
                
                <div class="desc">
                <a href="/parimeikerWeb/view/visitProfile.php?id=<?php echo $idb; ?>&tipo=empresa"><?php echo $nome;?></a>
                </div>
                </div>
            <?php }
        ?>
        </div>
        <div class="container-feed">
            
        <?php 
            $query = "SELECT * FROM notas WHERE nota > 3 AND idAutonomo > 0 ORDER BY nota DESC LIMIT 4";
           
            $result = mysqli_query($conexao, $query);
            while($linhas = mysqli_fetch_array($result)){
                $idb = $linhas['idAutonomo']; 
                $query2 = "SELECT * FROM autonomo WHERE id = '$idb'";
                $result2 = mysqli_query($conexao, $query2);
                $nomes = mysqli_fetch_array($result2);
                $nome = $nomes['nome'];
                ?>
                <div class="feed">
                <?php pegarImagemPortfolio("empresa", $idb, 1); ?>
                
                <div class="desc">
                <a href="/parimeikerWeb/view/visitProfile.php?id=<?php echo $idb; ?>&tipo=auto"><?php echo $nome;?></a>
                </div>
                </div>
            <?php }
        ?>
        </div>


        <h1 class="titulo-feed2">MAIS RECENTES</h1>
        <div class="container-feed2">
        <?php 
            $query = "SELECT * FROM empresa ORDER BY id DESC LIMIT 4";
            $result = mysqli_query($conexao, $query);
            while($linhas = mysqli_fetch_array($result)){
                $idb = $linhas['id']; 
                $nome = $linhas['nome'];
                ?>
                <div class="feed">
                <?php pegarImagemPortfolio("empresa", $idb, 1); ?>
                
                <div class="desc">
                <a href="/parimeikerWeb/view/visitProfile.php?id=<?php echo $idb; ?>&tipo=empresa"><?php echo $nome;?></a>
                </div>
                </div>
            <?php }
        ?>
        </div>


    <!-- Footer -->

   

    <?php include("util/footer.php"); ?>



</body>
</html>