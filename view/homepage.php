<html>
    <head>
    <?php include'../util/commonHead.php'; ?>
    <?php 
            session_start();
            //caso por algum motivo o usuário acesse as páginas que requeram autenticação
            //sem se logar ele será redirecionado para a index
            if($_SESSION['logado'] != true){
                header("location: /parimeikerWeb/index.php");
            }
        ?>
    </head>
    <body>
    <header>
                <?php include('../util/header.php'); ?>
        </header>

        <div id="vazio"></div>
        <h1>Olá <?php echo $_SESSION['nome']; ?></h1>

    </body>
</html>