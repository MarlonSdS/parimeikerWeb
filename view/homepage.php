<html>
    <head>
    <?php include'../util/commonHead.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/homepage.css">
    <title>Párimeiker — Ferramenta de promoção e gerenciamento para eventos</title>
    <?php 
            session_start();
            //caso por algum motivo o usuário acesse as páginas que requeram autenticação
            //sem se logar ele será redirecionado para a index
            if($_SESSION['logado'] != true){
                header("location: /parimeikerWeb/index.php");
            }
            $id = $_SESSION['id'];
        ?>
    </head>
    <body>
    <header>
                <?php include('../util/header.php'); ?>
        </header>
        

        <div id="vazio"></div>
        <main>
        <h1>Novos colaboradores</h1>
            <?php include("../controller/conexao.php");
                //pesquisa por empresas
                $result_nomes = "SELECT * FROM empresa WHERE id > 0 ORDER BY id DESC LIMIT 3";
                $resultado_nomes = mysqli_query($conexao, $result_nomes);
                
                while($rows_nomes = mysqli_fetch_array($resultado_nomes)){
                    $nome = $rows_nomes['nome'];
                    $id = $rows_nomes['id'];
                    ?>
                <div class="newUsers">
                    <img src="../userData/userPictures/Empresa/<?php echo $id; ?>portImage1.png" alt="">
                    <p><a href="visitProfile.php?tipo=empresa&id=<?php echo $id; ?>"><?php echo $nome; ?></a></p>
                    <br>
                </div>
                 <?php } ?>

                 <?php include("../controller/conexao.php");
                //pesquisa por autonomos
                $result_nomes = "SELECT * FROM autonomo WHERE id > 0 ORDER BY id DESC LIMIT 3";
                $resultado_nomes = mysqli_query($conexao, $result_nomes);
                
                while($rows_nomes = mysqli_fetch_array($resultado_nomes)){
                    $nome = $rows_nomes['nome'];
                    $id = $rows_nomes['id'];
                    ?>
                <div class="newUsers">
                    <img src="../userData/userPictures/Auto/<?php echo $id; ?>portImage1.png" alt="">
                    <p><a href="visitProfile.php?tipo=auto&id=<?php echo $id; ?>"><?php echo $nome; ?></a></p>
                    <br>
                </div>
                 <?php } ?>
        <h1>Mais bem avaliados</h1>
            <?php include("../controller/conexao.php");
                //pesquisa por empresas
                $result_nomes = "SELECT idEmpresa FROM notas WHERE nota > 3 AND idEmpresa > 0 ORDER BY nota DESC LIMIT 3";
                $resultado_nomes = mysqli_query($conexao, $result_nomes);
                while($rows_nomes = mysqli_fetch_array($resultado_nomes)){
                    $id = $rows_nomes['idEmpresa'];
                    $result_nomes = "SELECT * FROM empresa WHERE id = '$id'";
                    $resultado_nomes = mysqli_query($conexao, $result_nomes);
                    
                    while($rows_nomes = mysqli_fetch_array($resultado_nomes)){
                        $nome = $rows_nomes['nome'];
                        $id = $rows_nomes['id'];
                    ?>
                    <div class="newUsers">
                    <img src="../userData/userPictures/Empresa/<?php echo $id; ?>portImage1.png" alt="">
                    <p><a href="visitProfile.php?tipo=empresa&id=<?php echo $id; ?>"><?php echo $nome; ?></a></p>
                    <br>
                </div>
                 <?php } ?>
                 <?php } ?>
            <?php include("../controller/conexao.php");
                //pesquisa por autonomos
                $result_nomes = "SELECT idAutonomo FROM notas WHERE nota > 3 AND idAutonomo > 0 ORDER BY nota DESC LIMIT 3";
                $resultado_nomes = mysqli_query($conexao, $result_nomes);
                while($rows_nomes = mysqli_fetch_array($resultado_nomes)){
                    $id = $rows_nomes['idAutonomo'];
                    $result_nomes = "SELECT * FROM autonomo WHERE id = '$id'";
                    $resultado_nomes = mysqli_query($conexao, $result_nomes);
                    
                    while($rows_nomes = mysqli_fetch_array($resultado_nomes)){
                        $nome = $rows_nomes['nome'];
                        $id = $rows_nomes['id'];
                    ?>
                    <div class="newUsers">
                    <img src="../userData/userPictures/Auto/<?php echo $id; ?>portImage1.png" alt="">
                    <p><a href="visitProfile.php?tipo=auto&id=<?php echo $id; ?>"><?php echo $nome; ?></a></p>
                    <br>
                </div>
                 <?php } ?>
                 <?php } ?>

        </main>
        <footer></footer>
    </body>
</html>