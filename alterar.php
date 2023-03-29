<?php
if(isset($_SESSION['id_usuarios']))
{
?>
<script src="gado.js"></script>

<?php
    $consulta=$conect->prepare("SELECT *FROM gado WHERE id_gado=:p1");
    $consulta-> bindValue(":p1",$_GET["id"]);
    $consulta->execute();
    $result=$consulta->fetch();
?>

<br>
<h1 class="centro">Altere Seu Anúncio</h1>
<br>
<fieldset> <legend>Por favor Preencha o Formúlario Abaixo</legend>

<form action="" method="post">

<?php
    if ($result["tipo"] == "Leite")
    {
        ?>
        <label class="alinhar">
        <strong><p>Qual é a Aptidão do seu Animal?</p></strong>
            <select name="tipo2" required>
                <option value="Leite">Leite</option>
                <option value="Dupla-Aptidao">Dupla Aptidão</option>
                <option value="Corte">Corte</option>
                <option value="P.O">P.O</option>
            </select>
        </label>
        <?php
    }

    if ($result["tipo"] == "Dupla-Aptidao")
    {
        ?>
        <label class="alinhar">
        <strong><p>Qual é a Aptidão do seu Animal?</p></strong>
            <select name="tipo2" required>
                <option value="Dupla-Aptidao">Dupla Aptidão</option>
                <option value="Leite">Leite</option>
                <option value="Corte">Corte</option>
                <option value="P.O">P.O</option>
            </select>
        </label>
        <?php
    }

    if ($result["tipo"] == "Corte")
    {
        ?>
        <label class="alinhar">
        <strong><p>Qual é a Aptidão do seu Animal?</p></strong>
            <select name="tipo2" required>
                <option value="Corte">Corte</option>
                <option value="Dupla-Aptidao">Dupla Aptidão</option>
                <option value="Leite">Leite</option>
                <option value="P.O">P.O</option>
            </select>
        </label>
        <?php
    }

    if ($result["tipo"] == "P.O")
    {
        ?>
        <label class="alinhar">
        <strong><p>Qual é a Aptidão do seu Animal?</p></strong>
            <select name="tipo2" required>
                <option value="P.O">P.O</option>
                <option value="Corte">Corte</option>
                <option value="Dupla-Aptidao">Dupla Aptidão</option>
                <option value="Leite">Leite</option>
            </select>
        </label>
        <?php
    }
?>

<label class="alinhar">
    <strong><p>Qual é a raça?</p></strong>
    <input name="raça2" type="text" placeholder="Digite a raça do bovino" maxlength="45" value="<?=$result["raça"]?>"required>
</label>

<label class="alinhar">
    <strong><p>Idade do Bovino:</p></strong>
    <input name="idade2" type="text" placeholder="Digite a idade do bovino" maxlength="45" value="<?=$result["idade"]?>"required>
</label>

<label class="alinhar">
    <strong><p> Estado</p></strong>
    <input name="estado2" type="text" placeholder="Digite a sigla do seu estado" value="<?=$result["estado"]?>"maxlength="2" minlength="2"required>
</label>

<label class="alinhar">
    <strong><p>Cidade</p></strong>
    <input name="cidade2" type="text" placeholder="Digite o nome da sua cidade" maxlength="45" value="<?=$result["cidade"]?>" required>
</label>

<label class="alinhar">
<strong><p>Preço</p></strong>
    <input name="preço2" type="number" placeholder="Digite o preço" max="1000000000" value="<?=$result["preço"]?>"required>
</label>

<label class="alinhar">
    <strong><p>Quantidade</p></strong>
    <input name="quantidade2" type="number" placeholder="Número total de cabeças" max="1000000000" value="<?=$result["quantidade"]?>"required>
</label>

<label class="alinhar">
    <strong><p>Peso por Unidade(Aproximado)</p></strong>
    <input name="peso2" type="number" placeholder="Peso em @" max="1000000000" value="<?=$result["peso"]?>"required>
</label>

<label class="alinhar">
    <strong><p>Telefone</p></strong>
    <input name="telefone2" type="text" placeholder="Digite seu telefone" maxlength="20" value="<?=$result["telefone"]?>"required>
</label>

<input name="id2" type="hidden" value="<?=$_GET["id"]?>"><br><br><br><br><br>
<button class="btn-anuncio bu">Alterar Anúncio</button>
</form>

</fieldset>
<br>
<br>

<?php
if(isset($_POST['tipo2']))
{
    $tipo2 = $_POST['tipo2'];
    $raça2 = $_POST['raça2'];
    $idade2 =$_POST['idade2'];
    $estado2 = $_POST['estado2'];
    $cidade2 = $_POST['cidade2'];
    $preço2 = $_POST['preço2'];
    $quantidade2 = $_POST['quantidade2'];
    $peso2 = $_POST['peso2'];
    $telefone2 = $_POST['telefone2'];
    $id2 = $_POST['id2'];
    $logando->conectar();  
    if($logando->alterar_gado($tipo2, $raça2 , $idade2, $estado2, $cidade2, $preço2, $quantidade2, $peso2, $telefone2, $id2))
    {
        echo("<script>redirecionar2();</script>");
    }
    else
    {
        echo"<script>erro();</script>";
    }
}
}
else
{
    echo"Você deve fazer login primeiro";
}
?>