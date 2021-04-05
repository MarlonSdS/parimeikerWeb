<?php

    include("../controller/conexao.php");

    $listarClientes;
    $listarAutonomos;
    $listarEmpresas;

    $sair = $_GET['sair'];

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

    if($sair == "sim"){
        deslogar();
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
        if(verificarUsuario() == true){
            header("location: ../view/crud/cadastro.php?tipo=auto&erro=exis");
        }else{
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

    }

    function cadastrarEmpresa(){
        if(verificarUsuario() == true){
            header("location: ../view/crud/cadastro.php?tipo=empresa&erro=exis");
        }else{
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
        $cnpj = $_POST["cnpj"];
        $senha = md5($_POST["senha"]); 
        include("../controller/conexao.php");

        $query = "INSERT INTO empresa(nome, email, tel, cnpj, senha) VALUES ('$nome', '$email', '$tel', '$cnpj', '$senha')";
        $operacao = mysqli_query($conexao, $query);
        header("location: ../view/crud/login.php?tipo=empresa");}
    }

    function cadastrarCliente(){
        if(verificarUsuario() == true){
            header("location: ../view/crud/cadastro.php?tipo=cliente&erro=exis");
        }else{
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
        $senha = md5($_POST["senha"]); 
        include("../controller/conexao.php");

        $query = "INSERT INTO cliente(nome, email, tel, senha) VALUES ('$nome', '$email', '$tel', '$senha')";
        $operacao = mysqli_query($conexao, $query);
        header("location: ../view/crud/login.php?tipo=cliente");
    }
}

    function verificarUsuario(){
        $email = $_POST["email"];
        $cnpj = $_POST["cnpj"];
        $cpf = $_POST["cpf"];
        include("../controller/conexao.php");

        if (isset($cnpj)) {
            
        $validar = $conexao->query("SELECT * FROM empresa WHERE cnpj='$cnpj'")
        or die($conexao->error);
        if($validar->num_rows > 0){
            return true;
        }
        }elseif(isset($cpf)){
            $validar = $conexao->query("SELECT * FROM autonomo WHERE cpf='$cpf'")
            or die($conexao->error);
            if($validar->num_rows > 0){
                return true;
            }
        }else{
            $validar = $conexao->query("SELECT * FROM cliente WHERE email='$email'")
            or die($conexao->error);
            if($validar->num_rows > 0){
                return true;
            }
        }
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
            $_SESSION['logado'] = true;
            header("location: ../view/homepage.php?tipo=cliente");
        }else{
            header("location: ../view/crud/login.php?tipo=cliente&erro=login");
        }  
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
                $_SESSION['logado'] = true;
                header("location: ../view/homepage.php?tipo=auto");
            }else{
                header("location: ../view/crud/login.php?tipo=auto&erro=login");}
    
                
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
                    $_SESSION['logado'] = true;
                    header("location: ../index.php?tipo=empresa");
                }else{
                    header("location: ../view/crud/login.php?tipo=empresa&erro=login");}
        
                    
                }       
        
        //funçaõ de logout

        function deslogar(){
            session_start();
            $_SESSION['nome'] = "";
            $_SESSION['logado'] = false;
            session_destroy();
            header("location: /parimeikerWeb/index.php");
        }
    

?>