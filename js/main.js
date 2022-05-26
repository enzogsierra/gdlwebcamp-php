document.addEventListener("DOMContentLoaded", () =>
{
    fixedNav(); // Controla el comportamiento del .bar
    activeLink(); // Manejar el active link del bar-nav
    onAnimateSummary(); // Anima los números en la seccion .summary
    loadMap(); // Carga el mapa leaflet
    formEvent(); // Calcula los precios (/registro.html)
    //tallerHandler(); // Controla los talleres que se muestran (/registro.html)
    ticketsHandler();
});


//
function fixedNav()
{
    const last_element = document.querySelector("header"); // Elemento anterior al elemento que queremos fijar
    const fixed_element = document.querySelector(".bar"); // Elemento que queremos fijar
    
    // Cada vez que el observe cambia
    const observer = new IntersectionObserver(entries => 
    {
        if(!entries[0].isIntersecting) // last_element no está visible en la vista
        {
            last_element.style.marginBottom = `${fixed_element.offsetHeight}px`;
            fixed_element.classList.add("bar-fixed"); // Fijamos el elemento en la vista
        }
        else // last_element está visible
        {
            last_element.style.marginBottom = "0";
            fixed_element.classList.remove("bar-fixed"); // Desfijamos el elemento
        }
    });
    observer.observe(last_element); // Le decimos al observer que observe por el "last_element"
}


// Active link
function activeLink()
{
    const href = window.location.href.slice(window.location.href.lastIndexOf("/") + 1); // Extraer el link que está visitando el usuario
    const active_link = document.querySelector(`.bar-nav a[href='${href}'][active-link]`); // Buscar por el enlace que direccione al mismo link donde está el usuario actualmente
    if(active_link) active_link.classList.add("bar-nav__active"); // Añadir la clase de link activo
}


//
function onAnimateSummary()
{
    const element = document.querySelector(".summary-t");
    if(!element) return;

    let animated = false;
    const observer = new IntersectionObserver(entries =>
    {
        // Verificar si ya se animaron los números
        if(animated) return;

        // Animar numeros cuando estén en la vista
        if(entries[0].isIntersecting)
        {
            $(".summary-hero .summary div:nth-child(1) .summary-n").animateNumber({number: 6}, 1000);
            $(".summary-hero .summary div:nth-child(2) .summary-n").animateNumber({number: 15}, 1500);
            $(".summary-hero .summary div:nth-child(3) .summary-n").animateNumber({number: 3}, 1000);
            $(".summary-hero .summary div:nth-child(4) .summary-n").animateNumber({number: 9}, 1200);
            animated = true;
        }
    })
    observer.observe(element);
}


// Controlar el form de /reservaciones
function formEvent()
{
    if(!document.querySelector(".form")) return 1;

    
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const email = document.getElementById("email");
    const camisas = document.getElementById("camisas");
    const etiquietas = document.getElementById("etiquetas");

    // Calcular
    const regalo = document.getElementById("regalo");
    const calcular = document.getElementById("calcular");
    const pagar = document.getElementById("pagar");
    calcular.addEventListener("click", (e) =>
    {
        e.preventDefault();

        //
        if(!selectedTicket)
        {
            alert("Debes seleccionar un ticket");
            return;
        }
        if(selectedDatesCount != maxDates)
        {
            alert("Debes seleccionar todas las fechas que quieres asistir");
            selectedTicket.querySelector("input").focus();
            return;
        }
        if(!regalo.value)
        {
            alert("No te olvides de elegir un regalo");
            regalo.focus();
            return;
        }

        // Obtener precios
        const ticketPrice = parseInt(selectedTicket.getAttribute("ticket-price") || 0, 10); // Precio del ticket
        const shirtPrice = ((parseInt(camisas.value, 10) || 0) * 10) * .93; // Precio de las camisetas con descuento
        const labelPrice = (parseInt(etiquietas.value, 10) || 0) * 2; // Precio de las etiquetas
        const total = ticketPrice + shirtPrice + labelPrice; // Total


        // Listar productos
        let productos = [];

        productos.push(
        {
            texto: `Ticket para ` + (maxDates == 0 ? `todos los días` : `${maxDates} día/s`), 
            precio: `$${(ticketPrice).toFixed(2)}`
        });
        if(camisas.value > 0) 
        {
            productos.push(
            {
                texto: (camisas.value + (camisas.value == 1 ? " camisa" : " camisas")), 
                precio: `<strike class="text-muted">($${(shirtPrice / .93).toFixed(2)})</strike> $${(shirtPrice).toFixed(2)}!`
            });
        }
        if(etiquietas.value > 0) 
        {
            productos.push(
            {
                texto: (etiquietas.value + (etiquietas.value == 1 ? " etiqueta" : " etiquetas")), 
                precio: `$${(labelPrice).toFixed(2)}`
            });
        }

        const selectedGift = regalo.querySelector(`option[value='${regalo.value}']`);
        productos.push(
        {
            texto: `${selectedGift.text}`,
            precio: "Gratis"
        });
        

        // Listar productos en HTML
        let html = "<li><span>Producto</span><span>Precio</span></li>";
        productos.forEach(producto =>
        {
            html += `<li><span>${producto.texto}</span><span>${producto.precio}</span></li>`;
        });
        html += `<li><span>Total:</span><span>$${total}</span>`;
        
        // Mostrar/ocultar elementos
        document.querySelector(".form-pagos_default").classList.add("display-none");
        document.querySelector(".form-pagos_resumen").classList.remove("display-none");
        document.querySelector(".resumen-listado").innerHTML = html;

        document.getElementById("pago").value = total;
    });
}


