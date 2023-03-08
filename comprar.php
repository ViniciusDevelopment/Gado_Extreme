<?php
if(isset($_SESSION['id_usuarios']))
{
?>
<br>
<h1 class="centro titulo" >Veja todos os Anuncios!</h1>

<p class="centro2 subtitulo">Neste ambiente você poderá visualizar todos os bovinos anunciados no site, se algum deles lhe interessar, basta copiar o número de telefone é ligar para o vendedor.</p>
<div class="scroll">
<table class="tabela">
    <tr>
        <th>Aptidão</th>
        <th>Raça</th>
        <th>Idade</th>
        <th>Local</th>
        <th>Preços </th>
        <th>Quantidade</th>
        <th>Peso</th>
        <th>Telefone</th>
        <th>Vendedor</th>
    </tr>

<form action="" method="post">
    <label class="filtro-label">
        <input class="input-filter" value="<?= $_POST["name"] ?? ""?>"type="text" name="name" placeholder="FILTRO">
        <button class="filter" type="submit"><svg class="detalhe" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg></button>
    </label>
</form>
<br><br><br>

    <?php
        $filter = $_POST["name"] ?? "";
        $consulta=$conect->prepare("SELECT *FROM gado INNER JOIN usuarios ON gado.id_usuarios=usuarios.id_usuarios WHERE tipo LIKE :p1 OR cidade LIKE :p1 OR estado LIKE :p1 OR raça LIKE :p1 OR idade LIKE :p1 OR preço LIKE :p1 OR quantidade LIKE :p1 OR peso LIKE :p1 OR telefone LIKE :p1 OR nome LIKE :p1");
        $consulta->bindValue(":p1","%$filter%");
        $consulta->execute();
        $result=$consulta->fetchAll();
        if($result){
            foreach($result as $parte){
                echo "<tr>
                    <td>".$parte["tipo"]."</td> 
                    <td>".$parte["raça"]."</td>  
                    <td>".$parte["idade"]."</td>  
                    <td>".$parte["cidade"]."/".$parte["estado"]."</td>  
                    <td> R$ ".$parte["preço"].",00</td>  
                    <td>".$parte["quantidade"]."</td>  
                    <td>".$parte["peso"]."@</td>  
                    <td>".$parte["telefone"]."</td>  
                    <td>".$parte["nome"]."</td>    
                </tr>";
            }
        }else{
            echo "<tr><td colspan='9' id='erro'>Nenhum gado foi encontrado!</td></tr>";
        }
    ?>
</table>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
}
else
{
    echo"Você deve fazer login primeiro";
}
?>

