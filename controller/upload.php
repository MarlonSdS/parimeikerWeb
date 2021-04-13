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
        if($userType == "cliente"){
            $texto = fopen("/parimeikerWeb/userData/userTexts/Cliente/userText$id.txt", "w");
            if($texto == false) die ("não foi possível criar o arquivo");
            fwrite($texto, $_POST['texto']);
            fclose($texto);
            header("location: ../view/profile.php");
        }


?>