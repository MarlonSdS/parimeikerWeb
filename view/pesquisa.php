<html>
    <head>
        <?php include("../util/commonHead.php"); ?>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Párimeiker — Ferramenta de promoção e gerenciamento para eventos</title>
    <link rel="stylesheet" href="../assets/styles/pesquisa.css">
    <?php 
            session_start();
            
            $termos = $_GET['search'];
            
        ?>
    </head>
    <body>
    
        <header>
        
            <?php 
            include_once("../controller/getFile.php");
            include("../util/header.php"); ?>
            
        </header>
        <div id="vazio"></div>

        <!-- DIV PARA BUSCA POR TAG NOME-->

        <div class="pagina"> <!-- CAIXA DIV PRINCIPAL-->
            <fieldset> <!-- QUADRADO LARANJA-->
            
    <?php if(isset($termos)){
            
            pesquisaPorNomeEmpresa();
            pesquisaPorNomeAutonomo();
            pesquisaPorTagAutonomo();
            pesquisaPorTagEmpresa();
            
        } ?>
<!-- FOTO 1 -->
<?php
function pesquisaPorNomeEmpresa(){
    include("../controller/conexao.php");
    $termos = $_GET['search'];
    //pesquisa por empresas
    $result_nomes = "SELECT * FROM empresa WHERE nome LIKE '%$termos%' LIMIT 5";
    $resultado_nomes = mysqli_query($conexao, $result_nomes);
    
    while($rows_nomes = mysqli_fetch_array($resultado_nomes)):?>
<div class="foto">
    <?php pegarImagemPerfil("empresa", $rows_nomes['id'], "" ); ?>
    <div class="data">
            <div class="nome" >
            <a href="/parimeikerWeb/view/visitProfile.php?id=<?php echo $rows_nomes['id'];?>&tipo=empresa"><?php echo $rows_nomes['nome']; ?></a>
        </div>

        <div class="descricao">
            <p><?php pegarTextoPerfil("empresa", $rows_nomes['id']); ?></p> 
        </div>
        <div class="tag">
        <p> TAG </p>
        <p> TAG </p>
        <p> TAG </p>
        </div>  
    </div>
    
</div>
<?php endwhile; }?>     
<!-- FOTO 2 -->
<?php function pesquisaPorNomeAutonomo(){
        include("../controller/conexao.php");
        $termos = $_GET['search'];
        //pesquisa por autonomos
        $result_nomes = "SELECT * FROM autonomo WHERE nome LIKE '%$termos%' LIMIT 5";
        $resultado_nomes = mysqli_query($conexao, $result_nomes);
        
        while($rows_nomes = mysqli_fetch_array($resultado_nomes)):?>
<div class="foto">
    <?php pegarImagemPerfil("auto", $rows_nomes['id'], "" ); ?>
    <div class="data">
            <div class="nome" >
            <a href="/parimeikerWeb/view/visitProfile.php?id=<?php echo $rows_nomes['id'];?>&tipo=auto"><?php echo $rows_nomes['nome']; ?></a>
            
        </div>

        <div class="descricao">
            <p><?php pegarTextoPerfil("auto", $rows_nomes['id']); ?></p> 
        </div>
        <div class="tag">
        <p> TAG </p>
        <p> TAG </p>
        <p> TAG </p>
        </div>  
    </div>
    
</div>
<?php endwhile; } ?>
<!-- FOTO 3 -->
<?php function pesquisaPorTagEmpresa(){
        include("../controller/conexao.php");
        $termos = $_GET['search'];
        $result_tags = "SELECT * FROM tagsempresa WHERE tag LIKE '%$termos%' LIMIT 5";
        $resultado_tags = mysqli_query($conexao, $result_tags);
        $nomes =[];
        $ids = [];
            while($rows_tags = mysqli_fetch_array($resultado_tags)){
            $id = $rows_tags['id'];
            $result_nomes = "SELECT * FROM empresa WHERE id='$id'";
            $resultado_nomes = mysqli_query($conexao, $result_nomes);
            while($rows_nomes = mysqli_fetch_array($resultado_nomes)){
                $nomes = [$rows_nomes['nome']];
                $ids = [$rows_nomes['id']];
            } }
        
        
            for ($i=0; $i < sizeof($nomes); $i++):?>
            <div class="foto">
            <?php pegarImagemPerfil("empresa", $id[$i], "" ); ?>
    <div class="data">
            <div class="nome" >
            <a href="/parimeikerWeb/view/visitProfile.php?id=<?php echo $ids[$i];?>&tipo=empresa"><?php echo $nomes[$i]; ?></a>
        </div>

        <div class="descricao">
            <p><?php pegarTextoPerfil("auto", $id[$i]); ?></p> 
        </div>
        <div class="tag">
        <p> TAG </p>
        <p> TAG </p>
        <p> TAG </p>
        </div>  
    </div>
    
</div>
<?php endfor; }?>
<?php function pesquisaPorTagAutonomo(){
        include("../controller/conexao.php");
        $termos = $_GET['search'];
        $result_tags = "SELECT * FROM tagsautonomo WHERE tag LIKE '%$termos%' LIMIT 5";
        $resultado_tags = mysqli_query($conexao, $result_tags);
        $nomes =[];
        $ids = [];
        $tags = [];
            while($rows_tags = mysqli_fetch_array($resultado_tags)){
            $id = $rows_tags['id'];
            $tags = $rows_tags['tag'];
            $result_nomes = "SELECT * FROM autonomo WHERE id='$id'";
            $resultado_nomes = mysqli_query($conexao, $result_nomes);
            while($rows_nomes = mysqli_fetch_array($resultado_nomes)){
                $nomes = [$rows_nomes['nome']];
                $ids = [$rows_nomes['id']];
            } }
        
        
            for ($i=0; $i < sizeof($nomes); $i++):?>
            <div class="foto">
            <?php pegarImagemPerfil("auto", $id[$i], "" ); ?>
    <div class="data">
            <div class="nome" >
            <a href="/parimeikerWeb/view/visitProfile.php?id=<?php echo $ids[$i];?>&tipo=auto"><?php echo $nomes[$i]; ?></a>
        </div>

        <div class="descricao">
            <p><?php pegarTextoPerfil("auto", $id[$i]); ?></p> 
        </div>
        <div class="tag">
        <!--<?php if(sizeof($tags) >= 3): ?>
        <p> <?php echo $tags[0]; ?> </p>
        <p> <?php echo $tags[1]; ?> </p>
        <p> <?php echo $tags[2]; ?> </p>
        <?php endif; ?>-->
        </div>  
    </div>
    
</div>
<?php endfor; }?>
    </div>
</fieldset>
     

        <footer>
            <?php include("../util/footer.php") ?>
        </footer>
    </body>
</html>