function playPause(){
    var mi_audio = document.getElementsByTagName('audio')[0];
    mi_audio.volume = 0.3;
    mi_audio.loop=true;
    var reproduciendo = true;
    var pista = document.getElementById('algunacosa');
    var boton_play_pause = document.getElementById('boton_play_pause');
    boton_play_pause.onclick = function(){
       if(reproduciendo){
          reproduciendo = false;
          pista.pause();
       }else{
          reproduciendo = true;
          pista.play();
       }
    }
 }
 
 window.onload = function(){
    playPause();
 }

 const btnToggle = document.querySelector('.toggle-btn');
 btnToggle.addEventListener('click' ,function(){
   document.getElementById('sidebar').classList.toggle('active');
 });

 ScrollReveal().reveal('.showcase');
ScrollReveal().reveal('.box-container', {delay: 500});
ScrollReveal().reveal('.footer', {delay: 500});
ScrollReveal().reveal('.cards-banner-one', {delay: 500});
/* Calculo de Datos de Pedidos*/

function agregarPedido(event) {
   event.preventDefault();

   var FechaVenta = document.getElementById('LetraFV').value;
   var Cantidad = document.getElementById('LetraCV').value;
   var IdProducto = document.getElementById('LetraIV').value;
   var TotalVenta = parseFloat(document.getElementById('LetraTV').value);
   var IdCliente = document.getElementById('LetraIC').value;
   var IdTrabajador = document.getElementById('LetraIT').value;

   if (!validarFecha(FechaVenta) || !validarCosto(TotalVenta)) {
       alert('Por favor, revisa el campo de Fecha de Venta.');
       return;
   }

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function () {
       if (this.readyState == 4 && this.status == 200) {
           // Manejar la respuesta del servidor si es necesario
           console.log(this.responseText);
       }
   };
  

   // Configurar la solicitud POST hacia el archivo PHP que hace inserciones en la base
   xhttp.open("POST", "../insercion_ventas.php", true);
   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

   // Enviar los datos al servidor
   xhttp.send("FechaVenta=" + encodeURIComponent(FechaVenta) +
       "&Cantidad=" + encodeURIComponent(Cantidad) +
       "&IdProducto=" + encodeURIComponent(IdProducto) +
       "&TotalVenta=" + encodeURIComponent(TotalVenta) +
       "&IdCliente=" + encodeURIComponent(IdCliente) +
       "&IdTrabajador=" + encodeURIComponent(IdTrabajador));
   var totalFormateado = '$' + TotalVenta.toFixed(2);

   var table = document.getElementById('tablaPedido');
   var rowCount = table.rows.length;
   var row = table.insertRow(rowCount);

   var cell1 = row.insertCell(0);
   var cell2 = row.insertCell(1);
   var cell3 = row.insertCell(2);
   var cell4 = row.insertCell(3);
   var cell5 = row.insertCell(4);
   var cell6 = row.insertCell(5);
   var cell7 = row.insertCell(6);

   cell1.innerHTML = rowCount;
   cell2.innerHTML = FechaVenta;
   cell3.innerHTML = Cantidad;
   cell4.innerHTML = IdProducto;
   cell5.innerHTML = totalFormateado;
   cell6.innerHTML = IdCliente;
   cell7.innerHTML = IdTrabajador;

   document.getElementById('formulario').reset();
}
//Validadores//
function validarTexto(texto) {
   var regex = /^[A-Za-z\s]+$/;
   return regex.test(texto);
}

function validarEmail(email) {
   var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
   return regex.test(email);
}

function validarTelefono(telefono) {
   var regex = /^[0-9\s\(\)-]+$/;
   return regex.test(telefono);
}
function validarDireccion(direccion) {
   var regex = /^[A-Za-z0-9\s.,#\-]+$/;
   return regex.test(direccion);
}
function validarPrecio(precio) {
   var regex = /^\d+(\.\d{1,2})?$/;
   return regex.test(precio);
}
function validarCosto(costo) {
   var regex = /^\d+(\.\d{1,2})?$/;
   return regex.test(costo);
}
function validarFecha(fecha) {
   //YYYY-MM-DD
   var regex = /^\d{4}-\d{2}-\d{2}$/;
   return regex.test(fecha);
}
function validarNumeroEntero(numero) {
   var regex = /^\d+$/;
   return regex.test(numero);
}
