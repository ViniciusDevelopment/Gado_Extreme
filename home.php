<?php
if(isset($_SESSION['id_usuarios']))
{
    ?>
    <h1 class="centro4 deslizar2">Seja bem vindo, <?php echo $_SESSION["nome"] ?>!</h1>
    <br>


    <h2 class="deslizar">Plataforma para conectar vendedores e compradores de gados</h2>
        <img class="img_home deslizar" src="img/comprar_gado.jpg" alt="">
        <?php echo "<a href='index.php?arquivo=anunciar&id=".$_SESSION["id_usuarios"]."'><button class='bu bu2' >Anunciar</button> </a>"?>
        <br>


    <h2 class="deslizar">Gerencie a Vacinação</h2>
        <img class="img_home deslizar" src="img/vacina_gado.jpg" alt=""><br>
        <?php echo "<a href='index.php?arquivo=vacina&id=".$_SESSION["id_usuarios"]."'><button class='bu bu3' >Vacina</button> </a>"?>

    <h2 class="deslizar">Veja as Notícias mais Quentes do Mercado</h2>
    <img class="img_home deslizar" src="img/noticias.jpg" alt="">
    <?php echo "<a href='index.php?arquivo=noticias&id=".$_SESSION["id_usuarios"]."'><button class='bu bu4' >Notícias</button> </a>"?>

    <h2 class="deslizar">Agende seus leilões virtualmente</h2>
    <img class="img_home deslizar" src="img/leilao2.jpg" alt="">
    <?php echo "<a href='index.php?arquivo=leilao&id=".$_SESSION["id_usuarios"]."'><button class='bu bu5' >Leilão</button> </a>"?>
<?php
}
else
{
    echo"Você deve fazer login primeiro";
}
?>
