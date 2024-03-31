<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once "./inc/functions.php";
index();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Styles/global.css">
    <link rel="icon" type="image/png" href="Logo/Logo_Branca.png">

    <script src="js/darkmode.js" defer></script>
    <script src="js/carrousel.js" defer></script>
    <script src="js/carrinho.js" defer></script>
    <script src="js/user.js" defer></script>

    <title>Elec Mode</title>
</head>

<body>
    <!-- Cabeçalho -->
    <header>
        <div class="navLogo">
            <img src="Logo/Logo_Preta.png" alt="">
        </div>
        <div class="navSearch">
            <input type="search" name="" id="navSearch" placeholder="O que está buscando?">
        </div>
        <div class="navIntegers">
            <p><i class='bx bx-cart'></i>Carrinho</p>
            <span>I</span>
            <p class="darkModeToggle"><i class='bx bxs-moon darkModeToggle'></i>Modos</p>
            <span>I</span>
            <p class="profileToggle"><i class='bx bx-user-circle profileToggle'></i>Perfil</p>
        </div>
    </header>
    <div class="navLinks">
        <li><a href="#"><i class='bx bx-list-ul'></i>Inicio</a></li>
        <li><a href="#">Catálogo</a></li>
        <li><a href="#">Entrar em Contato</a></li>
    </div>
    <div class="navLine"></div>

    <div class="cartModal" id="cartModal">

        <span class="modal-close"><i class="bx bx-x font"></i></span>

        <h2 class="font">Seu Carrinho</h2>

        <div class="carrinhoProdutos">
            <div class="cardProdCarrinho ">
                <img class="cardImgCarrinho" src="Logo/Logo_Branca.png" alt="">
                <p class="cardDescCarrinho font">Desc</p>
                <div class="cardQPCarrinho">
                    <p class="cardQntCarrinho font"> 2</p>
                    <p class="cardPrecCarrinho font">R$200</p>
                </div>
            </div>
        </div>

        <div class="cartLow">
            <button class="cartBtn cartClear">Limpar Carrinho</button>
            <button class="cartBtn cartFinish">Finalizar Pedido</button>
        </div>

    </div>

    <div class="profileModal" id="profileModal">

        <div class="profileImg"><i class='bx bx-camera profileCam'></i></div>
        <div class="profileInfo">
            <?php if (!isset($_SESSION['id'])): ?>
                <p class="font">
                    <?php echo $_SESSION['nome'] ?>
                </p>
                <p class="font">
                    <?php echo $_SESSION['email'] ?>
                </p>
            <?php endif ?>
            <?php if (isset($_SESSION['id'])): ?>
                <p>Bem vindo!</p>
                <p>Faça <a href="./logins/FormLogar.php">Login</a> ou <a href="./logins/FormCadastrar.php">Cadastre-se</a>
                </p>
            <?php endif ?>
        </div>


        <span class="profile-close"><i class="bx bx-x font"></i></span>
    </div>

    <!-- Cabeçalho -->
    <div class="conteudo">
        <!-- carrousel -->
        <main>
            <div class="mainCarrousel">
                <i class="bx bxs-chevron-left seta-esquerda"></i>
                <img class="imgCarrousel" src="img/CarrouselDesktop/Carrousel (1).png" alt="">
                <img class="imgCarrousel" src="img/CarrouselDesktop/carrousel_img2.png" alt="">
                <img class="imgCarrousel" src="img/CarrouselDesktop/Carrousel_img3.png" alt="">
                <img class="imgCarrousel" src="img/CarrouselDesktop/Carrousel_img4.png" alt="">

                <i class="bx bxs-chevron-right seta-direita"></i>
            </div>
            <div class="indicadores"></div>

            <!-- destaque -->

            <div class="mainDestaque">
                <h1 class="font h1Categorias">Mais Vendidos</h1>
                <div class="containerProdutos">
                    <button class="seta-esquerda"><i class="bx bxs-chevron-left font"></i></button>
                    <div class="produtos-wrapper">
                        <?php if ($produtos): ?>
                            <?php foreach ($produtos as $produto): ?>
                                <div class="cardProdutos">
                                    <div class="cardImg">
                                        <img src="Logo/Logo_Branca.png" alt="">
                                    </div>
                                    <div class="cardDesc">
                                        <p class="desc cardFont">
                                            <?php echo $produto['nome_produto']; ?>
                                        </p>
                                    </div>
                                    <div class="cardLow cardFont">
                                        <p class="cardPreco">R$
                                            <?php echo $produto['preco_produto']; ?>
                                        </p>
                                        <button class="cardBtn comprarBtn">COMPRAR</button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">Nenhum registro encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </div>
                    <button class="seta-direita"><i class="bx bxs-chevron-right font"></i></button>
                </div>


                <div class="mainAcessorios">
                    <h1 class="font h1Categorias">Acessórios</h1>
                    <div class="containerProdutos">
                        <div class="cardProdutos">
                            <div class="cardImg">
                                <img src="Logo/Logo_Branca.png" alt="">
                                <!-- não é necessário que seja essa imagem, ela é só ilustração  -->
                            </div>
                            <div class="cardDesc">
                                <p class="desc cardFont">TALTALTALTAL</p>
                            </div>
                            <div class="cardLow cardFont">
                                <p class="cardPreco">
                                    R$100,00
                                </p>
                                <button class="cardBtn comprarBtn">COMPRAR</button>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
</body>

</html>