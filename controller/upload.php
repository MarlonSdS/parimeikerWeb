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
           // header("location: ../view/profile.php");
        }
        if($userType == "empresa"){
            $texto = fopen("/parimeikerWeb/userData/userTexts/Empresa/userText$id.html", "w");
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

        if (isset($_FILES['img1']) or isset($_FILES['img2']) or isset($_FILES['img3'])) {
            if($userType == "empresa"){
                $destino = "../userData/userPictures/Empresa/{$id}portImage1.png";
                $arquivo_tmp = $_FILES['img1']['tmp_name'];
                move_uploaded_file( $arquivo_tmp, $destino  );
                $destino = "../userData/userPictures/Empresa/{$id}portImage2.png";
                $arquivo_tmp = $_FILES['img2']['tmp_name'];
                move_uploaded_file( $arquivo_tmp, $destino  );
                $destino = "../userData/userPictures/Empresa/{$id}portImage3.png";
                $arquivo_tmp = $_FILES['img3']['tmp_name'];
                move_uploaded_file( $arquivo_tmp, $destino  );
            }elseif($userType == "auto"){
                $destino = "../userData/userPictures/Auto/{$id}portImage1.png";
                $arquivo_tmp = $_FILES['img1']['tmp_name'];
                move_uploaded_file( $arquivo_tmp, $destino  );
                $destino = "../userData/userPictures/Auto/{$id}portImage2.png";
                $arquivo_tmp = $_FILES['img2']['tmp_name'];
                move_uploaded_file( $arquivo_tmp, $destino  );
                $destino = "../userData/userPictures/Auto/{$id}portImage3.png";
                $arquivo_tmp = $_FILES['img3']['tmp_name'];
                move_uploaded_file( $arquivo_tmp, $destino  );
                
            }
        }

        if(($_POST['item1']) or ($_POST['item2']) or ($_POST['item3']) != ""){
            if($userType == "empresa"){
                $texto = fopen("../userData/userTexts/Empresa/portTexts/{$id}portText1.html", "w");
                if($texto == false) die ("não foi possível criar o arquivo");
                fwrite($texto, $_POST['item1']);
                fclose($texto);
                $texto = fopen("../userData/userTexts/Empresa/portTexts/{$id}portText2.html", "w");
                if($texto == false) die ("não foi possível criar o arquivo");
                fwrite($texto, $_POST['item2']);
                fclose($texto);
                $texto = fopen("../userData/userTexts/Empresa/portTexts/{$id}portText3.html", "w");
                if($texto == false) die ("não foi possível criar o arquivo");
                fwrite($texto, $_POST['item3']);
                fclose($texto);
            }elseif($userType == "auto"){
                $texto = fopen("../userData/userTexts/Autonomo/portTexts/{$id}portText1.html", "w");
                if($texto == false) die ("não foi possível criar o arquivo");
                fwrite($texto, $_POST['item1']);
                fclose($texto);
                $texto = fopen("../userData/userTexts/Autonomo/portTexts/{$id}portText2.html", "w");
                if($texto == false) die ("não foi possível criar o arquivo");
                fwrite($texto, $_POST['item2']);
                fclose($texto);
                $texto = fopen("../userData/userTexts/Autonomo/portTexts/{$id}portText3.html", "w");
                if($texto == false) die ("não foi possível criar o arquivo");
                fwrite($texto, $_POST['item3']);
                fclose($texto);
            }
        }
        header("location: ../view/profile.php");


?>