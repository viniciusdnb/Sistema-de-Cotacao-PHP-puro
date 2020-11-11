<div>
    <ol>
        <li>Licitação</li>
        <li>Itens</li>
    </ol>
</div>




<section>

    <table style="border: black 1px solid;">
        <thead>
            <tr>
                <th style="border: black 1px solid;">Codigo Ata</th>
                <th style="border: black 1px solid;">Pr Ata</th>
                <th style="border: black 1px solid;">Cliente</th>
                <th style="border: black 1px solid;">Descricao Completa</th>
                <th style="border: black 1px solid;">Produto</th>
                <th style="border: black 1px solid;">Und</th>
                <th style="border: black 1px solid;">fabricante</th>
                <th style="border: black 1px solid;">Data do Pregrao</th>
            </tr>
        </thead>
        <tbody>
            <?php

                foreach ($viewVar['itens'] as $valuei)
                {
                    echo '<tr>';
                    echo '<td><a href="http://' . APP_HOST . '/costAta/resume/'  .$valuei->getidAtaCost() . '">' . $valuei->getidAtaCost() . '</a></td>';
                    echo '<td><a href="http://' . APP_HOST . '/costAta/resume/' . $valuei->getidAtaCost() . '">' . $valuei->getPrAtaCost() . '</a></td>';

                    foreach ($viewVar['client'] as $valuec) 
                    {
                        echo $valuec->getId() == $valuei->getIdClientAta() ? '<td><a href="http://' . APP_HOST . '/costAta/resume/' . $valuei->getidAtaCost() . '">' . $valuec->getNameClient() . '</a></td>' : '';
                    }

                    echo '<td><a href="http://' . APP_HOST . '/costAta/resume/' . $valuei->getidAtaCost() . '">' . $valuei->getDescCompProduct() . '</a></td>';

                    foreach ($viewVar['product'] as $valuep) 
                    {
                        echo $valuep->getId() == $valuei->getIdProduct() ? '<td><a href="http://' . APP_HOST . '/costAta/resume/' . $valuei->getidAtaCost () . '">' . $valuep->getDescProd() . '</a></td>' : '';
                    }
                    
                    foreach ($viewVar['und'] as $valueu) {
                        echo $valueu->getId() == $valuei->getIdUnd() ? '<td><a href="http://' . APP_HOST . '/costAta/resume/' . $valuei->getidAtaCost() . '">' . $valueu->getUnd() . '</a></td>' : '';
                    }
                    
                    foreach ($viewVar['factory'] as $valuef) {
                        echo $valuef->getId() == $valuei->getIdFactory() ? '<td><a href="http://' . APP_HOST . '/costAta/resume/' . $valuei->getidAtaCost() . '">' . $valuef->getNameFactory() . '</a></td>' : '';
                    }

                    echo '<tr>';
                }

            ?>
        </tbody>

    </table>

</section>