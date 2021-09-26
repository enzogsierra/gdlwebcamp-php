<section class="container section">
    <h2 class="section-h">Calendario de eventos</h2>

    <?php 
    setlocale(LC_TIME, "spanish");

    foreach($dates as $key => $date): 
    ?>
        <div class="calendars-hero section">
            <h3 class="calendar-header"><span class="far fa-calendar-alt"></span> <?php echo strftime("%A, %d de %B del %Y", strtotime($key)); ?></h3>
            
            <div class="calendars">
                <?php foreach($date as $event): ?>
                    <div class="calendar">
                        <div>
                            <p class="calendar-title"><?php echo $event["titulo"]; ?></p>
                            <p class="calendar-category">
                                <span class="color-orange fa <?php echo $event["icono"]; ?>"></span>
                                <?php echo $event["categoria"] ?>
                            </p> 
                        </div>
                        <p class="calendar-guest"><span class="fas fa-user color-orange"></span> <?php echo $event["invitado"]; ?></p>
                        <p><span class="far fa-clock color-orange"></span> <?php echo strftime("%R", strtotime($event["hora"])); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</section>