// Tickets
let selectedTicket = 0;
let selectedDatesCount = 0;
let maxDates = 0;

function ticketsHandler()
{
    if(!document.querySelector(".form")) return 1;
    
    let ticketId = document.querySelector("#ticket-id"); // Hidden input que almacena el ticketId seleccionado

    const tickets = document.querySelectorAll("div[ticket-id]");
    const hidden = document.querySelectorAll("#_hidden-date-id");

    tickets.forEach(ticket => 
    {
        // Esta funcion es llamada cuando se presiona en el ticket o en cualquier elemento dentro del mismo
        ticket.addEventListener("click", (e) =>
        {
            // El usuario seleccionó el ticket
            if(ticket != selectedTicket)
            {
                // Resetear todos los tickets
                ticketsReset();
                tickets.forEach(e => 
                { 
                    e.classList.add("filter-grayscale"); // Dar filtro gris a los tickets
                });

                // Añadir clases al ticket clickeado
                ticket.classList.add("ticket-selected");
                ticket.classList.remove("filter-grayscale"); // Quitar filtro gris al ticket
                ticket.querySelector(".ticket-dates").classList.remove("display-none");
                ticket.querySelector(".ticket-button").classList.add("display-none");

                ticketId.value = ticket.getAttribute("ticket-id");
                maxDates = parseInt(ticket.getAttribute("ticket-maxDates"));
                selectedTicket = ticket;

                // Controlar inputs
                const inputs = ticket.querySelectorAll(".ticket-date-id");
                
                if(maxDates == 0) // Si el ticket seleccionado habiltia todas las fechas por default, mostrar todas las fechas
                {
                    document.querySelector(".form-dates .date-default").classList.add("display-none");
                    document.querySelectorAll(".form-dates .date").forEach(date => { date.classList.remove("display-none") });

                    // Checkear y deshabilitar fechas
                    inputs.forEach(i => { i.checked = i.disabled = true; });

                    // Habilitar los hidden inputs
                    hidden.forEach(e => { e.disabled = false; });
                }
                else
                {
                    // Des-checkear y habilitar fechas
                    inputs.forEach(i => { i.checked = i.disabled = false; });
                }
                return;
            }

            // El usuario presionó en el botón "Cancelar"
            if(e.target.id == "ticket-cancel")
            {
                ticketsReset();
                return;
            }

            // El usuario seleccionó una fecha
            if(e.target.nodeName == "INPUT")
            {
                switch(maxDates)
                {
                    case 0: break; // Todas las fechas seleccionadas por default
                    case 1: // 1 sola fecha 
                    {
                        selectedDatesCount = 1;

                        // Ocultar todos los eventos
                        document.querySelectorAll(".date[date-id]").forEach(e => { e.classList.add("display-none"); });

                        // Mostrar eventos de la fecha seleccionada
                        const dateId = e.target.getAttribute("date-id");
                        document.querySelector(`.date[date-id='${dateId}'`).classList.remove("display-none");

                        // Manipular hidden inputs
                        hidden.forEach(e => { e.disabled = true; });
                        document.querySelector(`#_hidden-date-id[value='${dateId}']`).disabled = false;
                        break;
                    }
                    default: // Múltiples fechas
                    {
                        selectedDatesCount += (e.target.checked) ? (1) : (-1);
                        if(selectedDatesCount == maxDates) // Cantidad de fechas posibles seleccionadas
                        {
                            // Deshabilitamos todos los checkbox excepto los que están seleccionados
                            ticket.querySelectorAll(".ticket-date-id").forEach(input => { input.disabled = !(input.checked); });
                        }
                        else // El usuario todavía tiene fechas disponibles para seleccionar
                        {
                            // Habilitar todos los inputs
                            ticket.querySelectorAll(".ticket-date-id").forEach(input => { input.disabled = false; });
                        }

                        // Mostrar/ocultar fechas
                        const dateId = e.target.getAttribute("date-id");
                        if(e.target.checked) document.querySelector(`.date[date-id='${dateId}'`).classList.remove("display-none");
                        else document.querySelector(`.date[date-id='${dateId}'`).classList.add("display-none");

                        // Manipular hidden inputs
                        ticket.querySelectorAll(".ticket-date-id").forEach(input =>
                        {
                            const dateId = input.getAttribute("date-id");
                            document.querySelector(`#_hidden-date-id[value='${dateId}']`).disabled = !(input.checked);
                        });
                        break;
                    }
                }

                // Mostrar/ocultar el texto .date-default
                if(selectedDatesCount) document.querySelector(".form-dates .date-default").classList.add("display-none");
                else document.querySelector(".form-dates .date-default").classList.remove("display-none");
            }
        })
    });
}

