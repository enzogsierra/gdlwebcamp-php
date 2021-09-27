<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="#353535">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600;700&family=Oswald:wght@300;500;700&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/fontawesome.min.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <link rel="stylesheet" href="css/layout.css">

        <?php 
            if(isset($load_file)) echo "<link rel='stylesheet' href='css/${load_file}.css'>";
        ?>

        <title>GDLWEBCAMP</title>
    </head>

    <body>
        <header class="header">
            <div class="header-content container">
                <nav class="social-media">
                    <a href="#" class="fab fa-facebook-square" title="Facebook" target="_blank"></a>
                    <a href="#" class="fab fa-twitter" title="Twitter" target="_blank"></a>
                    <a href="#" class="fab fa-youtube" title="Youtube" target="_blank"></a>
                    <a href="#" class="fab fa-instagram" title="Instagram" target="_blank"></a>
                </nav>

                <div class="event-info">
                    <div class="event-info__icons">
                        <p class="event-date"><span class="far fa-calendar-alt"></span> 10/12/2021</p>
                        <a href="#map" class="event-city" title="Ver mapa"><span class="fas fa-map-marker-alt"></span> Buenos Aires, Argentina</a>
                    </div>
                        
                    <h1 class="event-name"><a href="/">gdlwebcamp</a></h1>
                    <p class="event-slogan">La mejor conferencia de <span>diseño web</span></p>
                </div>
            </div>
        </header>

        <div class="bar">
            <div class="container">
                <a href="/">
                    <img src="img/logo.svg" class="bar-img" alt="logo gdlwebcamp">
                </a>

                <div class="bar-nav">
                    <a href="/conferencia">Conferencia</a>
                    <a href="/calendario">Calendario</a>
                    <a href="/invitados">Invitados</a>
                    <a href="/reservaciones">Reservaciones</a>
                </div>
            </div>
        </div>

        <!--  -->
        <?php echo $content; ?>
        <!--  -->

        <footer class="footer">
            <div class="container">
                <div class="footer-card">
                    <h3>Sobre <span class="color-orange">GDLWEBCAMP</span></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi optio modi incidunt tenetur officia sunt minus rem. Quis impedit porro laboriosam, deleniti omnis optio? Id unde laborum nesciunt sapiente sunt!</p>
                </div>

                <div class="footer-card">
                    <h3>Ultimos tweets</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi optio modi incidunt tenetur officia sunt minus rem. Quis impedit porro laboriosam, deleniti omnis optio? Id unde laborum nesciunt sapiente sunt!</p>
                </div>

                <div class="footer-card">
                    <h3>Redes sociales</h3>
                    <nav class="social-media">
                        <a href="#" class="fab fa-facebook-square" title="Facebook" target="_blank"></a>
                        <a href="#" class="fab fa-twitter" title="Twitter" target="_blank"></a>
                        <a href="#" class="fab fa-youtube" title="Youtube" target="_blank"></a>
                        <a href="#" class="fab fa-instagram" title="Instagram" target="_blank"></a>
                    </nav>
                </div>
            </div>

            <p class="footer-copyright">GDLWEBCAMP 2021. Todos los derechos reservados &copy;</p>
        </footer>

        <!--  -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="js/animateNumber.js"></script>
        <script src="js/countdown.js"></script>
        <script src="js/main.js"></script>

        <?php 
            if(isset($load_file)) echo "<script src='js/${load_file}.js'></script>";
        ?>
    </body>
</html>