<div>
    <ol>
        <li>Licitação</li>
        <li>Custos de Atas</li>
        <li><a href="http://<?php echo APP_HOST ?>/costAta/index">Listar</a></li>
        <li><a href="http://<?php echo APP_HOST ?>/costAta/new">Cadastrar</a></li>
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
        <table style="border: 1px solid;">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Cliente</td>
                    <td>Data</td>
                    <td>Pr</td>
                    <td>Processo</td>

                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($viewVar['costAta'] as $value) {
                    echo "<tr>";
                    echo "<td><a href=http://" . APP_HOST . "/costAta/resume/" . $value->getId() . ">" . $value->getId() . "</a></td>";
                    echo "<td><a href=http://" . APP_HOST . "/costAta/resume/" . $value->getId() . ">" . $value->getNameClient() . "</a></td>";
                    echo "<td><a href=http://" . APP_HOST . "/costAta/resume/" . $value->getId() . ">" . $value->getDate() . "</a></td>";
                    echo "<td><a href=http://" . APP_HOST . "/costAta/resume/" . $value->getId() . ">" . $value->getPr() . "</a></td>";
                    echo "<td><a href=http://" . APP_HOST . "/costAta/resume/" . $value->getId() . ">" . $value->getProcess() . "</a></td>";

                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
    </div>
</section>