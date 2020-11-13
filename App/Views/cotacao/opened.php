
<form method="POST" action="http://<?php echo APP_HOST; ?>/cotacao/insert">
<table>
    <thead>
        <tr>
            <th>Prefeitura</th>
            <th>Produto</th>
            <th>UND</th>
            <th>Quantidade</th>
            <th>Valor</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php


        if ($viewVar['itens']) {
            $tot = count($viewVar['itens']->getId());

            for ($i = 0; $i < $tot; $i++) {
                echo '<tr>';

                echo '<td>';
                echo '<input type="hidden" name="id[]" value="'.$viewVar['itens']->getid()[$i].'">';
                foreach ($viewVar['client'] as $valueClient) {
                    echo $valueClient->getId() == $viewVar['itens']->getIdClientAta()[$i] ? $valueClient->getNameClient() : "";
                }
                echo '</td>';

                echo '<td>' . $viewVar['itens']->getDescCompProduct()[$i] . '</td>';

                echo '<td>';
                foreach ($viewVar['und'] as $valueUnd) {
                    echo $valueUnd->getId() == $viewVar['itens']->getIdUnd()[$i] ? $valueUnd->getUnd() : "";
                }
                echo '</td>';

                echo '<td>' . number_format($viewVar['itens']->getQuantity()[$i], '0', ',', '.') . '</td>';
                echo '<td><input type="text" name="txt_vlr_cotado[]"></td>';
                echo '<td><input type="text"></td>';
                echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>

<input type="submit" value="Salvar">
</form>