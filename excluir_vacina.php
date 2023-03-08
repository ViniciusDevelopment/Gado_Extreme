<?php
if(isset($_SESSION['id_usuarios']))
{
?>
<script src="vacina.js"></script>

<?php
    try{
        $consulta=$conect->prepare("DELETE FROM vacina WHERE id_vacina=:p1 ");
        $consulta->bindValue(":p1",$_GET["id"]);
        $consulta->execute();
        echo("<script>redirecionar_vacina();</script>");
    }catch(Exception $e){
        echo"Erro ao excluir";
    }
}
else
{
    echo"Você deve fazer login primeiro";
}
?>