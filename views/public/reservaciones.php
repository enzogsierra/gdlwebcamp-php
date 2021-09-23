<section class="container section">
    <form action="" method="POST" action="/" class="form">

        <h2>Introduce tus datos</h2>
        <fieldset class="form-datos">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre">
            
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido">
            
            <label for="email">Teléfono</label>
            <input type="email" id="email">
        </fieldset>
        
        <h2>Precios</h2>
        <fieldset class="form-precios">
            <div class="prices">
                <div class="price">
                    <p class="price-days">Pase por 1 día!</p>
                    <h3>&dollar;30</h3>
                    <div class="price-ben">
                        <p><span class="fas fa-check"></span> Bocadillos gratis</p>
                        <p><span class="fas fa-check"></span> Todas las conferencias</p>
                        <p><span class="fas fa-check"></span> Todos los talleres</p>
                    </div>

                    <input type="number" name="" id="pase_1d" min="0" max="99" placeholder="0">
                </div>

                <div class="price">
                    <p class="price-days">Todos los dias!</p>
                    <h3>&dollar;50</h3>
                    <div class="price-ben">
                        <p><span class="fas fa-check"></span> Bocadillos gratis</p>
                        <p><span class="fas fa-check"></span> Todas las conferencias</p>
                        <p><span class="fas fa-check"></span> Todos los talleres</p>
                    </div>

                    <input type="number" name="" id="pase_td" min="0" max="99" placeholder="0">
                </div>

                <div class="price">
                    <p class="price-days">Pase por 2 días!</p>
                    <h3>&dollar;45</h3>
                    <div class="price-ben">
                        <p><span class="fas fa-check"></span> Bocadillos gratis</p>
                        <p><span class="fas fa-check"></span> Todas las conferencias</p>
                        <p><span class="fas fa-check"></span> Todos los talleres</p>
                    </div>

                    <input type="number" name="" id="pase_2d" min="0" max="99" placeholder="0">
                </div>
            </div>
        </fieldset>

        <h2>Elige tus talleres</h2>
        <fieldset>
            <p class="taller-default">Añade boletos para ver los talleres!</p>

            <h4 class="taller-viernes display-none">Viernes</h4>
            <div class="taller taller-viernes display-none">
                <div>
                    <p>Talleres</p>
                    <label for="taller_1"><input type="checkbox" name="taller_1" id="taller_1"><time class="color-orange">10:00</time> AngularJS</label>
                    <label for="taller_2"><input type="checkbox" name="taller_2" id="taller_2"><time class="color-orange">10:00</time> Flexbox</label>
                    <label for="taller_3"><input type="checkbox" name="taller_3" id="taller_3"><time class="color-orange">10:00</time> HTML5 y CSS3</label>
                    <label for="taller_4"><input type="checkbox" name="taller_4" id="taller_4"><time class="color-orange">10:00</time> Drupal</label>
                    <label for="taller_5"><input type="checkbox" name="taller_5" id="taller_5"><time class="color-orange">10:00</time> WordPress</label>
                </div>
                <div>
                    <p>Conferencias</p>
                    <label for="conf_1"><input type="checkbox" name="conf_1" id="conf_1"><time class="color-orange">10:00</time> Cómo ser Freelancer</label>
                    <label for="conf_2"><input type="checkbox" name="conf_2" id="conf_2"><time class="color-orange">10:00</time> Tecnologías del futuro</label>
                    <label for="conf_3"><input type="checkbox" name="conf_3" id="conf_3"><time class="color-orange">10:00</time> Seguridad en la Web</label>
                </div>
                <div>
                    <p>Conferencias</p>
                    <label for="semin_1"><input type="checkbox" name="semin_1" id="semin_1"><time class="color-orange">10:00</time> Diseño UI/UX para móviles</label>
                </div>
            </div>
            
            <h4 class="taller-sabado display-none">Sábado</h4>
            <div class="taller taller-sabado display-none">
                <div>
                    <p>Talleres</p>
                    <label for="taller_1"><input type="checkbox" name="taller_1" id="taller_1"><time class="color-orange">10:00</time> AngularJS</label>
                    <label for="taller_2"><input type="checkbox" name="taller_2" id="taller_2"><time class="color-orange">10:00</time> PHP y MySQL</label>
                    <label for="taller_3"><input type="checkbox" name="taller_3" id="taller_3"><time class="color-orange">10:00</time> JavaScript avanzado</label>
                    <label for="taller_4"><input type="checkbox" name="taller_4" id="taller_4"><time class="color-orange">10:00</time> SEO en Google</label>
                    <label for="taller_5"><input type="checkbox" name="taller_5" id="taller_5"><time class="color-orange">10:00</time> De Photoshop a HTML5 y CSS3</label>
                    <label for="taller_6"><input type="checkbox" name="taller_6" id="taller_6"><time class="color-orange">10:00</time> PHP medio y avanzado</label>
                </div>
                <div>
                    <p>Conferencias</p>
                    <label for="conf_1"><input type="checkbox" name="conf_1" id="conf_1"><time class="color-orange">10:00</time> Cómo crear una tienda online que venda millones en pocos días</label>
                    <label for="conf_2"><input type="checkbox" name="conf_2" id="conf_2"><time class="color-orange">10:00</time> Los mejores lugares para encontrar trabajo</label>
                    <label for="conf_3"><input type="checkbox" name="conf_3" id="conf_3"><time class="color-orange">10:00</time> Pasos para crear un negocio rentable</label>
                </div>
                <div>
                    <p>Conferencias</p>
                    <label for="semin_1"><input type="checkbox" name="semin_1" id="semin_1"><time class="color-orange">10:00</time> Aprende a programar en una mañana</label>
                    <label for="semin_2"><input type="checkbox" name="semin_2" id="semin_2"><time class="color-orange">10:00</time> Diseño UI/UX para móviles</label>
                </div>
            </div>

            <h4 class="taller-domingo display-none">Domingo</h4>
            <div class="taller taller-domingo display-none">
                <div>
                    <p>Talleres</p>
                    <label for="taller_1"><input type="checkbox" name="taller_1" id="taller_1"><time class="color-orange">10:00</time> Laravel</label>
                    <label for="taller_2"><input type="checkbox" name="taller_2" id="taller_2"><time class="color-orange">10:00</time> Crea tu propia API</label>
                    <label for="taller_3"><input type="checkbox" name="taller_3" id="taller_3"><time class="color-orange">10:00</time> JavaScript y jQuery</label>
                    <label for="taller_4"><input type="checkbox" name="taller_4" id="taller_4"><time class="color-orange">10:00</time> Creando plantillas para WordPress</label>
                    <label for="taller_5"><input type="checkbox" name="taller_5" id="taller_5"><time class="color-orange">10:00</time> Tiendas virtuales en Magento</label>
                </div>
                <div>
                    <p>Conferencias</p>
                    <label for="conf_1"><input type="checkbox" name="conf_1" id="conf_1"><time class="color-orange">10:00</time> Cómo hacer Marketing en línea</label>
                    <label for="conf_2"><input type="checkbox" name="conf_2" id="conf_2"><time class="color-orange">10:00</time> ¿Con qué lenguaje debo empezar?</label>
                    <label for="conf_3"><input type="checkbox" name="conf_3" id="conf_3"><time class="color-orange">10:00</time> Frameworks y librerías Open Source</label>
                </div>
                <div>
                    <p>Conferencias</p>
                    <label for="semin_1"><input type="checkbox" name="semin_1" id="semin_1"><time class="color-orange">10:00</time> Creando una App en Android en una tarde</label>
                    <label for="semin_2"><input type="checkbox" name="semin_2" id="semin_2"><time class="color-orange">10:00</time> Creando una App en iOS en una tarde</label>
                </div>
            </div>
        </fieldset>

        <h2>Pagos y extras</h2>
        <fieldset class="form-pagos">
            <div class="form-pagos_extra">
                <div>
                    <label for="camisas">Camisa del evento $10 (promoción 7% dto.)</label>
                    <input type="number" min="0" max="3" placeholder="0" id="camisas">
                </div>

                <div>
                    <label for="etiquetas">Paquete de 10 etiquetas $2 (HTML, CSS3, JavaScript, Google, Chrome)</label>
                    <input type="number" min="0" placeholder="0" id="etiquetas">
                </div>

                <div>
                    <label for="regalo">Selecciona un regalo</label>
                    <select id="regalo" required>
                        <option value="" disabled selected>-- Seleccione un regalo --</option>
                        <option value="regalo_eti">Etiquetas</option>
                        <option value="regalo_pul">Pulseras</option>
                        <option value="regalo_plu">Plumas</option>
                    </select>
                </div>

                <button id="calcular">Calcular</button>
            </div>
            <div class="form-pagos_resumen">
                <h3>Resumen</h3>

                <ul class="resumen-listado">
                </ul>

                <input type="submit" value="Pagar">
            </div>
        </fieldset>
    </form>
</section>
