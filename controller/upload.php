<?php

    session_start();
    $id = $_SESSION['id'];
    $texto = "";
    $userType = "";      
    if(isset($_POST['editar'])){
       criarLinhaNoBanco();
       guardarTexto();
       guardarImagem();
       guardarTextoPortfolio();
    };
    //verifica se o usuario é cliente, autonomo ou empresa
    function verificarTipoUsuario(){
        if(strlen($_SESSION['cpf']) > 2){
            return "auto";
        }elseif(strlen($_SESSION['cnpj']) > 2){
            return "empresa";
        }else{
            return "cliente";
        }
    }

    function criarLinhaNoBanco(){
        include("conexao.php");
        $id = $_SESSION['id'];
        if(verificarTipoUsuario() == "auto"){
            $validar = $conexao->query("SELECT * FROM userdata WHERE idAutonomo='$id'")
        or die($conexao->error);
            if($validar->num_rows == 0){
                $query = "INSERT INTO userdata(idAutonomo) VALUES('$id')";
                $operacao = mysqli_query($conexao, $query);
            }
        }
        if(verificarTipoUsuario() == "empresa"){
            $validar = $conexao->query("SELECT * FROM userdata WHERE idEmpresa='$id'")
        or die($conexao->error);
            if($validar->num_rows == 0){
                $query = "INSERT INTO userdata(idEmpresa) VALUES('$id')";
                $operacao = mysqli_query($conexao, $query);
            }
        }
        if(verificarTipoUsuario() == "cliente"){
            $validar = $conexao->query("SELECT * FROM userdata WHERE idUsuario='$id'")
        or die($conexao->error);
            if($validar->num_rows < 1){
                $query = "INSERT INTO userdata(idUsuario) VALUES('$id')";
                $operacao = mysqli_query($conexao, $query);
            }
        }
    }
        
    function criarDadosPadrao($tipo, $id){
        criarLinhaNoBanco();
        $texto = "Olá! Eu estou usando o PartyMaker!";
        if($tipo == "auto"){
            $query = "UPDATE userdata SET profileText = '$texto' WHERE idAutonomo = '$id'";
            $operacao = mysqli_query($conexao, $query);
            echo $texto;
        }
        
    }

    function guardarTexto(){
        include("conexao.php");
        $id = $_SESSION['id'];
         if(verificarTipoUsuario() == "auto"){
             $texto = $_POST['texto'];
            $query = "UPDATE userdata SET profileText = '$texto' WHERE idAutonomo = '$id'";
            $operacao = mysqli_query($conexao, $query);
           // header("location: ../view/profile.php");
        }
        if(verificarTipoUsuario() == "empresa"){
            $texto = $_POST['texto'];
            $query = "UPDATE userdata SET profileText = '$texto' WHERE idEmpresa = '$id'";
            $operacao = mysqli_query($conexao, $query);
           // header("location: ../view/profile.php");
        }
    }
       
       /* if($userType == "cliente"){
            $texto = fopen("/parimeikerWeb/userData/userTexts/Cliente/userText$id.txt", "w");
            if($texto == false) die ("não foi possível criar o arquivo");
            fwrite($texto, $_POST['texto']);
            fclose($texto);
            header("location: ../view/profile.php");
        } */


    function guardarImagem(){
        include("conexao.php");
        $id = $_SESSION['id'];
        if($_FILES['picture']['tmp_name'] > 2){
            $imagem = $_FILES['picture']['tmp_name'];
            $tamanho = $_FILES['picture']['size'];
            $tipo = $_FILES['picture']['type'];
            $nome = $_FILES['picture']['name'];

            $fp = fopen($imagem, "rb");
            $conteudo = fread($fp, $tamanho);
            $conteudo = addslashes($conteudo);
            fclose($fp);
            
            if(verificarTipoUsuario() == "empresa"){
                $query = "UPDATE userdata SET profileImage='$conteudo' WHERE idEmpresa = '$id'";
                $operacao = mysqli_query($conexao, $query);
            }
            if(verificarTipoUsuario() == "auto"){
                $query = "UPDATE userdata SET profileImage='$conteudo' WHERE idAutonomo = '$id'";
                $operacao = mysqli_query($conexao, $query);
            }
            if(verificarTipoUsuario() == "cliente"){
                $id = $_SESSION['id'];
                $query = "UPDATE userdata SET profileImage='$conteudo' WHERE idUsuario = '$id'";
                $operacao = mysqli_query($conexao, $query);
            }
            
        }
        if (isset($_FILES['img1']) or isset($_FILES['img2']) or isset($_FILES['img3'])) {
            if(verificarTipoUsuario() == "empresa"){
                if(isset($_FILES['img1'])){
                    $imagem = $_FILES['img1']['tmp_name'];
                    $tamanho = $_FILES['img1']['size'];
                    $tipo = $_FILES['img1']['type'];
                    $nome = $_FILES['img1']['name'];
                    if($tamanho > 2){
                        $fp = fopen($imagem, "rb");
                    $conteudo = fread($fp, $tamanho);
                    $conteudo = addslashes($conteudo);
                    fclose($fp);

                    $query = "UPDATE userdata SET portImage1 = '$conteudo' WHERE idEmpresa = '$id'";
                    $operacao = mysqli_query($conexao, $query);
                    }
                    
                }
                if(isset($_FILES['img2'])){
                    $imagem = $_FILES['img2']['tmp_name'];
                    $tamanho = $_FILES['img2']['size'];
                    $tipo = $_FILES['img2']['type'];
                    $nome = $_FILES['img2']['name'];
                    if($tamanho > 2){
                       $fp = fopen($imagem, "rb");
                    $conteudo = fread($fp, $tamanho);
                    $conteudo = addslashes($conteudo);
                    fclose($fp);

                    $query = "UPDATE userdata SET portImage2 = '$conteudo' WHERE idEmpresa = '$id'";
                    $operacao = mysqli_query($conexao, $query); 
                    }
                    
                }
                if(isset($_FILES['img3'])){
                    $imagem = $_FILES['img3']['tmp_name'];
                    $tamanho = $_FILES['img3']['size'];
                    $tipo = $_FILES['img3']['type'];
                    $nome = $_FILES['img3']['name'];
                    if($tamanho > 2){
                        $fp = fopen($imagem, "rb");
                    $conteudo = fread($fp, $tamanho);
                    $conteudo = addslashes($conteudo);
                    fclose($fp);

                    $query = "UPDATE userdata SET portImage3 = '$conteudo' WHERE idEmpresa = '$id'";
                    $operacao = mysqli_query($conexao, $query);
                    }
                    
                }
                
            }elseif(verificarTipoUsuario() == "auto"){
                if(isset($_FILES['img1'])){
                    $imagem = $_FILES['img1']['tmp_name'];
                    $tamanho = $_FILES['img1']['size'];
                    $tipo = $_FILES['img1']['type'];
                    $nome = $_FILES['img1']['name'];
                    if($tamanho > 2){
                      $fp = fopen($imagem, "rb");
                    $conteudo = fread($fp, $tamanho);
                    $conteudo = addslashes($conteudo);
                    fclose($fp);

                    $query = "UPDATE userdata SET portImage1 = '$conteudo' WHERE idAutonomo = '$id'";
                    $operacao = mysqli_query($conexao, $query);  
                    }
                    
                }
                if(isset($_FILES['img2'])){
                    $imagem = $_FILES['img2']['tmp_name'];
                    $tamanho = $_FILES['img2']['size'];
                    $tipo = $_FILES['img2']['type'];
                    $nome = $_FILES['img2']['name'];
                    if($tamanho > 2){
                       $fp = fopen($imagem, "rb");
                    $conteudo = fread($fp, $tamanho);
                    $conteudo = addslashes($conteudo);
                    fclose($fp);

                    $query = "UPDATE userdata SET portImage2 = '$conteudo' WHERE idAutonomo = '$id'";
                    $operacao = mysqli_query($conexao, $query); 
                    }
                    
                }
                if(isset($_FILES['img3'])){
                    $imagem = $_FILES['img3']['tmp_name'];
                    $tamanho = $_FILES['img3']['size'];
                    $tipo = $_FILES['img3']['type'];
                    $nome = $_FILES['img3']['name'];
                    if($tamanho > 2){
                        $fp = fopen($imagem, "rb");
                    $conteudo = fread($fp, $tamanho);
                    $conteudo = addslashes($conteudo);
                    fclose($fp);

                    $query = "UPDATE userdata SET portImage3 = '$conteudo' WHERE idAutonomo = '$id'";
                    $operacao = mysqli_query($conexao, $query);
                    }
                    
                }
            }
        }
    }
        /*if(isset($_FILES['picture']['name'])){
            if($userType == "empresa"){
                $destino = "../userData/userProfilePictures/Empresa/userProfile{$id}.png";
            }elseif($userType == "auto"){
                $destino = "../userData/userProfilePictures/Autonomo/userProfile{$id}.png";
            }else{
                $destino = "../userData/userProfilePictures/Cliente/userProfile{$id}.png";
            }
            
            
            $arquivo_tmp = $_FILES['picture']['tmp_name'];
            
            move_uploaded_file( $arquivo_tmp, $destino  );
           // header("location: ../view/profile.php");
        }*/

        
    function guardarTextoPortfolio(){
        include("conexao.php");
        $id = $_SESSION['id'];
        if(verificarTipoUsuario() == "empresa"){
            if(isset($_POST['item1'])){
                $texto = $_POST['item1'];
                $query = "UPDATE userdata SET portText1 = '$texto' WHERE idEmpresa = '$id'";
                $operacao = mysqli_query($conexao, $query);
            }
            if(isset($_POST['item2'])){
                $texto = $_POST['item2'];
                $query = "UPDATE userdata SET portText2 = '$texto' WHERE idEmpresa = '$id'";
                $operacao = mysqli_query($conexao, $query);
            }
            if(isset($_POST['item3'])){
                $texto = $_POST['item3'];
                $query = "UPDATE userdata SET portText3 = '$texto' WHERE idEmpresa = '$id'";
                $operacao = mysqli_query($conexao, $query);
            }
        }elseif(verificarTipoUsuario() == "auto"){
            if(isset($_POST['item1'])){
                $texto = $_POST['item1'];
                $query = "UPDATE userdata SET portText1 = '$texto' WHERE idAutonomo = '$id'";
                $operacao = mysqli_query($conexao, $query);
            }
            if(isset($_POST['item2'])){
                $texto = $_POST['item2'];
                $query = "UPDATE userdata SET portText2 = '$texto' WHERE idAutonomo = '$id'";
                $operacao = mysqli_query($conexao, $query);
            }
            if(isset($_POST['item3'])){
                $texto = $_POST['item3'];
                $query = "UPDATE userdata SET portText3 = '$texto' WHERE idAutonomo = '$id'";
                $operacao = mysqli_query($conexao, $query);
            }
        }
    }
        
                
        

        if($_POST['tags'] != ""){
            $tags = explode(",", $_POST['tags']);
            if(verificarTipoUsuario() == "auto"){
                for ($i=0; $i < sizeof($tags); $i++) { 
                echo $tags[$i];
                echo "<br>";
                include("conexao.php");
                $query = "INSERT INTO tagsautonomo(id, tag) VALUES ('$id', '$tags[$i]')";
                $operacao = mysqli_query($conexao, $query);
            }
            }elseif(verificarTipoUsuario() == "empresa"){
                for ($i=0; $i < sizeof($tags); $i++) { 
                    echo $tags[$i];
                    echo "<br>";
                    include("conexao.php");
                    $query = "INSERT INTO tagsempresa(id, tag) VALUES ('$id', '$tags[$i]')";
                    $operacao = mysqli_query($conexao, $query);
            }
            
        }
            
        }

        header("location: ../view/profile.php");
    


?>