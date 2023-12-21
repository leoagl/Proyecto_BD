<?php require('./LAYOUT/header.php') ?>

<script src="cheats.js"></script>
<main class="main">
    <h1>Bienvenido</h1>
    <p>En esta pagina esta hecho con fines de educacion, simulacion y teorico de calculo sobre una empresa que requiere
        una gestion web para los empleados</p>
</main>
<div class="container-card">
    <div class="alert-text2">
    <div class="alert-star alert-star-1 alert-star-a-2" style="top:14.1581103584248px;
  left:21.783699982047295px;
  transform: scale(0.7)"></div>
  <div class="alert-star alert-star-2 alert-star-a-3" style="top:21.056714930740185px;
  left:166.5385131265263px;
  transform: scale(1)"></div>
  <div class="alert-star alert-star-4 alert-star-a-0" style="top:-13.955291686621592px;
  left:340.63200124731964px;
  transform: scale(0.4)"></div>
        <div class="alert-result">
            <img src="IMG/descargar.png" height="50" alt="">
        </div>
    </div>

    <h1 class="heading">SERVICIOS</h1>

    <div class="box-container">

        <div class="box">
            <img src="IMG/Admins.png" alt="">
            <h3>PERSONAL</h3>
            <p>Mostrativa de perfiles con rol de ADMIN/GERENTE y CAJERO/ATM</p>
            <a href="Administration.php" class="btn">Read More</a>
        </div>

        <div class="box">
            <img src="IMG/Clients.png" alt="">
            <h3>CLIENTES</h3>
            <p>Mostrativa de perfiles de los clientes</p>
            <a href="Users.php" class="btn">Read more</a>
        </div>

        <div class="box">
            <img src="IMG/Proveedor.png" alt="">
            <h3>PROVEEDORES</h3>
            <p>Mostrativa de perfiles que tiene el rol de Proveedor</p>
            <a href="Suppliers.php" class="btn">Read more</a>
        </div>

        <div class="box">
            <img src="IMG/Products Admin.png" alt="">
            <h3>PRODUCTOS</h3>
            <p>Mostrativa en forma general de productos existentes de la empresa</p>
            <a href="Products Pastel.php" class="btn">Read more</a>
        </div>

        <div class="box">
            <img src="IMG/Comprador.png" alt="">
            <h3>COMPRAS</h3>
            <p>Mostrativa de Compras realizadas</p>
            <a href="Sales.php" class="btn">Read more</a>
        </div>
        <div class="box">
            <img src="IMG/Analisis.png" alt="">
            <h3>ANALISIS</h3>
            <p>Seguimiento de movimientos realizados</p>
            <a href="Analysis.php" class="btn">Read more</a>
        </div>

    </div>

</div>
<!---->

<div>

<?php require('./LAYOUT/footer.php') ?>