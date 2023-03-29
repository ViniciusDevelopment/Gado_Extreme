<?php
if(isset($_SESSION['id_usuarios']))
{?>
<h1 class="centro">Gerenciar Vacinas</h1>

<script src="vacina.js"></script>

<?php
    $consulta=$conect->prepare("SELECT *FROM vacina WHERE id_vacina=:p1");
    $consulta-> bindValue(":p1",$_GET["id"]);
    $consulta->execute();
    $result=$consulta->fetch();
?>

<fieldset class="campo"><legend>Por favor preencha o formúlario abaixo</legend>

<form method="post">
    <label class="alinhar">
        <strong><p>Vacina</p></strong>
        <input name="nome_vacina" type="text" placeholder="Digite o nome da Vacina" value="<?=$result["nome_vacina"]?>" maxlength="45" required>
    </label>

    <label class="alinhar">
        <strong><p>Data de Aplicação</p></strong>
        <input name="data_aplicacao" type="date" placeholder="Digite a data de aplicação da vacina" value="<?=$result["data_aplicacao"]?>" max="9999-12-31" required>
    </label>

    <label class="alinhar">
        <strong><p>Quantidade</p></strong>
        <input name="vacinados" type="number" placeholder="Quantos gados foram vacinados" value="<?=$result["vacinados"]?>" max="1000000000" required>
    </label>

    <input name="id" type="hidden" value="<?=$_GET["id"]?>">

    <button class="btn-leilao bu">Enviar</button><br><br><br><br><br>

    <label class="return">
        <?php echo "<a class='return2' href='index.php?arquivo=vacina&id=".$_SESSION["id_usuarios"]."'>Voltar</a>"?>
    </label><br>
</form>

</fieldset><br>

<?php
    if(isset($_POST['nome_vacina']))
    {
        $nome_vacina2 = $_POST['nome_vacina'];
        $data_aplicacao2 = $_POST['data_aplicacao'];
        $vacinados2 = $_POST['vacinados'];
        $id2= $_POST['id'];
        if($logando->alterar_vacina($nome_vacina2, $data_aplicacao2, $vacinados2, $id2))
        {
            echo("<script>alterar_vacina();</script>");
        }
        else
        {
            echo("<script>erro_vacina();</script>");
        }
    }
}
else
{
    echo"Você deve fazer login primeiro";
}
?>