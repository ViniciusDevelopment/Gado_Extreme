<?php
if(isset($_SESSION['id_usuarios']))
{
?>
<script src="gado.js"></script>

<?php
    try{
        $consulta=$conect->prepare("DELETE FROM gado WHERE id_gado=:p1 ");
        $consulta->bindValue(":p1",$_GET["id"]);
        $consulta->execute();
        echo("<script>redirecionar();</script>");
    }catch(Exception $e){
        echo"Erro ao excluir";
    }
}
else
{
    echo"Você deve fazer login primeiro";
}

?>
