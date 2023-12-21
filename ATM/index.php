<?php require('./LAYOUT/header.php') ?>

<script src="Calc.js"></script>
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
            <img src="IMG/Pedido.png" alt="">
            <h3>PEDIDOS</h3>
            <p>Lista de pedidos.</p>
            <p>Realiza el pedido.</p>
            <a href="Pedidos.php" class="btn">Read More</a>
        </div>
        <!--
        <div class="box">
            <img src="IMG/Transaccion.png" alt="">
            <h3>TRANSACCIONES</h3>
            <p>Movimientos hechos</p>
            <a href="Transacciones.php" class="btn">read more</a>
        </div>-->
        <div class="box">
            <img src="IMG/Proveedor.png" alt="">
            <h3>PROVEEDORES</h3>
            <p>Lista de Proveedores</p>
            <a href="Proveedores.php" class="btn">read more</a>
        </div>
        <!--
        <div class="box">
            <img src="IMG/Products Admin.png" alt="">
            <h3>PRODUCTOS</h3>
            <p>Enlistado de Productos</p>
            <a href="Productos.php" class="btn">read more</a>
        </div>-->

        <div class="box">
            <img src="IMG/Comprador.png" alt="">
            <h3>VENTAS</h3>
            <p>Realizacion de Compra o segumiento</p>
            <a href="Ventas.php" class="btn">read more</a>
        </div>
    </div>

</div>
<!---->

<div>
<?php require('./LAYOUT/aside.php') ?>

<?php require('./LAYOUT/footer.php') ?>