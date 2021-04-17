<html>
    <head>
        <?php include("../util/commonHead.php"); ?>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Párimeiker — Ferramenta de promoção e gerenciamento para eventos</title>
    <?php 
           /* session_start();
            //caso por algum motivo o usuário acesse as páginas que requeram autenticação
            //sem se logar ele será redirecionado para a index
            if($_SESSION['logado'] != true){
                header("location: /parimeikerWeb/index.php");
            }
            $id = $_SESSION['id']; */
        ?>
    </head>
    <body>
        <header>
            <?php include("../util/header.php"); ?>
        </header>
        <div id="vazio"></div>
        <main>
            <div>
                <h1>busca por nome</h1>
            </div>    
            <div>
                <h1>busca por tag de empresa</h1>

            </div>
            <div>
                <h1>busca por tag de autonomo</h1>
            </div>
        </main>
        <footer>
        
        </footer>
    </body>
</html>