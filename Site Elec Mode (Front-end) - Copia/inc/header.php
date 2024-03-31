
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="<?php echo BASEURL?>darkmode.js" defer></script>
    <script src="<?php echo BASEURL?>search.js" defer></script>
    <script src="<?php echo BASEURL?>carrinho.js" defer></script>
    <script src="<?php echo BASEURL?>attPag.js" defer></script>
    <script src="<?php echo BASEURL?>cart.js" defer></script>
    <link rel="stylesheet" href="<?php echo BASEURL?>style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous" defer></script>
    <title>Elec Mode</title>
</head>
<body>
    <header>
        <div class="navLogo">
            <img src="<?php echo BASEURL?>Logotipo2/4.png" id="navLogo" alt="">
        </div>
        <div class="navLinks">
            <ul>
                <li><a href="<?php echo BASEURL?>">Inicio</a></li>
                <li><a href="#">Categorias</a></li>
                <li><a href="#">Mais vendidos</a></li>
            </ul>
        </div>
        <div class="navUtility">
            <i class='bx bxs-moon activeDark'></i>
            <i class='bx bx-search-alt-2 activeSearch'></i>
            <i class='bx bx-cart activeCart' ></i>
        </div>
    </header>
    <div id="cartModal" class="cartModal">
        <button id="closeCartModalBtn" class="closeCartModalBtn"><i class="bx bx-x"></i></button>
        <h1>Carrinho</h1>
        <div class="cartContent" id="cartContent">
            <p>Seu carrinho está vazio.</p>
        </div>
        <button class="clearCart" id="clearCartBtn">Limpar Carrinho</button>
    </div>

    <div class="searchBar">
        <input type="text" placeholder="Pesquisar...">
    </div>
    