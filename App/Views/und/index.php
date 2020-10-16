<div>
    <ol>
        <li>Adm</li>
        <li>Unidade de Medida</li>
        <li><a href="#">Listar</a></li>
        <li><a href="http://<?php echo APP_HOST ?>/und/new">Cadastrar</a></li>
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
                    <td>Descrição</td>
                    <td>UND</td>                    
                </tr>
            </thead>
            <tbody>
                <?php
                    switch (count($viewVar)) {
                        case 2:
                            echo "Nao a item Cadastrado";
                            break;
                        
                        default:
                        foreach ($viewVar['und'] as $value) {
                            echo '<tr>';
                            echo '<td><a href="http://' . APP_HOST . '/und/edit/' . $value->getId() . '">' . $value->getId() . '</a></td>';
                            echo '<td><a href="http://' . APP_HOST . '/und/edit/' . $value->getId() . '">' . $value->getDescription() . '</a></td>';
                            echo '<td><a href="http://' . APP_HOST . '/und/edit/' . $value->getId() . '">' . $value->getUnd() . '</a></td>';
                            echo '</tr>';
                        } 
                            break;
                    }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</section>