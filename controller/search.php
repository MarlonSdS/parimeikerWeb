<?php 

    $termos = $_GET['search'];
    if(isset($termos)){
       
        pesquisaPorNome();
    }

    function pesquisaPorNome(){
        include("conexao.php");
        $termos = $_GET['search'];
        //pesquisa por empresas
        $result_nomes = "SELECT * FROM empresa WHERE nome LIKE '%$termos%' LIMIT 5";
        $resultado_nomes = mysqli_query($conexao, $result_nomes);
        
        while($rows_nomes = mysqli_fetch_array($resultado_nomes)){
            echo "Empresas encontradas: ".$rows_nomes['nome']."<br>";
        }
        //pesquisa por autonomos
        $result_nomes = "SELECT * FROM autonomo WHERE nome LIKE '%$termos%' LIMIT 5";
        $resultado_nomes = mysqli_query($conexao, $result_nomes);
        
        while($rows_nomes = mysqli_fetch_array($resultado_nomes)){
            echo "Autonomos encontradas: ".$rows_nomes['nome']."<br>";
        }
    }

?>