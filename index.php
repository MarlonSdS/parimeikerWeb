<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    


    <!--para ser mais prático o head de todas as páginas será feito apenas incluindo este arquivo com informções
    pré definidas, com excessão apenas do que é exclusivo para cada página -->
    <?php include("util/commonHead.php"); ?>
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
            
        }

    } ?>

</head>
<body>
    

<!-- <div id="loader" class="loader"></div> -->


    <!-- Header -->
    <?php include("controller/getFile.php"); ?>
    <?php include("util/header.php"); ?>


       


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

<h1 class="titulo-feed">MAIS AVALIADOS</h1>

        <div class="container-feed">
            
        <div class="feed">
            <img src="assets/images/feed-01.png" alt="" >
        </a>
        <div class="desc">Palace Doces e Salgados</div>
        </div>

        <div class="feed">
            <img src="assets/images/feed-02.png" alt="" >
        </a>
        <div class="desc">Divino  Açaí</div>
        </div>

        <div class="feed">
            <img src="assets/images/feed-03.png" alt="" >
        </a>
        <div class="desc">Browneria Artesanal</div>
        </div>

        <div class="feed">
            <img src="assets/images/feed-04.png" alt="" >
        </a>
        <div class="desc">Moccia Cozinha Afetiva</div>
        </div>
        </div>

        <div class="container-feed">
            
        <div class="feed">
            <img src="assets/images/feed-05.png" alt="" >
        </a>
        <div class="desc">Caliente Cozinha Mexicana</div>
        </div>

        <div class="feed">
            <img src="assets/images/feed-06.png" alt="" >
        </a>
        <div class="desc">Pono Culinária Havaiana</div>
        </div>

        <div class="feed">
            <img src="assets/images/feed-07.png" alt="" >
        </a>
        <div class="desc">Antônia Buffet</div>
        </div>

        <div class="feed">
            <img src="assets/images/feed-08.png" alt="" >
        </a>
        <div class="desc">Pães de Mel Xaveco</div>
        </div>
        </div>


        <h1 class="titulo-feed2">MAIS RECENTES</h1>
        <div class="container-feed2">
        <div class="feed">
            <img src="assets/images/feed-02.png" alt="" >
        </a>
        <div class="desc">Divino Açaí</div>
        </div>

        <div class="feed">
            <img src="assets/images/feed-04.png" alt="" >
        </a>
        <div class="desc">Moccia Cozinha Afetiva</div>
        </div>

        <div class="feed">
            <img src="assets/images/feed-06.png" alt="" >
        </a>
        <div class="desc">Pono Culinária Havaiana</div>
        </div>

        <div class="feed">
            <img src="assets/images/feed-07.png" alt="" >
        </a>
        <div class="desc">Antônia Buffet</div>
        </div>
        </div>


    <!-- Footer -->

   

    <?php include("util/footer.php"); ?>

     <!-- Script -->
   
<!--

    <script>
    jQuery(window).load(function () {
      $(".loader").fadeOut("slow"); //retire o delay quando for copiar!
    $("#tudo_page").toggle("fast");
});
    </script> 

    <script>
    function loading(){
     $('.loader').css('display','none');
}
    </script>   

    -->

</body>
</html>