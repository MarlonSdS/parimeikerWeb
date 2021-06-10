<?php


    


function pegarImagemPerfil($tipo, $id, $classe){
    $servidor = "localhost";
        $banco = "parimeiker";
        $usuario = "root";
        $password = "";
    
        $conexao = mysqli_connect($servidor, $usuario, $password, $banco)or  die("Conexão falhou!". mysqli_connect_error);
    if($tipo == "cliente"){
        $query = "SELECT * FROM userdata WHERE idUsuario = '$id'";
        $result = $conexao->query($query);
        $row = mysqli_fetch_array($result);
        $imagem = $row['profileImage'];
        
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profileImage'] ).'" class="'.$classe.'"/>';
    
    }elseif($tipo == "empresa"){
        $query = "SELECT * FROM userdata WHERE idEmpresa = '$id'";
        $result = $conexao->query($query);
        $row = mysqli_fetch_array($result);
        $imagem = $row['profileImage'];
        
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profileImage'] ).'" class="'.$classe.'"/>';
    }elseif($tipo == "auto"){
        $query = "SELECT * FROM userdata WHERE idAutonomo = '$id'";
        $result = $conexao->query($query);
        $row = mysqli_fetch_array($result);
        $imagem = $row['profileImage'];
        
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profileImage'] ).'" class="'.$classe.'"/>';
    }
    
   // var_dump($album);
}

function pegarTextoPerfil($tipo, $id){
    $servidor = "localhost";
        $banco = "parimeiker";
        $usuario = "root";
        $password = "";
    
        $conexao = mysqli_connect($servidor, $usuario, $password, $banco)or  die("Conexão falhou!". mysqli_connect_error);
    if($tipo == "empresa"){
        $query = "SELECT * FROM userdata WHERE idEmpresa = '$id'";
        $result = $conexao->query($query);
        $row = mysqli_fetch_array($result);
        $texto = $row['profileText'];
         echo $texto;
    }elseif($tipo == "auto"){
        $query = "SELECT * FROM userdata WHERE idAutonomo = '$id'";
        $result = $conexao->query($query);
        $row = mysqli_fetch_array($result);
        $texto = $row['profileText'];
         echo $texto;
    }
}

function pegarImagemPortfolio($tipo, $id, $num){
    $servidor = "localhost";
        $banco = "parimeiker";
        $usuario = "root";
        $password = "";
    
        $conexao = mysqli_connect($servidor, $usuario, $password, $banco)or  die("Conexão falhou!". mysqli_connect_error);
    if($tipo == "empresa"){
        $query = "SELECT * FROM userdata WHERE idEmpresa = '$id'";
        $result = $conexao->query($query);
        $row = mysqli_fetch_array($result);
        $imagem = "portImage$num";
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row[$imagem] ).'"/>';
    }elseif($tipo == "auto"){
        $query = "SELECT * FROM userdata WHERE idAutonomo = '$id'";
        $result = $conexao->query($query);
        $row = mysqli_fetch_array($result);
        $imagem = $row['profileImage'];
        
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['profileImage'] ).'" class="'.$classe.'"/>';
}

    
}

function pegarTextoPortfolio($tipo, $id, $num){
    $servidor = "localhost";
        $banco = "parimeiker";
        $usuario = "root";
        $password = "";
    
        $conexao = mysqli_connect($servidor, $usuario, $password, $banco)or  die("Conexão falhou!". mysqli_connect_error);
    if($tipo == "empresa"){
        $query = "SELECT * FROM userdata WHERE idEmpresa = '$id'";
        $result = $conexao->query($query);
        $row = mysqli_fetch_array($result);
        $indice = "portText$num";
        $texto = $row[$indice];
         echo $texto;
    }elseif($tipo == "auto"){
        $query = "SELECT * FROM userdata WHERE idAutonomo = '$id'";
        $result = $conexao->query($query);
        $row = mysqli_fetch_array($result);
        $indice = "portText$num";
        $texto = $row[$indice];
         echo $texto;
    }
}
 


?>