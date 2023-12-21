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
/* Calculo de Datos de Personal*/


function agregarPersonal(event) {
   event.preventDefault();

   var nombre = document.getElementById('LetraNP').value;
   var apellido = document.getElementById('LetraAP').value;
   var email = document.getElementById('LetraEP').value;
   var contrasena = document.getElementById('contrasena').value;
   var rol = document.getElementById('rol').value;

   if (!validarTexto(nombre) || !validarTexto(apellido) || !validarEmail(email)) {
       alert('Por favor, revisa los campos de nombre, apellido y correo electrónico.');
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
   xhttp.open("POST", "../insercion_trabajadores.php", true);
   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

   // Enviar los datos al servidor
   xhttp.send("nombre=" + encodeURIComponent(nombre) +
       "&apellido=" + encodeURIComponent(apellido) +
       "&email=" + encodeURIComponent(email) +    
       "&contrasena="+ encodeURIComponent(contrasena)+
       "&rol=" + encodeURIComponent(rol));
   // Resto del código para agregar la fila a la tabla
   var table = document.getElementById('tablaPersonal');
   var rowCount = table.rows.length;
   var row = table.insertRow(rowCount);

   var cell1 = row.insertCell(0);
   var cell2 = row.insertCell(1);
   var cell3 = row.insertCell(2);
   var cell4 = row.insertCell(3);
   var cell5 = row.insertCell(4);

   cell1.innerHTML = rowCount;
   cell2.innerHTML = nombre;
   cell3.innerHTML = apellido;
   cell4.innerHTML = contrasena;
   cell5.innerHTML = rol;

   document.getElementById('formulario').reset();
}
/* Calculo de Datos de Clientes*/

function agregarUsuario(event) {
   event.preventDefault();

   var nombre = document.getElementById('LetraN').value;
   var apellido = document.getElementById('LetraA').value;
   var telefono = document.getElementById('LetraT').value;

   if (!validarTexto(nombre) || !validarTexto(apellido) || !validarTelefono(telefono)) {
       alert('Por favor, revisa los campos de nombre, apellido y correo electrónico.');
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
   xhttp.open("POST", "../insercion_usuarios.php", true);
   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

   // Enviar los datos al servidor
   xhttp.send("nombre=" + encodeURIComponent(nombre) +
       "&apellido=" + encodeURIComponent(apellido) +
       "&telefono=" + encodeURIComponent(telefono));

   // Resto del código para agregar la fila a la tabla
   var table = document.getElementById('tabla');
   var rowCount = table.rows.length;
   var row = table.insertRow(rowCount);

   var cell1 = row.insertCell(0);
   var cell2 = row.insertCell(1);
   var cell3 = row.insertCell(2);
   var cell4 = row.insertCell(3);

   cell1.innerHTML = rowCount;
   cell2.innerHTML = nombre;
   cell3.innerHTML = apellido;
   cell4.innerHTML = telefono;

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
   var regex = /^[0-9\s\(\)-]{10}$/;
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

function descargarPDF() {
    // Realiza una solicitud al script PHP que genera el PDF
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "generar_pdf.php", true);
    xhr.responseType = "blob";

    xhr.onload = function () {
        if (xhr.status === 200) {
            // Crea un enlace temporal y simula un clic para descargar el archivo
            var blob = new Blob([xhr.response], { type: "application/pdf" });
            var link = document.createElement("a");
            link.href = window.URL.createObjectURL(blob);
            link.download = "reporte_ventas.pdf";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    };

    xhr.send();
}
function actualizarStock(event) {
    event.preventDefault();
 
    var idPastel = document.getElementById('LetraIdP').value;
    var STOCK = document.getElementById('LetraC').value;
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                try {
                    var response = JSON.parse(this.responseText);
                    if (response.success) {
                        alert('Stock actualizado correctamente.');
                    } else {
                        alert('Error al actualizar el stock: ' + response.message);
                    }
                } catch (error) {
                    alert('Error al procesar la respuesta del servidor.');
                }
            } else {
                alert('Error al realizar la solicitud.');
            }
        }
    };
 
    xhttp.open("POST", "../actualizar_pasteles.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("LetraIdP=" + encodeURIComponent(idPastel) + "&LetraC=" + encodeURIComponent(STOCK));
 }

/* Calculo de Datos de Productos */

function agregarProducto(event) {
   event.preventDefault();

   var nombre = document.getElementById('LetraNPr').value;
   var precio = parseFloat(document.getElementById('LetraPr').value);
   var costo = parseFloat(document.getElementById('LetraCP').value);
   var stock = document.getElementById('LetraSK').value;
   var FechaCaduca = document.getElementById('LetraFC').value;
   var FechaPrepara = document.getElementById('LetraFP').value;
   var Proveedor = document.getElementById('LetraP').value;
   
   if (!validarTexto(nombre)|| !validarPrecio(precio) || !validarCosto(costo)/*|| !validarFecha(FechaCaduca)|| !validarFecha(FechaPrepara)*/) {
       alert('Por favor, revisa los campos de nombre, Precio/Costo, fecha de Caducidad o Preparacion');
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
   xhttp.open("POST", "../insercion_productos.php", true);
   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

   // Enviar los datos al servidor
   xhttp.send("nombre=" + encodeURIComponent(nombre) +
       "&precio=" + encodeURIComponent(precio) +
       "&costo=" + encodeURIComponent(costo) +
       "&stock=" + encodeURIComponent(stock) +
       "&FechaCaduca=" + encodeURIComponent(FechaCaduca) +
       "&FechaPrepara=" + encodeURIComponent(FechaPrepara) +
       "&Proveedor=" + encodeURIComponent(Proveedor));

   var precioconsigno = '$' + precio.toFixed(2);
   var costoconsigno = '$' + costo.toFixed(2);
   var table = document.getElementById('tablaProducto');
   var rowCount = table.rows.length;
   var row = table.insertRow(rowCount);

   var cell1 = row.insertCell(0);
   var cell2 = row.insertCell(1);
   var cell3 = row.insertCell(2);
   var cell4 = row.insertCell(3);
   var cell5 = row.insertCell(4);
   var cell6 = row.insertCell(5);
   var cell7 = row.insertCell(6);
   var cell8 = row.insertCell(7);

   cell1.innerHTML = rowCount;
   cell2.innerHTML = nombre;
   cell3.innerHTML = precioconsigno;
   cell4.innerHTML = costoconsigno;
   cell5.innerHTML = stock;
   cell6.innerHTML = FechaCaduca;
   cell7.innerHTML = FechaPrepara;
   cell8.innerHTML = Proveedor;

   document.getElementById('formulario').reset();
}

/* Calculo de Datos de Proveedor */

function agregarProveedor(event) {
   event.preventDefault();

   var nombre = document.getElementById('LetraNP').value;
   var direccion = document.getElementById('LetraD').value;
   var telefono = document.getElementById('LetraT').value;
   var email = document.getElementById('LetraEP').value;

   if (!validarTexto(nombre) || !validarDireccion(direccion) || !validarTelefono(telefono) || !validarEmail(email)) {
       alert('Por favor, revisa los campos de nombre, direccion, telefono y correo electrónico.');
       return;
   }

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function () {
       if (this.readyState == 4 && this.status == 200) {
           // Manejar la respuesta del servidor si es necesario
           console.log(this.responseText);
       }
   };

   // Configurar la solicitud POST hacia tu archivo PHP que maneja la inserción en la base de datos
   xhttp.open("POST", "../insercion_proveedores.php", true);
   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

   // Enviar los datos al servidor
   xhttp.send("nombre=" + encodeURIComponent(nombre) +
       "&direccion=" + encodeURIComponent(direccion) +
       "&telefono=" + encodeURIComponent(telefono) +
       "&email=" + encodeURIComponent(email));

   // Resto del código para agregar la fila a la tabla
   var table = document.getElementById('tablaPersonal');
   var rowCount = table.rows.length;
   var row = table.insertRow(rowCount);

   var cell1 = row.insertCell(0);
   var cell2 = row.insertCell(1);
   var cell3 = row.insertCell(2);
   var cell4 = row.insertCell(3);
   var cell5 = row.insertCell(4);

   cell1.innerHTML = rowCount;
   cell2.innerHTML = nombre;
   cell3.innerHTML = direccion;
   cell4.innerHTML = telefono;
   cell5.innerHTML = email;

   document.getElementById('formulario').reset();
}