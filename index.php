<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    


    <!--para ser mais prático o head de todas as páginas será feito apenas incluindo este arquivo com informções
    pré definidas, com excessão apenas do que é exclusivo para cada página -->
    <!-- <link rel="stylesheet" href="assets/styles/index.css"> -->
    
    <link rel="stylesheet" href="style.css">
    <!-- Link Style do Header-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0.">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Link Style do Carrousel "Banner"-->
    <link rel="stylesheet" href="assets/styles/gallery.theme.css">
    <link rel="stylesheet" href="assets/styles/gallery.min.css">
    <!-- Link Style do Footer-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
    <title>Party Maker — Ferramenta de Promoção de Eventos</title>
    <?php session_start(); ?>
    <!--Se o usuário estiver logado ele será mandado para a homepage-->
    <?php if (isset($_SESSION['logado'])) {
        if($_SESSION['logado'] == true){
            header("location: view/homepage.php");
        }

    } ?>
</head>
<body>
    
    <!-- Header -->

    <nav>
        <ul>
            <li class="logo"> <img src="assets/images/logo.png"> </li>
            <li class="search-icon">
            <input type="search" placeholder="Pesquise">
            <label class="icon">
                <span class="fas fa-search"></span>
            </label>
            </li>
            <li class="btn-entrar">
            <button class="input-btn" href="www.youtube.com">ENTRAR</button>
            </li>    
        </ul>
    </nav>

    <!-- Carrousel -->
<div class="carrousel">
        <div class="gallery autoplay items-3">
    <div id="item-1" class="control-operator"></div>
    <div id="item-2" class="control-operator"></div>
    <div id="item-3" class="control-operator"></div>

    <figure class="item">
        <h1><img src="assets/images/Banner-01.png"></h1>
    </figure>

    <figure class="item">
        <h1><img src="assets/images/Banner-02.png"></h1>
    </figure>

    <figure class="item">
        <h1><img src="assets/images/Banner-03.png"></h1>
    </figure>

    <div class="controls">
        <a href="#item-1" class="control-button">•</a>
        <a href="#item-2" class="control-button">•</a>
        <a href="#item-3" class="control-button">•</a>
    </div>
    </div>
</div>


<!-- Feed -->
<div class="container-feed">
<div class="feed">
    <img src="assets/images/001.jpg" alt="" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="feed">
    <img src="assets/images/001.jpg" alt="" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="feed">
    <img src="assets/images/001.jpg" alt="" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>

<div class="feed">
    <img src="assets/images/001.jpg" alt="" width="600" height="400">
  </a>
  <div class="desc">Add a description of the image here</div>
</div>
</div>


    <!-- Footer -->

    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Company Name</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Company Name © 2018</p>
            </div>
        </footer>
      
   
    </div>

</body>
</html>