<!-- PROGRAMA -->
<section class="program">
    <div class="program-h">
        <h2 class="section-h">La mejor conferencia de diseño web en español</h2>
        <p class="program-h__p">Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br>Quisquam doloribus magnam ducimus enim expedita velit voluptate, quasi facilis sed, tenetur vero culpa est, veritatis animi nihil eius voluptatibus nulla dicta.</p>
        
        <div class="pcard">
            <h3 class="pcard-header">Programa del evento</h3>

            <!-- links -->
            <div class="pcard-links">
                <?php foreach($categories as $category): ?>
                    <a href="#<?php echo $category["titulo"]; ?>">
                        <span class="color-orange fa <?php echo $category["icono"]; ?>"></span> 
                        <?php echo $category["titulo"]; ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- por categoría -->
            <?php foreach($events as $categoryId => $event): ?>
                <div class="pcard-info" id="<?php echo $categories[$categoryId]["titulo"]; ?>">
                    <!-- mostrar 2 eventos -->
                    <?php foreach($event as $info): ?>
                        <div>
                            <h4><?php echo $info["titulo"]; ?></h4>
                            <p><span class="far fa-calendar-alt color-orange" title="Fecha"></span> <?php echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($dates[$info["fechaId"]]["fecha"]))); ?></p>
                            <p><span class="far fa-clock color-orange" title="Horario"></span> <?php echo utf8_encode(strftime("%R", strtotime($info["hora"]))); ?></p>
                            <p><span class="fas fa-user color-orange" title="Invitado"></span> <?php echo $guests[$info["invitadoId"]]["nombre"] . " " . $guests[$info["invitadoId"]]["apellido"]; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <div class="pcard-button">
                <a href="/calendario">ver todos</a> 
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


<!-- TICKETS -->
<section class="container section">
    <h2 class="section-h">Tickets</h2>

    <div class="tickets">
        <?php foreach($tickets as $ticket): ?>
            <a href="/reservaciones" target="_blank" class="ticket">
                <?php if($ticket["nFechas"] == 0): ?> <p class="ticket-header">Todos los dias!</p>
                <?php elseif($ticket["nFechas"] == 1): ?> <p class="ticket-header">Pase por 1 día</p>
                <?php else: ?> <p class="ticket-header">Pase por <?php echo $ticket["nFechas"]; ?> días!</p>
                <?php endif; ?>

                <h3 class="ticket-price">&dollar;<?php echo number_format($ticket["precio"]); ?></h3>
                
                <div class="ticket-benfs">
                    <?php foreach(json_decode($ticket["beneficios"]) as $ben): ?>
                        <p><span class="fas fa-check"></span> <?php echo $ben; ?></p>
                    <?php endforeach; ?>
                </div>
                
                <p class="ticket-button" href="/reservaciones" class="price-buy">Comprar</p>
            </a>
        <?php endforeach; ?>
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