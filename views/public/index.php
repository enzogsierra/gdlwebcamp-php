<!-- PROGRAMA -->
<section class="program">
    <div class="program-h">
        <h2 class="section-h">La mejor conferencia de diseño web en español</h2>
        <p class="program-h__p">Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br>Quisquam doloribus magnam ducimus enim expedita velit voluptate, quasi facilis sed, tenetur vero culpa est, veritatis animi nihil eius voluptatibus nulla dicta.</p>
        
        <div class="pcard">
            <h3 class="pcard-header">Programa del evento</h3>

            <div class="pcard-links">
                <a href="#talleres"><span class="fa fa-code color-orange"></span> Talleres</a>
                <a href="#conferencias"><span class="fa fa-comment color-orange"></span> Conferecias</a>
                <a href="#seminarios"><span class="fa fa-university color-orange"></span> Seminarios</a>
            </div>

            <!-- INFO -->
            <div class="pcard-info" id="talleres">
                <div>
                    <h4>HTML5, CSS3 y JavaScript</h4>
                    <p><span class="far fa-clock color-orange" title="Horario"></span> 16:00</p>
                    <p><span class="far fa-calendar-alt color-orange" title="Fecha"></span> 10 de Diciembre</p>
                    <p><span class="fas fa-user color-orange" title="Profesor"></span> Juan Pablo de la Torre</p>
                </div>
                <div>
                    <h4>Responsive Web Design</h4>
                    <p><span class="far fa-clock color-orange" title="Horario"></span> 18:00</p>
                    <p><span class="far fa-calendar-alt color-orange" title="Fecha"></span> 10 de Diciembre</p>
                    <p><span class="fas fa-user color-orange" title="Profesor"></span> Juan Pablo de la Torre</p>
                </div>
            </div>

            <div class="pcard-info" id="conferencias">
                <div>
                    <h4>Cómo ser freelancer</h4>
                    <p><span class="far fa-clock color-orange" title="Horario"></span> 16:00</p>
                    <p><span class="far fa-calendar-alt color-orange" title="Fecha"></span> 11 de Diciembre</p>
                    <p><span class="fas fa-user color-orange" title="Profesor"></span> Gregorio Sanchez</p>
                </div>
                <div>
                    <h4>Tecnologías del futuro</h4>
                    <p><span class="far fa-clock color-orange" title="Horario"></span> 18:00</p>
                    <p><span class="far fa-calendar-alt color-orange" title="Fecha"></span> 11 de Diciembre</p>
                    <p><span class="fas fa-user color-orange" title="Profesor"></span> Susana Sanchez</p>
                </div>
            </div>

            <div class="pcard-info" id="seminarios">
                <div>
                    <h4>Diseño UI/UX para móviles</h4>
                    <p><span class="far fa-clock color-orange" title="Horario"></span> 14:00</p>
                    <p><span class="far fa-calendar-alt color-orange" title="Fecha"></span> 12 de Diciembre</p>
                    <p><span class="fas fa-user color-orange" title="Profesor"></span> Susana Rivero</p>
                </div>
                <div>
                    <h4>Aprende a programar</h4>
                    <p><span class="far fa-clock color-orange" title="Horario"></span> 16:00</p>
                    <p><span class="far fa-calendar-alt color-orange" title="Fecha"></span> 12 de Diciembre</p>
                    <p><span class="fas fa-user color-orange" title="Profesor"></span> Susana Rivero</p>
                </div>
            </div>

            <div class="pcard-button">
                <a href="#">ver todos</a> 
            </div>
        </div>
    </div>

    <video class="program-video" autoplay loop poster="img/bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogg">
    </video>
</section>


<!-- INVITADOS -->
<section class="container section">
    <h2 class="section-h">Nuestros invitados</h2>

    <?php
        include "_invitados.php"; 
    ?>
</section>


<!-- RESUMEN -->
<div class="summary-hero section">
    <div class="container">
        <div class="summary">
            <div>
                <p class="summary-n"></p>
                <p class="summary-t">Invitados</p>
            </div>
            <div>
                <p class="summary-n"></p>
                <p class="summary-t">Talleres</p>
            </div>
            <div>
                <p class="summary-n"></p>
                <p class="summary-t">Días</p>
            </div>
            <div>
                <p class="summary-n"></p>
                <p class="summary-t">Conferencias</p>
            </div>
        </div>
    </div>
