function excluirlleilao(id)
{
    if(confirm("Deseja realmente excluir este leilão?"))
    {
        location.href = "index.php?arquivo=excluir_leilao&id="+id;
    }
}

function redirecionar_leilao()
{
    location.href ="index.php?arquivo=leilao";
}

function cad_leilao()
{
    alert("Leilão Agendado com sucesso!");
}

function erro_leilao()
{
    alert("Por favor modifique algum dado!");
}

function erro_cad()
{
    alert("Erro ao cadastrar!");
}

