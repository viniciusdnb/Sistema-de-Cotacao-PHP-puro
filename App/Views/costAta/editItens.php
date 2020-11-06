<?php
use App\Libs\FunctionPublic;
//var_dump($viewVar);

                                    

?>

<section>
    <div>
        <h3>Dados da ata</h3>
        <label>Codigo</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getId() ?>" disabled>
        <label>Cliente</label>
        <input disabled type="text" value="<?php echo $viewVar['headerCostAta']->getNameClient() ?>">
        <label>Data</label>
        <input type="date" value="<?php echo $viewVar['headerCostAta']->getDate() ?>" disabled>
        <label>Pr</label>
        <input type=" text" value="<?php echo $viewVar['headerCostAta']->getPr() ?>" disabled>
        <label>Processo</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getProcess() ?>" disabled>
        <label>objeto</label>
        <textarea disabled><?php echo $viewVar['headerCostAta']->getObject() ?>"</textarea>
    </div>
    <div>
        <h4>Relações de documentos</h4>
        <label>No dia</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getInDay() ? "Sim" : "Não"; ?>" disabled>
        <label>Venceu</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getWinner() ? "Sim" : "Não" ?>" disabled>
        <label>Dias para entregar</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getDaysDeliver() ?>" disabled>
        <label>Amostras</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getExample() ? "Sim" : "Não" ?>" disabled>
        <label>Bulas</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getBula() ? "Sim" : "Não" ?>" disabled>
    </div>
    <div>
        <label>Catalogos</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getCatalog() ? "Sim" : "Não" ?>" disabled>
        <label>cbpf</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getCbpf() ? "Sim" : "Não" ?>" disabled>
        <label>credenciameto</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getAccreditation() ? "Sim" : "Não" ?>" disabled>
        <label>Registro anvisa</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getRegisterAnvisa() ? "Sim" : "Não" ?>" disabled>
        <label>registro dou</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getRegisterDou() ? "Sim" : "Não" ?>" disabled>
    </div>

</section>

<section>
    <h4>Produtos</h4>
    <form method="POST" action="http://<?php echo APP_HOST; ?>/costAta/insertDetail">

        <table style="border: black 1px solid;">
            <thead>
                <tr>
                    <th style="border: black 1px solid;">Numero do Item</th>
                    <th style="border: black 1px solid;">Descricao Completa</th>
                    <th style="border: black 1px solid;">Produto</th>
                    <th style="border: black 1px solid;">Unidade</th>
                    <th style="border: black 1px solid;">Fabricante</th>
                    <th style="border: black 1px solid;">Quantidade</th>
                    <th style="border: black 1px solid;">Valor Unitario</th>
                    <th style="border: black 1px solid;">Valor Total</th>
                    <th style="border: black 1px solid;">P1</th>
                    <th style="border: black 1px solid;">P1 Total</th>
                    <th style="border: black 1px solid;">P2</th>
                    <th style="border: black 1px solid;">P2 Total</th>
                    <th style="border: black 1px solid;">P3</th>
                    <th style="border: black 1px solid;">P3 Total</th>
                    <th style="border: black 1px solid;">Minimo</th>
                    <th style="border: black 1px solid;">Minimo Total</th>


                </tr>
            </thead>
            <tbody>
                <?php
                    /*$tot = count($viewVar['itens']->getId());

                    $nameObject = 
                    [
                        0 => 'product',
                        1 => 'itens'
                    ];
                    $action = 
                    [
                        0 => 'getId',
                        1 => 'getIdProduct'
                    ];


                    $cbxProduct = new FunctionPublic($viewVar, $nameObject, $action);


                   for ($i=0; $i < $tot; $i++) { 
                        echo '<tr>';
                        echo '<td><input type="text" value="' . $viewVar['itens']->getItem()[$i] . '" name="txt_id"></td>';
                        echo '<td><input type="text" value="' . $viewVar['itens']->getDescCompProduct()[$i] . '" name="txt_id"></td>';
                        echo '<td><select>';
                        foreach ($viewVar['product'] as $value) 
                        {
                            echo '<option value="'.$value->getId().'">'; 
                            echo $cbxProduct->cbxSelect() == $viewVar['itens']->getIdProduct()[$i] ? 'selected="selected"' : '';
                            echo $value->getDescProd().'</option>';
                            
                        }
                        echo '</select></td >';
                        echo '</tr>';
                   }*/
                
                


                ?>
            </tbody>
        </table>

        <input type="hidden" value="<?php echo $viewVar['headerCostAta']->getId() ?>" name="cost_ata_id">
        <input type="hidden" value="<?php echo $viewVar['headerCostAta']->getPr() ?>" name="cost_ata_pr">
        <input type="hidden" value="<?php echo $viewVar['headerCostAta']->getIdClient() ?>" name="cost_ata_id_client">

        <input type="submit" value="enviar">
    </form>
</section>