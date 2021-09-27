// Seleccionar elementos
const pase_1d = document.getElementById("pase_1d");
const pase_td = document.getElementById("pase_td");
const pase_2d = document.getElementById("pase_2d");
const camisas = document.getElementById("camisas");
const etiquietas = document.getElementById("etiquetas");


//
document.addEventListener("DOMContentLoaded", () =>
{
    fixedNav(); // Controla el comportamiento del .bar
    activeLink(); // Manejar el active link del bar-nav
    onAnimateSummary(); // Anima los números en la seccion .summary
    loadMap(); // Carga el mapa leaflet
    formEvent(); // Calcula los precios (/registro.html)
    tallerHandler(); // Controla los talleres que se muestran (/registro.html)
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
    const active_link = document.querySelector('div[bar-nav]'); // Buscar por el div con el atributo "bar-nav"
    if(active_link)
    {
        const att = active_link.getAttribute("bar-nav"); // Extraer el texto del atributo "bar-nav"
        const nav = document.querySelector(`.bar-nav a[href="${att}"]`); // Buscar por el enlace que su href sea igual al texto del atributo "bar-nav"
        if(nav) nav.classList.add("bar-nav__active"); // Añadir la clase de link activo
    }
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


//
function formEvent()
{
    if(!document.querySelector(".form")) return 1;

    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const email = document.getElementById("email");

    // Calcular
    const regalo = document.getElementById("regalo");
    const calcular = document.getElementById("calcular");
    calcular.addEventListener("click", (e) =>
    {
        e.preventDefault();
        if(!regalo.value)
        {
            alert("Debes elegir un regalo");
            regalo.focus();
            return;
        }

        // Obtener precios
        const n1 = (parseInt(pase_1d.value, 10) || 0) * 30; // Pase 1 dia
        const n2 = (parseInt(pase_td.value, 10) || 0) * 50; // Pase todos los dias
        const n3 = (parseInt(pase_2d.value, 10) || 0) * 45; // Pase 2 dias
        const n4 = ((parseInt(camisas.value, 10) || 0) * 10) * .93; // Cantidad de camisetas
        const n5 = (parseInt(etiquietas.value, 10) || 0) * 2; // Cantidad de etiquetas
        const total = n1 + n2 + n3 + n4 + n5; // Total

        // Listar productos
        let productos = [];
        if(pase_1d.value > 0) productos.push({texto: (pase_1d.value + (pase_1d.value == 1 ? " pase" : " pases") + " por día"), precio: n1});
        if(pase_td.value > 0) productos.push({texto: (pase_td.value + (pase_td.value == 1 ? " pase" : " pases") + " por todos los días"), precio: n2});
        if(pase_2d.value > 0) productos.push({texto: (pase_2d.value + (pase_2d.value == 1 ? " pase" : " pases") + " por 2 días"), precio: n3});
        if(camisas.value > 0) productos.push({texto: (camisas.value + (camisas.value == 1 ? " camisa" : " camisas")), precio: n4});
        if(etiquietas.value > 0) productos.push({texto: (etiquietas.value + (etiquietas.value == 1 ? " etiqueta" : " etiquetas")), precio: n5});
        
        // Mostrar productos en el resumen
        const form_listado = document.querySelector(".resumen-listado");
        let html = "";
        productos.forEach(producto =>
        {
            html += `<li><span>${producto.texto}</span><span>$${producto.precio.toFixed(0)}</span></li>`;
        });
        html += `<li class="resumen-total">Total:<span>$${total}`;
        form_listado.innerHTML = html;
    });
}

function tallerHandler()
{
    if(!document.querySelector(".form")) return; 

    pase_1d.addEventListener("click", () => tallerHandlerEx(".taller-viernes", parseInt(pase_1d.value || 0)));
    pase_td.addEventListener("click", () => tallerHandlerEx(".taller-sabado", parseInt(pase_td.value || 0)));
    pase_2d.addEventListener("click", () => tallerHandlerEx(".taller-domingo", parseInt(pase_2d.value || 0)));
}

function tallerHandlerEx(taller, value)
{
    // Seleccionar el día del taller y mostrarlo/ocultarlo según la cantidad de boletos seleccionados
    const div = document.querySelectorAll(taller); // Selecciona el h4 y div
    if(value) div.forEach(e => { e.classList.remove("display-none"); }); // Si hay 1 boleto o más, quitarle la clase de display-none
    else div.forEach(e => { e.classList.add("display-none"); }); // Si no hay boletos, añadir la clase display-none

    //
    const p = document.querySelector(".taller-default"); 

    if(parseInt(pase_1d.value || 0) + parseInt(pase_td.value || 0)  + parseInt(pase_2d.value || 0)) 
    {
        p.classList.add("display-none");
    }
    else p.classList.remove("display-none");
}


//
function loadMap()
{
    if(!document.getElementById("map")) return;

    let coords = [-34.65523, -58.526144]; // Coordenadas
    let map = L.map('map').setView(coords, 20); // 20 = zoom

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
    $(".countdown").countdown("2022/01/01 00:00:00", function(e) // Fecha en la que ocurrirá el evento
    {
        $("#countdown-d").html(e.strftime("%D")); // Asiganamos el conteo de días al elemento p#countdown-d
        $("#countdown-h").html(e.strftime("%H")); // ...
        $("#countdown-m").html(e.strftime("%M"));
        $("#countdown-s").html(e.strftime("%S"));
    });


    // Colorbox
    try
    {
        $(".guest-info").colorbox({inline: true, width: "40%"});
    }
    catch {}
});