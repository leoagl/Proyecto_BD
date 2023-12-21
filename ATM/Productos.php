<?php require('./LAYOUT/header.php') ?>

<script src="calc.js"></script>
<main class="main">
    <h1>Productos</h1>
    <p>En este apartado se muestra como perspectiva de un cliente hacia los productos</p>
</main>
<div class="alert-text">
            <div class="marquee-text-wrap">
                <div class="marquee-text-content">
                    <div class="marquee-text-text" style="animation-duration: 10s;">
                        <div class="alert-main alert-close"></div>
                    </div>
                    <div class="marquee-text-text" style="animation-duration: 10s;">
                        <div class="alert-main alert-close"></div>
                    </div>
                </div>
            </div>
        </div>
<div class="container-de-products">
    <h3 class="title">Cakes Products</h3>
    <div class="products-container">
    <div class="product" data-name="p-1">
        <img src="IMG/Cheesecake.png" alt="">
        <h3>Cheesecake</h3>
        <div class="price">$125.00/Kg</div>
    </div>
    
    <div class="product" data-name="p-2">
        <img src="IMG/Triple Milk.png" alt="">
        <h3>Triple Leche</h3>
        <div class="price">$125.00/Kg</div>
    </div>
    
    <div class="product" data-name="p-3">
        <img src="IMG/Crepas.jpg" alt="">
        <h3>Pastel de Crepas</h3>
        <div class="price">$125.00/Kg</div>
    </div>
    
    <div class="product" data-name="p-4">
        <img src="IMG/Limon.jpg" alt="">
        <h3>Pastel de Mousse de limon</h3>
        <div class="price">$125.00/Kg</div>
    </div>
    
    <div class="product" data-name="p-5">
        <img src="IMG/Oreo.png" alt="">
        <h3>Pastel de Oreo</h3>
        <div class="price">$125.00/Kg</div>
    </div>
    
    <div class="product" data-name="p-6">
        <img src="IMG/Tirimasu.jpg" alt="">
        <h3>Pastel de Tiramisú</h3>
        <div class="price">$125.00/Kg</div>
    </div>
    </div>
</div>
<div class="container-fijo">
    <input type="checkbox" id="btn-mas">
    <div class="redes">
    <a href="#" class="icon-facebook"></a>
    </div>
    <div class="btn-mas">
        <label for="btn-mas" class="icon-plus"></label>
    </div>
</div>
<table>
	<thead>
		<tr class="Arriba">
			<th colspan="7">Productos</th>
		</tr>
		<tr class="Abajo">
			<th>#</th>
			<th>Nombre</th>
			<th>Precio Proveedor</th>
            <th>Costo Publico</th>
            <th>STOCK</th>
            <th>Fecha de Caducidad</th>
            <th>Fecha de Preparacion</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>Cream</td>
			<td>Origami</td>
            <td>Cream</td>
			<td>Origami</td>
            <td>Cream</td>
			<td>Origami</td>
		</tr>
		<tr>
			<td>2</td>
			<td>Tohka</td>
			<td>Date</td>
            <td>Cream</td>
			<td>Origami</td>
            <td>Cream</td>
			<td>Origami</td>
		</tr>
	</tbody>
</table>
<?php require('./LAYOUT/aside.php') ?>
<?php require('./LAYOUT/footer.php') ?>