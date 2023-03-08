<?php
if(isset($_SESSION['id_usuarios']))
{
?>
<script src="leilao.js"></script>

<?php
    try{
        $consulta=$conect->prepare("DELETE FROM leilao WHERE id_leilao=:p1 ");
        $consulta->bindValue(":p1",$_GET["id"]);
        $consulta->execute();
        echo("<script>redirecionar_leilao();</script>");
    }catch(Exception $e){
        echo"Erro ao excluir";
    }
}
else
{
    echo"Você deve fazer login primeiro";
}
?>