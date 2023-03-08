<?php
if(isset($_SESSION['id_usuarios']))
{?>
<br>
<h1 class="centro titulo">Meus Bovinos</h1>
<br>
<script src="gado.js"></script>
<div class="scroll">
<table>
    <tr>
        <th>Aptidão</th>
        <th>Raça</th>
        <th>Idade</th>
        <th>Local</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Peso</th>
        <th>Telefone</th>
        <th>Ações</th>
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
        $consulta=$conect->prepare("SELECT *FROM gado INNER JOIN usuarios ON gado.id_usuarios=usuarios.id_usuarios WHERE usuarios.id_usuarios=:id AND tipo LIKE :p1");
        $consulta->bindValue(":p1","%$filter%");
        $consulta->bindValue(":id",$_SESSION["id_usuarios"]);
        $consulta->execute();
        $result=$consulta->fetchAll();
        if($result){
            $contador = 0;
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
                    <td>
                        <a id='vermelho' href='#' onclick='excluir_gado(".$parte["id_gado"].")'><svg class='acao espaco' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='trash-alt' class='svg-inline--fa fa-trash-alt fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><path fill='currentColor' d='M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z'></path></svg></a>
                        <a href='index.php?arquivo=alterar&id=".$parte["id_gado"]."'><svg class='acao' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='pencil-alt' class='svg-inline--fa fa-pencil-alt fa-w-16' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path fill='currentColor' d='M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z'></path></svg></a>
                    </td>    
                </tr>";
                $contador += $parte["quantidade"];
            }
        }else{
            echo "<tr><td colspan='9' id='erro'>Você não cadastrou nenhum gado ainda!</td></tr>";
            $contador = 0;
        }
    ?>
</table></div>
<div class="total scroll">Quantidade Total de Bovinos: <?php echo $contador;?></div>

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