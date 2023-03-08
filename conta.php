<?php
if(isset($_SESSION['id_usuarios']))
{
?>
<script src="usuario.js"></script>

<h1>Configurações Gerais</h1>
<p>Gerencie os detalhes da conta que você compartilhou com a Gado Extreme, incluindo seu nome, informações de contato e senhas.</p>
<br>
<hr>

<h1>Dados Pessoais</h1>
<!-- Form 1 inicio-->
<form class="form-conta" action="" method="post">
    <strong><p>Nome:</p></strong>
    <input name="nome-alterar" class="input-user" type="text" value="<?=$_SESSION["nome"]?>" required maxlength="20">
    <input type="hidden" name="id" value="<?=$_GET["id"]?>">
    <button class="btn2 bu" type="submit">Salvar</button>
</form>
<!-- Form 1 fim -->

<!-- Form 2 inicio-->
<form class="form-conta" action="" method="post">
    
        <strong><p>E-mail:</p></strong>
        <input name="email-alterar"class="input-user" type="email" value="<?=$_SESSION["email"]?>" maxlength="255"required>
    
    <input type="hidden" name="id" value="<?=$_GET["id"]?>">
    <button class="btn2 bu" type="submit">Salvar</button>
</form>
<!-- Form 2 fim -->
<!-- Form 3 inicio-->
<form class="form-conta2" action="" method="post">
    <label >
        <strong><p>Senha:</p></strong>
        <input name="senha-alterar" class="input-user" type="password" placeholder="Digite sua nova senha" maxlength="50" required>
    </label>

    <label class="lado2">
        <strong><p>Confirmar Senha:</p></strong>
        <input name="confsenha-alterar" class="input-user" type="password" placeholder="Confirme a senha" maxlength="50" required>
        <input type="hidden" name="id" value="<?=$_GET["id"]?>">
    </label>
    <button class="btn2 bu" type="submit">Salvar</button>
</form>

<br>
<br>
<hr>


<h1>Excluir Conta</h1>
<p>Se você confirmar a exclusão da conta, ela será excluída imediatamente. A exclusão será irreversível, portanto tome cuidado!.
</p>
<form action="" method="post">
<input type="hidden" name="email_delete" value="<?=$_SESSION['email']?>">
<input name="email-segurança"class="input-user" type="email" placeholder="Por Segurança digite seu e-mail" required>
<button class="bu" type="submit">Excluir Conta</button>
</form>
<br>


<?php
if(isset($_POST['nome-alterar']))
{
    //Onde tiver espaço substitui por nada//
    $nomealterar = str_replace(" ","",$_POST['nome-alterar']);
    $id = $_POST['id'];
    if($logando->alterarnome($nomealterar, $id))
    {
        $_SESSION['nome'] = $nomealterar;
        echo"<script>alterar(".$_SESSION["id_usuarios"].");</script>";    
    }
    else
    {
        echo"<script>erro();</script>";    
    }
}

if(isset($_POST['email-alterar']))
{
    $emailalterar = $_POST['email-alterar'];
    $id = $_POST['id'];
    if($logando->alterar($emailalterar, $id))
    {
        $_SESSION['email'] = $emailalterar;
        echo"<script>alterar(".$_SESSION["id_usuarios"].");</script>";
    }
    else
    {
        echo"<script>erro();</script>";    
    }
}


if(isset($_POST['senha-alterar']) && isset($_POST['confsenha-alterar']))
{
    $senha_alterar = $_POST['senha-alterar'];
    $confsenha_alterar = $_POST['confsenha-alterar'];
    $id = $_POST['id']; 
    if( $senha_alterar == $confsenha_alterar)
    {
        if($logando->alterarsenha($senha_alterar, $id))
        {
            echo"<script>sucesso();</script>";
        }
        else
        {
            echo"<script>erro();</script>";
        }
    }
    else
    {
        echo"<script>naoconferem();</script>";
    }
}

if(isset($_POST['email_delete']) && isset($_POST['email-segurança']))
{
    $email_delete = $_POST['email_delete'];
    $email_seguranca = $_POST['email-segurança'];
    if($email_delete == $email_seguranca){
        if($logando->delete($email_delete))
        {
            echo"<script>excluir();</script>";
            session_destroy();
        }
        else
        {
            echo"<script>excluirn();</script>";
        }
    }
    else
    {
        echo"<script>incorreto();</script>";
    }
}

}
else
{
    echo"Você deve fazer login primeiro";
}

?>
