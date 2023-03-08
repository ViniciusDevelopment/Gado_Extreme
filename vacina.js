function cadvacina()
{
    alert("Vacina cadastrada com sucesso");
}

function excluirlink3(id)
{
    if(confirm("Deseja realmente excluir esta vacina?"))
    {
        location.href = "index.php?arquivo=excluir_vacina&id="+id;
    }
}

function redirecionar_vacina()
{
    location.href ="index.php?arquivo=vacina";
}

function alterar_vacina()
{
    alert("Vacina alterada com sucesso");
    location.href ="index.php?arquivo=vacina";
}

function erro_vacina()
{
    alert("Por favor modifique algum dado");
}

function erro_cad()
{
    alert("Erro ao cadastrar!");
}