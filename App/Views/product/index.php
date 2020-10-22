<div>
    <ol>
        <li>Adm</li>
        <li>Produtos</li>
        <li><a href="http://<?php echo APP_HOST ?>/product/index">Listar</a></li>
        <li><a href="http://<?php echo APP_HOST ?>/product/new">Cadastrar</a></li>
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
                    <td>Codigo</td>
                    <td>Descrição resumida</td>
                    <td>UND</td>
                    <td>Fabricante</td>
                    <td>Ativo</td>
                    <td>Medicamento</td>
                    <td>Controlado</td>
                    <td>Descrição completa</td>
                </tr>
            </thead>
            <tbody>
                <?php

                    switch (count($viewVar)) 
                    {
                        case 2:
                            echo "Nao a item Cadastrado";
                            break;
                        
                        default:
                            foreach ($viewVar['product'] as $value) 
                            {
                                echo "<tr>";
                                echo "<td><a href=http://" . APP_HOST . "/product/edit/" . $value->getId() . ">" . $value->getId() . "</a></td>";
                                echo "<td><a href=http://" . APP_HOST . "/product/edit/" . $value->getId() . ">" . $value->getCodProd() . "</a></td>";
                                echo "<td><a href=http://" . APP_HOST . "/product/edit/" . $value->getId() . ">" . $value->getDescProd() . "</a></td>";
                                echo "<td><a href=http://" . APP_HOST . "/product/edit/" . $value->getId() . ">" . $value->getDescUnd() . "</a></td>";
                                echo "<td><a href=http://" . APP_HOST . "/product/edit/" . $value->getId() . ">" . $value->getNameFactory() . "</a></td>";
                                
                                if($value->getActiveProd())
                                {
                                    echo "<td><a href=http://" . APP_HOST . "/product/edit/" . $value->getId() . ">" . "Sim" . "</a></td>";
                                }
                                else
                                {
                                    echo "<td><a href=http://" . APP_HOST . "/product/edit/" . $value->getId() . ">" . "Não" . "</a></td>";
                                }

                                if ($value->getMedciamentProd()) 
                                {
                                    echo "<td><a href=http://" . APP_HOST . "/product/edit/" . $value->getId() . ">" . "Sim" . "</a></td>";
                                } 
                                else 
                                {
                                    echo "<td><a href=http://" . APP_HOST . "/product/edit/" . $value->getId() . ">" . "Não" . "</a></td>";
                                }

                                if ($value->getControlledProd()) 
                                {
                                    echo "<td><a href=http://" . APP_HOST . "/product/edit/" . $value->getId() . ">" . "Sim" . "</a></td>";
                                } 
                                else 
                                {
                                    echo "<td><a href=http://" . APP_HOST . "/product/edit/" . $value->getId() . ">" . "Não" . "</a></td>";
                                }     
                                echo "<td><a href=http://" . APP_HOST . "/product/edit/" . $value->getId() . ">" . $value->getDescCompleteProd() . "</a></td>";
                                echo "</tr>";
                            }
                            break;
                    }


                
                ?>
            </tbody>
        </table>
    </div>
    </div>
</section>