</div>


<!-- PRECIOS -->
<section class="container section">
    <h2 class="section-h">Precios</h2>

    <div class="prices">
        <a href="" class="price">
            <p class="price-days">&nbsp;</p>
            <h3>&dollar;30</h3>
            <div class="price-ben">
                <p><span class="fas fa-check"></span> Bocadillos gratis</p>
                <p><span class="fas fa-check"></span> Todas las conferencias</p>
                <p><span class="fas fa-check"></span> Todos los talleres</p>
            </div>

            <p class="price-buy">Comprar</p>
        </a>

        <a href="#" class="price">
            <p class="price-days">Todos los dias!</p>
            <h3>&dollar;50</h3>
            <div class="price-ben">
                <p><span class="fas fa-check"></span> Bocadillos gratis</p>
                <p><span class="fas fa-check"></span> Todas las conferencias</p>
                <p><span class="fas fa-check"></span> Todos los talleres</p>
            </div>

            <p class="price-buy">Comprar</p>
        </a>

        <a href="#" class="price">
            <p class="price-days">Pase por 2 días!</p>
            <h3>&dollar;45</h3>
            <div class="price-ben">
                <p><span class="fas fa-check"></span> Bocadillos gratis</p>
                <p><span class="fas fa-check"></span> Todas las conferencias</p>
                <p><span class="fas fa-check"></span> Todos los talleres</p>
            </div>

            <p class="price-buy">Comprar</p>
        </a>
    </div>
</section>


<!-- MAPA -->
<div id="map" class="section" style="height: 50vh;">

</div>


<!-- TESTIMONIALES -->
<section class="container section">
    <h2 class="section-h">Testimoniales</h2>

    <div class="testimonials">
        <blockquote class="testimonial">
            <p class="testimonial-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum atque eveniet mollitia vitae dolores ea, quaerat laboriosam labore et omnis autem ullam illum qui neque saepe assumenda soluta aperiam amet!</p>
        
            <footer class="testimonial-footer">
                <img class="testimonial-img" src="img/invitado1.jpg" alt="foto del autor" loading="lazy">
                <div>
                    <cite class="testimonial-name">Rafael Bautista</cite>
                    <p class="testimonial-p">Diseñador en @prisma</p>
                </div>
            </footer>
        </blockquote>

        <blockquote class="testimonial">
            <p class="testimonial-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum atque eveniet mollitia vitae dolores ea, quaerat laboriosam labore et omnis autem ullam illum qui neque saepe assumenda soluta aperiam amet!</p>
        
            <footer class="testimonial-footer">
                <img class="testimonial-img" src="img/invitado3.jpg" alt="foto del autor" loading="lazy">
                <div>
                    <cite class="testimonial-name">Gregorio Sanchez</cite>
                    <p class="testimonial-p">Desarrollador Web Freelancer</p>
                </div>
            </footer>
        </blockquote>

        <blockquote class="testimonial">
            <p class="testimonial-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum atque eveniet mollitia vitae dolores ea, quaerat laboriosam labore et omnis autem ullam illum qui neque saepe assumenda soluta aperiam amet!</p>
        
            <footer class="testimonial-footer">
                <img class="testimonial-img" src="img/invitado4.jpg" alt="foto del autor" title="Susana Rivera" loading="lazy">
                <div>
                    <cite class="testimonial-name">Susana Rivera</cite>
                    <p class="testimonial-p">Analista de Sistemas</p>
                </div>
            </footer>
        </blockquote>
    </div>
</section>


<!-- NEWSLETTER -->
<div class="newsletter section">
    <p>Inscríbete a nuestro newsletter</p>
    <h3>gdlwebcamp</h3>
    <a href="#">Registro</a>
</div>


<!-- COUNTDOWN -->
<div class="container section">
    <h2 class="section-h">Faltan</h2>

    <div class="summary countdown">
        <div>
            <p class="summary-n" id="countdown-d">0</p>
            <p class="summary-t">Días</p>
        </div>
        <div>
            <p class="summary-n" id="countdown-h">0</p>
            <p class="summary-t">Horas</p>
        </div>
        <div>
            <p class="summary-n" id="countdown-m">0</p>
            <p class="summary-t">Minutos</p>
        </div>
        <div>
            <p class="summary-n" id="countdown-s">0</p>
            <p class="summary-t">Segundos</p>
        </div>
    </div>
</div>