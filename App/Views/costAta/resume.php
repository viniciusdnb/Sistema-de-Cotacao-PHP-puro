<div>
    <ol>
        <li>Licitação</li>
        <li>Custos de Atas</li>
        <li><a href="http://<?php echo APP_HOST ?>/costAta/index">Listar</a></li>
        <li><a href="http://<?php echo APP_HOST ?>/costAta/new">Cadastrar</a></li>
        <li><a href="http://<?php echo APP_HOST ?>/costAta/edit/<?php echo $viewVar['headerCostAta']->getId() ?>">Editar</a></li>
        <li><a href="http://<?php echo APP_HOST ?>/cotacao/submit/<?php echo $viewVar['headerCostAta']->getId() ?>">Solicitar Cotação</a></li>
    </ol>
</div>

<?php

if ($Session::getMessage() !== "") {

    echo '<div>';
    echo $Session::getMessage();
    $Session::unsetMessage();
    echo '</div>';
}

if ($Session::getErro() !== "") {

    echo '<div>';
    echo $Session::getErro();
    $Session::unsetErro();
    echo '</div>';
}



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
        <textarea disabled><?php echo $viewVar['headerCostAta']->getObject() ?></textarea>
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


    <table style="border: black 1px solid;">
        <thead>
            <tr>

                <th style="border: black 1px solid;">Numero do Item</th>
                <th style="border: black 1px solid;">Descricao Completa</th>
                <th style="border: black 1px solid;">Produto</th>
                <th style="border: black 1px solid;">Unidade</th>
                <th style="border: black 1px solid;">Fabricante</th>
                <th style="border: black 1px solid;">Quantidade</th>
                <th style="border: black 1px solid;">Valor cotado</th>
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

            if ($viewVar['itens']) {
                $tot = count($viewVar['itens']->getId());


                for ($i = 0; $i < $tot; $i++) {
                    echo '<tr>';

                    //echo '<td><a href="http://' . APP_HOST . '/costAta/deleteItem/' . $viewVar['itens']->getId()[$i] . '/' . $viewVar['headerCostAta']->getId() . '">Excluir Item</a></td>';
                    echo '<td><input type="text" value="' . $viewVar['itens']->getItem()[$i] . '" name="txt_number_item[]" disabled></td>';
                    echo '<td><input type="text" value="' . $viewVar['itens']->getDescCompProduct()[$i] . '" name="txt_desc_complete[]" disabled></td>';

                    echo '<td><select name="txt_id_product[]" disabled>';
                    foreach ($viewVar['product'] as $valueProd) {
                        echo '<option value="' . $valueProd->getId() . '"';
                        echo $valueProd->getId() == $viewVar['itens']->getIdProduct()[$i] ? 'selected="selected"' : '';
                        echo '>' . $valueProd->getDescProd() . '</option>';
                    }
                    echo '</select></td>';

                    echo '<td><select name="txt_id_und[]" disabled>';
                    foreach ($viewVar['und'] as $valueUnd) {
                        echo '<option value="' . $valueUnd->getId() . '"';
                        echo $valueUnd->getId() == $viewVar['itens']->getIdUnd()[$i] ? 'selected="selected"' : '';
                        echo '>' . $valueUnd->getUnd() . '</option>';
                    }
                    echo '</select></td>';

                    echo '<td><select name="txt_id_factory[]" disabled>';
                    foreach ($viewVar['factory'] as $valueFactory) {
                        echo '<option value="' . $valueFactory->getId() . '"';
                        echo $valueFactory->getId() == $viewVar['itens']->getIdFactory()[$i] ? 'selected="selected"' : '';
                        echo '>' . $valueFactory->getNameFactory() . '</option>';
                    }
                    echo '</select></td>';

                    echo '<td><input type="text" value="' . number_format($viewVar['itens']->getQuantity()[$i], '0', ',', '.') . '" name="txt_quantity[]" disabled></td>';
                    echo '<td><input type="text" value="' . 'R$ ' . number_format($viewVar['itens']->getVlrCotado()[$i], '2', ',', '.') . ' "disabled>';
                    echo '<td><input type="text" value="' . 'R$ ' . number_format($viewVar['itens']->getCostUnity()[$i], '2', ',', '.') . '" name="txt_cost_unity[]" disabled></td>';
                    echo '<td><input type="text" value="' . 'R$ ' . number_format($viewVar['itens']->getQuantity()[$i] * $viewVar['itens']->getCostUnity()[$i], '2', ',', '.') . '" disabled></td>';
                    echo '<td><input type="text" value="' . $viewVar['itens']->getP1()[$i] . '" name="txt_p1[]" disabled></td>';
                    echo '<td><input type="text"></td>';
                    echo '<td><input type="text" value="' . $viewVar['itens']->getP2()[$i] . '" name="txt_p2[]" disabled></td>';
                    echo '<td><input type="text"></td>';
                    echo '<td><input type="text" value="' . $viewVar['itens']->getP3()[$i] . '" name="txt_p3[]" disabled></td>';
                    echo '<td><input type="text"></td>';
                    echo '<td><input type="text" value="' . $viewVar['itens']->getMinimum()[$i] . '" name="txt_minimum[]" disabled></td>';
                    echo '<td><input type="text" disabled></td>';

                    echo '</tr>';
                    echo '<input type="hidden" value="' . $viewVar['itens']->getId()[$i] . '" name="id[]">';
                }
            } else {
                echo 'Não ha item cadastrado';
            }





            ?>
        </tbody>
    </table>


</section>