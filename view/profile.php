<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include '../util/commonHead.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
            session_start();
            if($_SESSION['logado'] != true){
                header("location: /parimeikerWeb/index.php");
            }
            $id = $_SESSION['id'];$tipo;
            if(mb_strlen($_SESSION['cnpj']) > 2){
                $tipo = "empresa";
            }elseif(mb_strlen($_SESSION['cpf']) > 2){
                $tipo = "auto";
            }else{
                $tipo="cliente";
            }
            //caso por algum motivo o usuário acesse as páginas que requeram autenticação
            //sem se logar ele será redirecionado para a index
            
        ?>
    <title><?php echo $_SESSION['nome']; ?></title>
    <link rel="stylesheet" href="../assets/styles/profile.css">
</head>
<body>
    <header>
    <div id="vazio"></div>
    <?php include("../controller/getFile.php"); ?>
    <?php include("../util/header.php"); ?>
    </header>
    
    <main>
    <div class="infosetexto">
        <div class="infos">
            <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
                <?php pegarImagemPerfil($tipo, $id, "profile-picture"); ?>
            <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
                <?php pegarImagemPerfil($tipo, $id, "profile-picture"); ?>
            <?php else: ?>
                <?php pegarImagemPerfil($tipo, $id, "profile-picture"); ?>
            <?php endif; ?>
            
            <p><i class="fas fa-envelope" class="icons-prof">  </i> <?php echo $_SESSION['email']; ?> </p>
            <p><i class="fab fa-whatsapp fa-lg" class="icons-prof">  </i> <?php echo $_SESSION['tel']; ?> </p>
            <p></p>

            
        </div>
        
        <div class="texto">
            <h1><p><?php echo $_SESSION['nome']; ?></p>
            
            <a href="/parimeikerWeb/view/editProfile.php" class="btn-editar" ><i class="fas fa-cog fa-sm"></i></a></h1>
        <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
            <div class="texto-apre"><?php pegarTextoPerfil($tipo, $id); ?></div>
        <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
            <div class="texto-apre"s> <?php pegarTextoPerfil($tipo, $id); ?></div>
        <?php endif; ?>
        </div>
    </div>
    
        

        <div class="portfolio">
            <div class="portfolio-card">
                <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
                    <?php pegarImagemPortfolio($tipo, $id, 1); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($tipo, $id, 1); ?></p>
                    </div>
                    
                <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
                    <?php pegarImagemPortfolio($tipo, $id, 1); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($tipo, $id, 1); ?></p>
                    </div>
                    
                <?php endif; ?>
            </div>
            <div class="portfolio-card">
                <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
                    <?php pegarImagemPortfolio($tipo, $id, 2); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($tipo, $id, 2); ?></p>
                    </div>
                    

                <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
                    <?php pegarImagemPortfolio($tipo, $id, 2); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($tipo, $id, 2); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="portfolio-card">
                <?php if(mb_strlen($_SESSION['cnpj']) > 2): ?>
                    <?php pegarImagemPortfolio($tipo, $id, 3); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($tipo, $id, 3); ?></p>
                    </div>
                    
                <?php elseif(mb_strlen($_SESSION['cpf']) > 2): ?>
                    <?php pegarImagemPortfolio($tipo, $id, 3); ?>
                    <div class="image-info">
                        <p><?php pegarTextoPortfolio($tipo, $id, 3); ?></p>
                    </div>
                    
                <?php endif; ?>
            </div>
        </div>
    </main>

    
        <?php include("../util/footer.php"); ?>
    
</body>
</html>