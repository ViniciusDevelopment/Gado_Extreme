<?php
if(isset($_SESSION['id_usuarios']))
{?>
<br>

    <h1 class="centro titulo">Tabela Nutrição Bovina</h1>
<br>
<label>
<div class="scroll">
<table>
    <tr>
        <th>Fonte de Energia</th>
        <th>Amido</th>
        <th>Proteína</th>  
        <th>Fósforo</th>  
    </tr>

    <tr>
        <td>Cevada</td>
        <td>55-60%</td>
        <td>12%</td>
        <td>0,39%</td>
    </tr>

    <tr>
        <td>Polpa Cítrica</td>
        <td>1%</td>
        <td>9%</td>
        <td>0,12%</td>
    </tr>

    <tr>
        <td>Residuo de Cervejaria</td>
        <td>10%</td>
        <td>29%</td>
        <td>0,67%</td>
    </tr>

    <tr>
        <td>Farelo de Canola</td>
        <td>2%</td>
        <td>41%</td>
        <td>1,00%</td>
    </tr>

    <tr>
        <td>Milho</td>
        <td>65-70%</td>
        <td>9%</td>
        <td>0,30%</td>
    </tr>

    <tr>
        <td>Refinasil(Promil)</td>
        <td>12%</td>
        <td>24%</td>
        <td>1,00%</td>
    </tr>

    <tr>
        <td>Silagem de milho</td>
        <td>25-30%</td>
        <td>8%</td>
        <td>0,20%</td>
    </tr>

    <tr>
        <td>Caroço de Algodão</td>
        <td>1%</td>
        <td>24%</td>
        <td>0,60%</td>
    </tr>

    <tr>
        <td>Grãos destilados</td>
        <td>5%</td>
        <td>30%</td>
        <td>0,83%</td>
    </tr>

    <tr>
        <td>Sorgo Grãos</td>
        <td>65-80%</td>
        <td>12%</td>
        <td>0,35%</td>
    </tr>

    <tr>
        <td>Casca de Soja</td>
        <td>1%</td>
        <td>14%</td>
        <td>0,17%</td>
    </tr>

    <tr>
        <td>Trigo Grão</td>
        <td>5%</td>
        <td>30%</td>
        <td>0,83%</td>
    </tr>

    <tr>
        <td>Farelo de Trigo</td>
        <td>15-20%</td>
        <td>19%</td>
        <td>1,02%</td>
    </tr>

    
    
</table>
</div>
</label>


<br>
<?php
}
else
{
    echo"Você deve fazer login primeiro";
}
?>