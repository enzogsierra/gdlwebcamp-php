// Seleccionar elementos
const pase_1d = document.getElementById("pase_1d");
const pase_td = document.getElementById("pase_td");
const pase_2d = document.getElementById("pase_2d");
const camisas = document.getElementById("camisas");
const etiquietas = document.getElementById("etiquetas");


//
document.addEventListener("DOMContentLoaded", () =>
{
    loadMap();
    formEvent();
    tallerHandler();
})

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

function loadMap()
{
    if(!document.getElementById("map")) return;

    let coords = [-34.65523, -58.526144];
    let map = L.map('map').setView(coords, 20);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', 
    {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker(coords).addTo(map)
        .bindPopup('GDLWEBCAPM 2021<br>Boletos ya disponibles!')
        .openPopup()
        .bindTooltip("GDLWEBCAMP 2021")
        .openTooltip();

}