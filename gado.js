function excluir_gado(id)
{
    if(confirm("Deseja realmente excluir este gado?"))
    {
        location.href = "index.php?arquivo=excluir&id="+id;
    }
}

function redirecionar()
{
    location.href="index.php?arquivo=meusbovinos";
}

function redirecionar2()
{
    alert("Gado alterado com sucesso");
    location.href="index.php?arquivo=meusbovinos";
}

function cad_gado()
{
    alert("Gado Cadastrado com sucesso!");
}


function erro_cad_gado()
{
    alert("Erro ao cadastrar!");
}

function erro()
{
    alert("Por favor modifique algum dado!");
}