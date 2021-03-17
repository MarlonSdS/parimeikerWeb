<?php

    include("../controller/conexao.php");

    $listarClientes;
    $listarAutonomos;
    $listarEmpresas;

    $id = "";
    $nome = "";
    $email = "";
    $tel = "";
    $cpf = "";
    $cnpj = "";
    $senha = "";
    

    if (isset($_POST["cadastro"])) {
        if(isset($_POST["cpf"])){
            cadastrarAuto();
        }elseif (isset($_POST["cnpj"])) {
            cadastrarEmpresa();
        }else{
            cadastrarCliente();
        }
    }

    if (isset($_POST["login"])) {
        if(isset($_POST["email"])){
            loginCliente();
        }elseif(isset($_POST["cpf"])){
            loginAutonomo();
        }elseif(isset($_POST["cnpj"])){
            loginEmpresa();
        }
    }

    function listarClientes(){
        global $conexao, $listarClientes;

        $listarClientes = $conexao->query("SELECT * FROM cliente") or die ($conexao->error);
    }

    function listarAutonomos(){
        global $conexao, $listarAutonomos;

        $listarAutonomos = $conexao->query("SELECT * FROM autonomo") or die ($conexao->error);
    }

    function listarEmpresas(){
        global $conexao, $listarEmpresas;

        $listarEmpresas = $conexao->query("SELECT * FROM empresa") or die ($conexao->error);
    }

    //funções de cadastro
    function cadastrarAuto(){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
        $cpf = $_POST["cpf"];
        $senha = md5($_POST["senha"]); 
        include("../controller/conexao.php");

        $query = "INSERT INTO autonomo(nome, email, tel, cpf, senha) VALUES ('$nome', '$email', '$tel', '$cpf', '$senha')";
        $operacao = mysqli_query($conexao, $query);
        header("location: ../view/crud/login.php?tipo=auto");
    }

    function cadastrarEmpresa(){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
        $cnpj = $_POST["cnpj"];
        $senha = md5($_POST["senha"]); 
        include("../controller/conexao.php");

        $query = "INSERT INTO empresa(nome, email, tel, cnpj, senha) VALUES ('$nome', '$email', '$tel', '$cnpj', '$senha')";
        $operacao = mysqli_query($conexao, $query);
        header("location: ../view/crud/login.php?tipo=empresa");
    }

    function cadastrarCliente(){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
        $senha = md5($_POST["senha"]); 
        include("../controller/conexao.php");

        $query = "INSERT INTO cliente(nome, email, tel, senha) VALUES ('$nome', '$email', '$tel', '$senha')";
        $operacao = mysqli_query($conexao, $query);
        header("location: ../view/crud/login.php?tipo=cliente");
    }

    //funções de autenticação

    function loginCliente(){
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        include("../controller/conexao.php");

        $validar = $conexao->query("SELECT * FROM cliente WHERE email='$email' AND senha='$senha'")
         or die($conexao->error);

        if($validar->num_rows > 0 ){
            $validar = $validar->fetch_array();
            session_start();
            $_SESSION['idCliente'] = $validar['id'];
            $_SESSION['nome'] = $validar['nome'];
            header("location: ../view/homepage.php");
        }else{
            echo "deu ruim";}

            
        }

        function loginAutonomo(){
            $cpf = $_POST['cpf'];
            $senha = md5($_POST['senha']);
            include("../controller/conexao.php");
    
            $validar = $conexao->query("SELECT * FROM autonomo WHERE cpf='$cpf' AND senha='$senha'")
             or die($conexao->error);
    
            if($validar->num_rows > 0 ){
                $validar = $validar->fetch_array();
                session_start();
                $_SESSION['idAuto'] = $validar['id'];
                $_SESSION['nome'] = $validar['nome'];
                header("location: ../view/homepage.php");
            }else{
                echo "deu ruim";}
    
                
            }
        
            function loginEmpresa(){
                $cnpj = $_POST['cnpj'];
                $senha = md5($_POST['senha']);
                include("../controller/conexao.php");
        
                $validar = $conexao->query("SELECT * FROM empresa WHERE cnpj ='$cnpj' AND senha='$senha'")
                 or die($conexao->error);
        
                if($validar->num_rows > 0 ){
                    $validar = $validar->fetch_array();
                    session_start();
                    $_SESSION['idEmpresa'] = $validar['id'];
                    $_SESSION['nome'] = $validar['nome'];
                    header("location: ../view/homepage.php");
                }else{
                    echo "deu ruim";}
        
                    
                }        
    

?>