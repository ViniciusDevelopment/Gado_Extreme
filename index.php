<?php
    include 'pouparlinhas.php';
    session_start();
    if(!isset($_SESSION['id_usuarios']))
        {
            header("location: login/login.php");
        }
        require_once 'conexao.php';
        $logando = new Usuario;
        $logando->conectar();
?>
    <link rel="stylesheet" href="principal.css">
    <title>Gado Extreme</title>

<div id="site">
    <header id="cabecalho">
        <main >
            <div id="conteudo-cabecalho">
                <a href="index.php?arquivo=home"><img src="img/logo.png"></a>
                <div id="conteudo-direita">
                    <label class="icones">
                        <img class="mudacor" src="img/user.jpg" alt="">
                        <label><?php echo $_SESSION["nome"] ?></label>
                        <nav class="menu-lateral">
                            <ul>
                                <?php
                                    echo "<a class=link href='index.php?arquivo=conta&id=".$_SESSION["id_usuarios"]."'><li class='opçoes'> 
                                    <svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='user' class='svg-inline--fa fa-user fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><path fill='currentColor' d='M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z'></path></svg>   
                                Conta</li></a>";
                                ?>
                                
                                <?php
                                        echo "<a class=link href='index.php?arquivo=meusbovinos&id=".$_SESSION["id_usuarios"]."'><li class='opçoes'> 
                                        <svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='hat-cowboy-side' class='svg-inline--fa fa-hat-cowboy-side fa-w-20' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'><path fill='currentColor' d='M260.8 291.06c-28.63-22.94-62-35.06-96.4-35.06C87 256 21.47 318.72 1.43 412.06c-3.55 16.6-.43 33.83 8.57 47.3C18.75 472.47 31.83 480 45.88 480H592c-103.21 0-155-37.07-233.19-104.46zm234.65-18.29L468.4 116.2A64 64 0 0 0 392 64.41L200.85 105a64 64 0 0 0-50.35 55.79L143.61 226c6.9-.83 13.7-2 20.79-2 41.79 0 82 14.55 117.29 42.82l98 84.48C450.76 412.54 494.9 448 592 448a48 48 0 0 0 48-48c0-25.39-29.6-119.33-144.55-127.23z'></path></svg>
                                        Meus Bovinos</li></a>";
                                ?> 

                                <?php
                                    echo "<a class=link href='index.php?arquivo=vacina&id=".$_SESSION["id_usuarios"]."'><li class='opçoes'> 
                                    <svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='syringe' class='svg-inline--fa fa-syringe fa-w-16' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path fill='currentColor' d='M201.5 174.8l55.7 55.8c3.1 3.1 3.1 8.2 0 11.3l-11.3 11.3c-3.1 3.1-8.2 3.1-11.3 0l-55.7-55.8-45.3 45.3 55.8 55.8c3.1 3.1 3.1 8.2 0 11.3l-11.3 11.3c-3.1 3.1-8.2 3.1-11.3 0L111 265.2l-26.4 26.4c-17.3 17.3-25.6 41.1-23 65.4l7.1 63.6L2.3 487c-3.1 3.1-3.1 8.2 0 11.3l11.3 11.3c3.1 3.1 8.2 3.1 11.3 0l66.3-66.3 63.6 7.1c23.9 2.6 47.9-5.4 65.4-23l181.9-181.9-135.7-135.7-64.9 65zm308.2-93.3L430.5 2.3c-3.1-3.1-8.2-3.1-11.3 0l-11.3 11.3c-3.1 3.1-3.1 8.2 0 11.3l28.3 28.3-45.3 45.3-56.6-56.6-17-17c-3.1-3.1-8.2-3.1-11.3 0l-33.9 33.9c-3.1 3.1-3.1 8.2 0 11.3l17 17L424.8 223l17 17c3.1 3.1 8.2 3.1 11.3 0l33.9-34c3.1-3.1 3.1-8.2 0-11.3l-73.5-73.5 45.3-45.3 28.3 28.3c3.1 3.1 8.2 3.1 11.3 0l11.3-11.3c3.1-3.2 3.1-8.2 0-11.4z'></path></svg>
                                Vacina</li></a>";
                                ?> 

                                <a class="link" href="sair.php">
                                    <li class="opçoes"> 
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="door-open" class="svg-inline--fa fa-door-open fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M624 448h-80V113.45C544 86.19 522.47 64 496 64H384v64h96v384h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM312.24 1.01l-192 49.74C105.99 54.44 96 67.7 96 82.92V448H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h336V33.18c0-21.58-19.56-37.41-39.76-32.17zM264 288c-13.25 0-24-14.33-24-32s10.75-32 24-32 24 14.33 24 32-10.75 32-24 32z"></path></svg>     
                                Sair</li></a> 
                                
                            </ul>
                        </nav>
                    </label>

                    
                </div>
            </div>  
        </main>
    </header>
    <?php
        $arquivo = $_GET["arquivo"] ?? "home";
    ?>  
    <main >
        <div id="menu">
            <div>
                <ul>
                    <li><a class="formatacao" <?php if($arquivo=="home") {echo "id='ativar'";} ?> <?php echo "href='index.php?arquivo=home&id=".$_SESSION["id_usuarios"]."'>Home</a>"?></li>
                    <li><a class="formatacao" <?php if($arquivo=="anunciar") {echo "id='ativar'";} ?> <?php echo "href='index.php?arquivo=anunciar&id=".$_SESSION["id_usuarios"]."'>Anunciar</a>"?></li>
                    <li><a class="formatacao" <?php if($arquivo=="comprar") {echo "id='ativar'";} ?> <?php echo "href='index.php?arquivo=comprar&id=".$_SESSION["id_usuarios"]."'>Comprar</a>"?></li>
                    <li><a class="formatacao" <?php if($arquivo=="nutricao") {echo "id='ativar'";} ?> <?php echo "href='index.php?arquivo=nutricao&id=".$_SESSION["id_usuarios"]."'>Nutrição</a>"?></li>
                    <li><a class="formatacao" <?php if($arquivo=="noticias") {echo "id='ativar'";} ?> <?php echo "href='index.php?arquivo=noticias&id=".$_SESSION["id_usuarios"]."'>Notícias</a>"?></li>
                    <li><a class="formatacao" <?php if($arquivo=="leilao" OR $arquivo=="cadastrar_leilao") echo "id='ativar'" ?> <?php echo "href='index.php?arquivo=leilao&id=".$_SESSION["id_usuarios"]."'>Leilões</a>"?></li>
                </ul>
            </div>
        </div><br><br><br><br>

        </main>

        <main class="esconde_isso">
        
        <?php
            if(file_exists($arquivo.".php"))
            {
                include $arquivo.".php";

            }else
            {
                include "meusbovinos.php";
            }
        ?> 
        
        </main>

    <footer class="rodape" ><img class="logo" src="img/logo.png"> 
    <div class="redes-sociais" ><a class="link-rede1" href="https://www.facebook.com/Gado-Extreme-100262395139254"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" class="svg-inline--fa fa-facebook fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path></svg></a>
    <a class="link-rede2" href="https://instagram.com/gado_extreme?igshid=192hcd07tlirl"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg></a>
    <a class="link-rede3" href="https://api.whatsapp.com/send?phone=+55 63 9252-0632"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" class="svg-inline--fa fa-whatsapp fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg></a>
    </div>
    </footer>
</div>

