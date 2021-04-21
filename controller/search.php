<?php 

    $termos = $_GET['search'];
    if(isset($termos)){
       
        pesquisaPorNomeEmpresa();
        pesquisaPorNomeAutonomo();
        pesquisaPorTagAutonomo();
        pesquisaPorTagEmpresa();
    }

    $nomes = [];

    function pesquisaPorNomeEmpresa(){
        include("conexao.php");
        $termos = $_GET['search'];
        //pesquisa por empresas
        $result_nomes = "SELECT * FROM empresa WHERE nome LIKE '%$termos%' LIMIT 5";
        $resultado_nomes = mysqli_query($conexao, $result_nomes);
        
        while($rows_nomes = mysqli_fetch_array($resultado_nomes)){
            echo "Empresas encontradas: ".$rows_nomes['nome']."<br>";
        }
        
    }

    function pesquisaPorNomeAutonomo(){
        include("conexao.php");
        $termos = $_GET['search'];
        //pesquisa por autonomos
        $result_nomes = "SELECT * FROM autonomo WHERE nome LIKE '%$termos%' LIMIT 5";
        $resultado_nomes = mysqli_query($conexao, $result_nomes);
        
        while($rows_nomes = mysqli_fetch_array($resultado_nomes)){
            echo "Autonomos encontradas: ".$rows_nomes['nome']."<br>";
            $nomes = [$rows_nomes['nome']];
            echo $nomes[1];
        }
    }

    function pesquisaPorTagEmpresa(){
        include("conexao.php");
        $termos = $_GET['search'];
        $result_tags = "SELECT * FROM tagsempresa WHERE tag LIKE '%$termos%' LIMIT 5";
        $resultado_tags = mysqli_query($conexao, $result_tags);
        
        while($rows_tags = mysqli_fetch_array($resultado_tags)){
            $id = $rows_tags['id'];
            $result_nomes = "SELECT * FROM empresa WHERE id='$id'";
            $resultado_nomes = mysqli_query($conexao, $result_nomes);
            while($rows_nomes = mysqli_fetch_array($resultado_nomes)){
                echo "Empresas encontradas: ".$rows_nomes['nome']."<br>";
            }
        }
    }

    function pesquisaPorTagAutonomo(){
        include("conexao.php");
        $termos = $_GET['search'];
        $result_tags = "SELECT * FROM tagsautonomo WHERE tag LIKE '%$termos%' LIMIT 5";
        $resultado_tags = mysqli_query($conexao, $result_tags);
        
        while($rows_tags = mysqli_fetch_array($resultado_tags)){
            $id = $rows_tags['id'];
            $result_nomes = "SELECT * FROM autonomo WHERE id='$id'";
            $resultado_nomes = mysqli_query($conexao, $result_nomes);
            while($rows_nomes = mysqli_fetch_array($resultado_nomes)){
                echo "Autonomos encontrados: ".$rows_nomes['nome']."<br>";
                echo "<img src='../userData/userProfilePictures/Autonomo/userProfile$id.png'>";
            }
        }
    }

?>