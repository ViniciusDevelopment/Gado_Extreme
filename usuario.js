function alterar (id)
{
    alert("Usúario alterado com sucesso!");
    location.href="index.php?arquivo=conta&id="+id;
}

function erro()
{
    alert("Por Favor modifique algum dado!");
}

function sucesso ()
{
    alert("Usúario alterado com sucesso!");
}

function naoconferem()
{
    alert("Senha é confirmar senha não conferem!");
}

function excluir ()
{
    alert("Usúario excluido com sucesso!");
    location.href="login/login.php";
}

function excluirn()
{
    alert("Você não pode excluir um usúario que possui algo cadastrado");
}

function incorreto()
{
    alert("E-mail incorreto!");
}