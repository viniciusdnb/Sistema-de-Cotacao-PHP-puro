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
                $a = 0;
                while ($a < 3) {
                    echo '<tr class="item">';
                    echo '<td><input type="text" name="txt_number_item[]"></td>';
                    echo '<td><textarea name="txt_desc_complete[]"></textarea></td>';

                    echo '<td><select name="txt_id_product[]"><option>Selecione</option>';
                    foreach ($viewVar['product'] as $value) {
                        echo '<option value="' . $value->getId() . '">' . $value->getDescProd() . '</option>';
                    }
                    echo '</td></select>';

                    echo '<td><select name="txt_id_und[]"><option>Selecione</option>';
                    foreach ($viewVar['und'] as $value) {
                        echo '<option value="' . $value->getId() . '">' . $value->getUnd() . '</option>';
                    }
                    echo '</td></select>';

                    echo '<td><select name="txt_id_factory[]"><option>Selecione</option>';
                    foreach ($viewVar['factory'] as $value) {
                        echo '<option value="' . $value->getId() . '">' . $value->getNameFactory() . '</option>';
                    }
                    echo '</td></select>';
                    echo '<td><input type="text" name="txt_quantity[]" class="quantity"></td>';
                    echo '<td><input type="text" name="txt_cost_unity[]" class="vlr_unity"></td>';
                    echo '<td><input type="text" name="txt_cost_total[]" class="total" value="0"></td>';
                    echo '<td><input type="text" name="txt_p1[]"></td>';
                    echo '<td><input type="text" name="txt_p1_total[]"></td>';
                    echo '<td><input type="text" name="txt_p2[]"></td>';
                    echo '<td><input type="text" name="txt_p2_total[]"></td>';
                    echo '<td><input type="text" name="txt_p3[]"></td>';
                    echo '<td><input type="text" name="txt_p3_total[]"></td>';
                    echo '<td><input type="text" name="txt_minimum[]"></td>';
                    echo '<td><input type="text" name="txt_minimum_total[]"></td>';
                    echo '</tr>';
                    $a++;
                }


                ?>
            </tbody>
        </table>

        <input type="hidden" value="<?php echo $viewVar['headerCostAta']->getId() ?>" name="cost_ata_id">
        <input type="hidden" value="<?php echo $viewVar['headerCostAta']->getPr() ?>" name="cost_ata_pr">
        <input type="hidden" value="<?php echo $viewVar['headerCostAta']->getIdClient() ?>" name="cost_ata_id_client">

        <input type="submit" value="enviar">
    </form>
</section>