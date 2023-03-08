<?php
if(isset($_SESSION['id_usuarios']))
{?>
<h1 class="centro">Alterar Leilão</h1>
<script src="leilao.js"></script>

<?php
    $consulta=$conect->prepare("SELECT *FROM leilao WHERE id_leilao=:p1");
    $consulta-> bindValue(":p1",$_GET["id"]);
    $consulta->execute();
    $result=$consulta->fetch();
?>

<fieldset class="campo"><legend>Por favor preencha o formúlario abaixo</legend>

<form method="post">
    <label class="alinhar">
        <strong><p>Nome do Leilão</p></strong>
        <input name="nome_leilao2" type="text" placeholder="Digite o nome do Leilão" value="<?=$result["nome_leilao"]?>" maxlength="45" required>
    </label>

    <label class="alinhar">
        <strong><p>Data do Leilão</p></strong>
        <input name="data2" type="date" placeholder="Digite a data do Leilão" value="<?=$result["data_leilao"]?>" max="9999-12-31" required>
    </label>

    <label class="alinhar">
        <strong><p>Local</p></strong>
        <input name="local2" type="text" placeholder="Digite o local do Leilão" value="<?=$result["localizacao"]?>" maxlength="45" required>
    </label>

    <input name="id2" type="hidden" value="<?=$_GET["id"]?>">

    <button class="btn-leilao bu">Alterar Leilão</button><br><br><br><br><br>
    <label class="return">
        <?php echo "<a class='return2'href='index.php?arquivo=leilao&id=".$_SESSION["id_usuarios"]."'>Voltar</a>"?>
    </label><br>
</form>

</fieldset><br>

<?php
    if(isset($_POST['nome_leilao2']))
    {
        $nome_leilao2 = $_POST['nome_leilao2'];
        $data2 = $_POST['data2'];
        $local2 = $_POST['local2'];
        $id2 = $_POST['id2'];
        $logando->conectar();   
        if($logando->alterar_leilao($nome_leilao2, $data2, $local2, $id2))
        {
            echo("<script>redirecionar_leilao();</script>");
        }
        else
        {
            echo("<script>erro_leilao();</script>"); 
        }
    }
}
else
{
    echo"Você deve fazer login primeiro";
}
?>