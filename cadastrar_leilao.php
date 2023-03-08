<?php
if(isset($_SESSION['id_usuarios']))
{?>
<h1 class="centro">Agendar Leilão</h1>

<script src="leilao.js"></script>
<fieldset class="campo"><legend>Por favor preencha o formúlario abaixo</legend>

<form method="post">
    <label class="alinhar">
        <strong><p>Nome do Leilão</p></strong>
        <input name="nome_leilao" type="text" placeholder="Digite o nome do Leilão" maxlength="45" required>
    </label>

    <label class="alinhar">
        <strong><p>Data do Leilão</p></strong>
        <input name="data" type="date" placeholder="Digite a data do Leilão" max="9999-12-31" required>
    </label>

    <label class="alinhar">
        <strong><p>Local</p></strong>
        <input name="local" type="text" placeholder="Digite o local do Leilão" maxlength="45" required>
    </label>

    <input name="id" type="hidden" value="<?=$_SESSION["id_usuarios"]?>">

    <button class="btn-leilao bu">Agendar</button><br><br><br><br><br>
    <label class="return">
        <?php echo "<a class='return2'href='index.php?arquivo=leilao&id=".$_SESSION["id_usuarios"]."'>Voltar</a>"?>
    </label>

</form>


</fieldset><br>

<?php
    if(isset($_POST['nome_leilao']))
    {
        $nome_leilao = $_POST['nome_leilao'];
        $data = $_POST['data'];
        $local = $_POST['local'];
        $id = $_POST['id'];
        if($logando->cadastrar_leilao($nome_leilao, $data, $local, $id))
        {
            echo("<script>cad_leilao();</script>");
        }
        else
        {
            echo("<script>erro_cad();</script>");
        }
    }
}
else
{
    echo"Você deve fazer login primeiro";
}
?>