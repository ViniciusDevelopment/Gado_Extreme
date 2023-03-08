<?php
if(isset($_SESSION['id_usuarios']))
{
?>
<div class="opaco">
<script src="gado.js"></script>
<br>
<h1 class="centro">Crie Seu Anúncio Aqui!</h1>
<br>
<fieldset> <legend>Por favor Preencha o Formúlario Abaixo</legend>

<form action="" method="post">
<label class="alinhar">
    <strong><p>Qual é a Aptidão do seu Animal?</p></strong>
    <select name="tipo" required>
        <option value="">Selecione o Tipo</option>
        <option value="Leite">Leite</option>
        <option value="Dupla-Aptidao">Dupla Aptidão</option>
        <option value="Corte">Corte</option>
        <option value="P.O">P.O</option>
    </select>
</label>

<label class="alinhar">
    <strong><p>Qual é a raça?</p></strong>
    <input name="raça" type="text" placeholder="Digite a raça do bovino" maxlength="45" required>
</label>

<label class="alinhar">
    <strong><p>Idade do Bovino:</p></strong>
    <input name="idade" type="text" placeholder="Digite a idade do bovino" maxlength="45"  required>
</label>

<label class="alinhar">
    <strong><p> Estado</p></strong>
    <input name="estado" type="text" placeholder="Digite a sigla do seu estado" minlength="2" maxlength="2" required>
</label>

<label class="alinhar">
    <strong><p>Cidade</p></strong>
    <input name="cidade" type="text" placeholder="Digite o nome da sua cidade" maxlength="45" required>
</label>

<label class="alinhar">
<strong><p>Preço</p></strong>
    <input name="preço" type="number" placeholder="Digite o preço" max="1000000000" required>
</label>

<label class="alinhar">
    <strong><p>Quantidade</p></strong>
    <input name="quantidade" type="number" placeholder="Número total de cabeças" max="1000000000" required>
</label>

<label class="alinhar">
    <strong><p>Peso por Unidade(Aproximado)</p></strong>
    <input name="peso" type="number" placeholder="Peso em @" max="1000000000" required>
</label>

<label class="alinhar">
    <strong><p>Telefone</p></strong>
    <input name="telefone" type="text" placeholder="Digite seu telefone" maxlength="20" required>
</label>

<input name="id" type="hidden" value="<?=$_SESSION["id_usuarios"]?>"><br><br><br><br><br>

<button class="btn-anuncio bu">Enviar Anúncio</button>
</form>

</fieldset>
</div>
<br>
<br>

<?php
    if(isset($_POST['tipo']))
    {
        $tipo = $_POST['tipo'];
        $raça = $_POST['raça'];
        $idade =$_POST['idade'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $preço = $_POST['preço'];
        $quantidade = $_POST['quantidade'];
        $peso = $_POST['peso'];
        $telefone = $_POST['telefone'];
        $id = $_POST['id'];  
        if($logando->cadastrar_gado($tipo, $raça , $idade, $estado, $cidade, $preço, $quantidade, $peso, $telefone, $id))
        {
            echo("<script>cad_gado();</script>");
        }
        else
        {
            echo("<script>erro_cad_gado();</script>");
        }
    }
}
else
{
    echo"Você deve fazer login primeiro";
}
?>