function ticketsReset()
{
    document.querySelector("#ticket-id").value = "0";
    selectedTicket = maxDates = selectedDatesCount = 0;

    const tickets = document.querySelectorAll(".ticket");
    tickets.forEach(e =>
    {
        e.classList.remove("ticket-selected");
        e.classList.remove("filter-grayscale");
        e.querySelector(".ticket-button").classList.remove("display-none");
        e.querySelector(".ticket-dates").classList.add("display-none");

        // Resetear inputs
        const inputs = e.querySelectorAll(".ticket-date-id");
        if(inputs) inputs.forEach(i => { i.checked = false, i.disabled = true; });
    });

    // Hidden inputs
    const hidden = document.querySelectorAll("#_hidden-date-id");
    hidden.forEach(e => { e.disabled = true; });

    // Ocultar fechas
    document.querySelector(".form-dates .date-default").classList.remove("display-none");
    document.querySelectorAll(".form-dates .date").forEach(date => { date.classList.add("display-none") });
}


//
function loadMap()
{
    if(!document.getElementById("map")) return;

    let coords = [-34.65523, -58.526144]; // Coordenadas
    let map = L.map('map').setView(coords, 18); // 18 = zoom

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', 
    {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker(coords).addTo(map)
        .bindPopup('GDLWEBCAPM 2021<br>Boletos ya disponibles!')
        .openPopup()
        .bindTooltip("GDLWEBCAMP 2021");
}


//
$(function()
{
    // Programa del evento
    $(".pcard-info").hide(); // Ocultar todos los .pcard-info
    $(".pcard-info:first").show(); // Selecciona el primer .pcard-info y lo muestra (default)
    $(".pcard-links a:first").addClass("pcard-link__active");

    // Cuando el usuario haga click en talleres/conferencias/seminarios
    $(".pcard-links a").on("click", function() 
    {
        $(".pcard-links a").removeClass("pcard-link__active");
        $(".pcard-info").hide(); // Buscar todos los ".pcard-info" y ocultarlos

        let link = $(this).attr("href"); // Obtener el href del enlace presionado
        $(this).addClass("pcard-link__active");
        $(link).fadeIn(500); // Mostrar el card presionado
        return false;
    });


    // Countdown
    const nextYear = new Date().getFullYear() + 1;
    $(".countdown").countdown(`${nextYear}/01/01 00:00:00`, function(e) // Fecha en la que ocurrirá el evento
    {
        $("#countdown-d").html(e.strftime("%D")); // Asiganamos el conteo de días al elemento p#countdown-d
        $("#countdown-h").html(e.strftime("%H")); // ...
        $("#countdown-m").html(e.strftime("%M"));
        $("#countdown-s").html(e.strftime("%S"));
    });

    const pDate = document.querySelector("p.event-date");
    pDate.innerHTML = `<span class="far fa-calendar-alt"></span> 01/01/${nextYear}`;


    // Colorbox
    try
    {
        $(".guest-info").colorbox({inline: true, width: "600px"});
    }
    catch {}
});