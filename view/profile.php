<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include'../util/commonHead.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
            session_start();
            //caso por algum motivo o usuário acesse as páginas que requeram autenticação
            //sem se logar ele será redirecionado para a index
            if($_SESSION['logado'] != true){
                header("location: /parimeikerWeb/index.php");
            }
        ?>
    <title><?php echo $_SESSION['nome']; ?></title>
    <link rel="stylesheet" href="../assets/styles/profile.css">
</head>
<body>
    <header>
        <?php include'../util/header.php'; ?>
    </header>
    <div id="vazio"></div>
    
    <main>
    <div class="infos">
        <img 
        src="https://lh3.googleusercontent.com/ogw/ADGmqu9rdNkN1yOf9Gw99wfhGrMwlVelAeBsnOoZS3rksQ=s83-c-mo" alt=""
        class="profile-picture">
        <h1><?php echo $_SESSION['nome']; ?></h1>
        <h2><?php echo $_SESSION['email']; ?></h2>
        <h2><?php echo $_SESSION['tel']; ?></h2>

        <a href="/parimeikerWeb/view/editProfile.php"><buttom>Editar Perfil</button></a>
    </div>
        <div class="texto">
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
            <br> totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae <br>
             dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed <br>
              quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui <br>
               dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi <br>
                tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, <br>
                 quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi <br>
                  consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil <br>
                   molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
        </div>
    </main>
</body>
</html>