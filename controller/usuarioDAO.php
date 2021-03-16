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


    function cadastrarAuto(){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
        $cpf = $_POST["cpf"];
        $senha = md5($_POST["senha"]); 
        include("../controller/conexao.php");

        $query = "INSERT INTO autonomo(nome, email, tel, cpf, senha) VALUES ('$nome', '$email', '$tel', '$cpf', '$senha')";
        $operacao = mysqli_query($conexao, $query);
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
    }

    function cadastrarCliente(){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
        $senha = md5($_POST["senha"]); 
        include("../controller/conexao.php");

        $query = "INSERT INTO cliente(nome, email, tel, senha) VALUES ('$nome', '$email', '$tel', '$senha')";
        $operacao = mysqli_query($conexao, $query);
    }

?>