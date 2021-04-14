<?php

    session_start();
    $id = $_SESSION['id'];
    $texto = "";
    $userType = "";      
    if(isset($_POST['editar'])){
       // verificarTipoUsuario();
       // guardarTexto();
    };
    //verifica se o usuario é cliente, autonomo ou empresa
        if(strlen($_SESSION['cpf']) > 2){
            $userType = "auto";
        }elseif(strlen($_SESSION['cnpj']) > 2){
            $userType = "empresa";
        }else{
            $userType = "cliente";
        }


        if($userType == "auto"){
            $texto = fopen("../userData/userTexts/Autonomo/userText{$id}.html", "w");
            if($texto == false) die ("não foi possível criar o arquivo");
            fwrite($texto, $_POST['texto']);
            fclose($texto);
            header("location: ../view/profile.php");
        }
        if($userType == "empresa"){
            $texto = fopen("/parimeikerWeb/userData/userTexts/Empresa/userText$id.txt", "w");
            if($texto == false) die ("não foi possível criar o arquivo");
            fwrite($texto, $_POST['texto']);
            fclose($texto);
            header("location: ../view/profile.php");
        }
       /* if($userType == "cliente"){
            $texto = fopen("/parimeikerWeb/userData/userTexts/Cliente/userText$id.txt", "w");
            if($texto == false) die ("não foi possível criar o arquivo");
            fwrite($texto, $_POST['texto']);
            fclose($texto);
            header("location: ../view/profile.php");
        } */

        if(isset($_FILES['picture']['name'])){
            if($userType == "empresa"){
                $destino = "../userData/userProfilePictures/Empresa/userProfile{$id}.png";
            }elseif($userType == "auto"){
                $destino = "../userData/userProfilePictures/Autonomo/userProfile{$id}.png";
            }else{
                $destino = "../userData/userProfilePictures/Cliente/userProfile{$id}.png";
            }
            
            
            $arquivo_tmp = $_FILES['picture']['tmp_name'];
            
            move_uploaded_file( $arquivo_tmp, $destino  );
            header("location: ../view/profile.php");
        }


?>