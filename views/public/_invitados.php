<div class="guests section">
    <?php foreach($guests as $guest): ?>
        <a href="#invitado<?php echo $guest["id"]; ?>" class="guest guest-info">
            <img src="/img/<?php echo $guest["img"]; ?>" alt="invitado <?php echo $guest["id"]; ?>" loading="lazy">
            <p><?php echo $guest["nombre"] . " " . $guest["apellido"]; ?></p>
        </a>
        
        <div class="display-none">
            <div class="guest-info" id="invitado<?php echo $guest["id"]; ?>">
                <h2><?php echo $guest["nombre"] . " " . $guest["apellido"]; ?></h2>
                <img src="/img/<?php echo $guest["img"]; ?>" alt="invitado <?php echo $guest["id"]; ?>" loading="lazy">
                <p><?php echo $guest["descripcion"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
