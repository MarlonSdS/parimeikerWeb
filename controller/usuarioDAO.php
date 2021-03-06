<?php

    include("../controller/conexao.php");

    $listarClientes;
    $listarAutonomos;
    $listarEmpresas;

    if(isset($_GET['sair'])){
         $sair = $_GET['sair'];
         if($sair == "sim"){
             deslogar();
         }
    }


    $id = "";
    $nome = "";
    $email = "";
    $tel = "";
    $cpf = "";
    $cnpj = "";
    $senha = "";

    $texto ="";

    if(isset($_POST["excluir"])){
        excluirUsuario();
    }

    if(isset($_POST["editar"])){
        if(isset($_POST['cpf'])){
            editarAuto();
        }elseif (isset($_POST['cnpj'])) {
            editarEmpresa();
        }else{
            editarCliente();
        }
    }

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

            $validar = $conexao->query("SELECT * FROM autonomo WHERE email='$email' AND senha='$senha'")
         or die($conexao->error);
            $validar = $validar->fetch_array();
            $id = $validar['id'];
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['cpf'] = $cpf;
            include("upload.php");
            criarLinhaNoBanco();
            $texto = "Olá! Eu estou usando o PartyMaker!";
            $query = "UPDATE userdata SET profileText = '$texto' WHERE idAutonomo = '$id'";
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

        $validar = $conexao->query("SELECT * FROM empresa WHERE cnpj ='$cnpj' AND senha='$senha'")
                 or die($conexao->error);
                 include("upload.php");
            criarLinhaNoBanco();
            $texto = "Olá! Eu estou usando o PartyMaker!";
            $query = "UPDATE userdata SET profileText = '$texto' WHERE idEmpresa = '$id'";
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
        include("upload.php");
            criarLinhaNoBanco();
            $texto = "Olá! Eu estou usando o PartyMaker!";
            $query = "UPDATE userdata SET profileText = '$texto' WHERE idUsuario = '$id'";
            $operacao = mysqli_query($conexao, $query);
        header("location: ../view/crud/login.php?tipo=cliente");
    }
}

    function verificarUsuario(){
        $email = $_POST["email"];
       
       $ver = false;
        include("../controller/conexao.php");

        if (isset($_POST['cnpj'])) {
             $cnpj = $_POST["cnpj"];
        $validar = $conexao->query("SELECT * FROM empresa WHERE cnpj='$cnpj'")
        or die($conexao->error);
        if($validar->num_rows > 0){
            $ver = true;
        }
        }elseif(isset($_POST['cpf'])){ 
            $cpf = $_POST["cpf"];
            $validar = $conexao->query("SELECT * FROM autonomo WHERE cpf='$cpf'")
            or die($conexao->error);
            if($validar->num_rows > 0){
                $ver = true;
            }
        }else{
            $validar = $conexao->query("SELECT * FROM cliente WHERE email='$email'")
            or die($conexao->error);
            if($validar->num_rows > 0){
                $ver = true;
            }
        }

        return $ver;
        
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
            $_SESSION['id'] = $validar['id'];
            $_SESSION['nome'] = $validar['nome'];
            $_SESSION['email'] = $validar['email'];
            $_SESSION['tel'] = $validar['tel'];
            $_SESSION['cpf'] = "";
            $_SESSION['cnpj'] = "";
            $_SESSION['logado'] = true;
            $_SESSION['usertype'] = "cliente";
            header("location: ../index.php?tipo=cliente");
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
                $_SESSION['id'] = $validar['id'];
                $_SESSION['nome'] = $validar['nome'];
                $_SESSION['email'] = $validar['email'];
                $_SESSION['tel'] = $validar['tel'];
                $_SESSION['cpf'] = $validar['cpf'];
                $_SESSION['cnpj'] = "";
                $_SESSION['logado'] = true;
                header("location: ../index.php?tipo=auto");
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
                    $_SESSION['id'] = $validar['id'];
                    $_SESSION['nome'] = $validar['nome'];
                    $_SESSION['email'] = $validar['email'];
                    $_SESSION['tel'] = $validar['tel'];
                    $_SESSION['cpf'] = "";
                    $_SESSION['cnpj'] = $validar['cnpj'];
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

        //funções de edição
        function editarAuto(){
                $id = $_POST["id"];
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $tel = $_POST["tel"];
                $cpf = $_POST["cpf"];
                $senha = md5($_POST["senha"]); 
                include("../controller/conexao.php");
    
                $conexao->query("UPDATE autonomo SET nome='$nome', email='$email', tel=$tel, 
                cpf=$cpf, senha='$senha' WHERE id='$id'")
                or die($conexao->error);
                $operacao = mysqli_query($conexao, $query);
                loginAutonomo();
    
        }
    
        function editarEmpresa(){
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $tel = $_POST["tel"];
            $cnpj = $_POST["cnpj"];
            $senha = md5($_POST["senha"]); 
            $id = $_POST['id'];
            include("../controller/conexao.php");
    
            $conexao->query("UPDATE empresa SET nome='$nome', email='$email', tel='$tel', 
            cnpj='$cnpj', senha='$senha' WHERE id='$id'")
            or die($conexao->error);
            $operacao = mysqli_query($conexao, $query);
            header("location: ../view/crud/login.php?tipo=empresa");
            loginEmpresa();
        }
        
    
        function editarCliente(){
            $id=$_POST["id"];
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $tel = $_POST["tel"];
            $senha = md5($_POST["senha"]); 
            include("../controller/conexao.php");
    
            $conexao->query("UPDATE cliente SET nome='$nome', email='$email', tel=$tel,
             senha='$senha' WHERE id='$id'")
            or die($conexao->error);
            $operacao = mysqli_query($conexao, $query);
            loginCliente();
    }
    
    //função de deletar
    function excluirUsuario(){
        $id=$_POST['id'];
        include("../controller/conexao.php");
        if(isset($_POST['cpf'])){
            $conexao->query("DELETE FROM autonomo WHERE id='$id'") or die($conexao->error);
            deslogar();
        }elseif(isset($_POST['cnpj'])){
            $conexao->query("DELETE FROM empresa WHERE id='$id'") or die($conexao->error);
            deslogar();
        }else{
            $conexao->query("DELETE FROM cliente WHERE id='$id'") or die($conexao->error);
            deslogar();
        }
    }

?>