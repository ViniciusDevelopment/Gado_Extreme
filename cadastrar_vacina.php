<?php
if(isset($_SESSION['id_usuarios']))
{?>
<h1 class="centro">Gerenciar Vacinas</h1>

<script src="vacina.js"></script>

<fieldset class="campo"><legend>Por favor preencha o formúlario abaixo</legend>

<form method="post">
    <label class="alinhar">
        <strong><p>Vacina</p></strong>
        <input name="nome_vacina" type="text" placeholder="Digite o nome da Vacina" maxlength="45"required>
    </label>

    <label class="alinhar">
        <strong><p>Data de Aplicação</p></strong>
        <input name="data_aplicacao" type="date" placeholder="Digite a data de aplicação da vacina" max="9999-12-31" required>
    </label>

    <label class="alinhar">
        <strong><p>Quantidade</p></strong>
        <input name="vacinados" type="number" placeholder="Quantos gados foram vacinados" max="1000000000"required>
    </label>

    <input name="id" type="hidden" value="<?=$_SESSION["id_usuarios"]?>">

    <button class="btn-leilao bu">Enviar</button><br><br><br><br><br>

    <label class="return">
        <?php echo "<a class='return2'href='index.php?arquivo=vacina&id=".$_SESSION["id_usuarios"]."'>Voltar</a>"?>
    </label>
</form>

</fieldset><br>

<?php
    if(isset($_POST['nome_vacina']))
    {
        $nome_vacina = $_POST['nome_vacina'];
        $data_aplicacao = $_POST['data_aplicacao'];
        $vacinados = $_POST['vacinados'];
        $id = $_POST['id']; 
        if($logando->cadastrar_vacina($nome_vacina, $data_aplicacao, $vacinados, $id))
        {
            echo("<script>cadvacina();</script>");
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