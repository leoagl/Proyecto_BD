<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font Awesome-->
    <link rel="shortcut icon" href="IMG/Alert.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" href="Estilos.css">
    <link rel="stylesheet" href="CSS/Productos ATM.css">
    <!--More Customs-->
    <style type="text/css">
                .marquee-text-wrap{overflow:hidden}
        .marquee-text-content{width:100000px}
        .marquee-text-text{-webkit-animation-name:marquee-text-animation;animation-name:marquee-text-animation;-webkit-animation-timing-function:linear;animation-timing-function:linear;-webkit-animation-iteration-count:infinite;animation-iteration-count:infinite;float:left}
        .marquee-text-paused .marquee-text-text{-webkit-animation-play-state:paused;animation-play-state:paused}
        @-webkit-keyframes marquee-text-animation{0%{-webkit-transform:translateX(0);transform:translateX(0)}to{-webkit-transform:translateX(-100%);transform:translateX(-100%)}}
        @keyframes marquee-text-animation{0%{-webkit-transform:translateX(0);transform:translateX(0)}to{-webkit-transform:translateX(-100%);transform:translateX(-100%)}}
    </style>
    <title>Gestion de Productos</title>
    <!--Customs Fonts-->
    <script>
  (function(d) {
    var config = {
      kitId: 'gma5fkb',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="contenedor" id="app">
        <div id="sidebar" class="">
            <div class="toggle-btn">
                <span>&#9776;</span><i></i>
            </div>
            <ul>
                <li>
                    <img src="IMG/icon ATM.png" alt="Icon Manager" class="icon">
                </li>
                <li>
                <h1><?php session_start();echo isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : 'FULL NAME ATM'; ?></h1>
                </li>
                <li>
                    <h2>ATM</h2>
                </li>
                <li>
                    <a href="index.php"><img src="IMG/Home.png" alt="Icono de Home" class="Home">HOME</a>
                </li>
                <li>
                    <a href="Productos.php"><img src="IMG/products.png" alt="Icono de products" class="Products">PRODUCTS</a>
                </li>
                <li>
                    <a href="Ventas.php"><img src="IMG/Sales.png" alt="Icono de Sales" class="Sales">SALES</a>
                </li>
                <!--<li>
                    <a href="Inventario.php"><img src="IMG/Inventory.png" alt="Icono de Inventory" class="Inventory">INVENTORY</a>
                </li>-->
                <li>
                    <a href="/inicio_sesion.php"><img src="IMG/Exit.png" alt="Icono de Exit" class="Exit">EXIT</a>
                </li>
            </ul>   
        </div>
          <header>
             <div class="logo">
                <img src="IMG/Pasteleria.png" alt="Logo de la empresa" class="logo-img">
                <h2 class="logo-nombre">Pasteleria Perla</h2>
             </div>
           </header>
        <div class="contenido">