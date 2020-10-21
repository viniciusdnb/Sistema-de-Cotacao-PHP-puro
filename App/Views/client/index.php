<div>
    <ol>
        <li>Adm</li>
        <li>Usuarios</li>
        <li><a href="http://<?php echo APP_HOST ?>/client/index">Listar</a></li>
        <li><a href="http://<?php echo APP_HOST ?>/client/new">Cadastrar</a></li>
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
                    <td>Nome</td>
                    <td>Endereço</td>
                    <td>Email</td>
                    <td>CNPJ</td>
                    <td>Telefone</td>
                    <td>Contato</td>
                    <td>Vendedor</td>
                </tr>
            </thead>
            <tbody>
                <?php
                switch (count($viewVar)) {
                    case 2:
                        echo "Nao a item Cadastrado";
                        break;

                    default:

                        foreach ($viewVar['client'] as $value) {
                            echo "<tr>";
                            echo "<td><a href=http://" . APP_HOST . "/client/edit/" . $value->getId() . ">" . $value->getId() . "</a></td>";
                            echo "<td><a href=http://" . APP_HOST . "/client/edit/" . $value->getId() . ">" . $value->getNameClient() . "</a></td>";
                            echo "<td><a href=http://" . APP_HOST . "/client/edit/" . $value->getId() . ">" . $value->getAddresClient() . "</a></td>";
                            echo "<td><a href=http://" . APP_HOST . "/client/edit/" . $value->getId() . ">" . $value->getEmailClient() . "</a></td>";
                            echo "<td><a href=http://" . APP_HOST . "/client/edit/" . $value->getId() . ">" . $value->getCnpjClient() . "</td>";
                            echo "<td><a href=http://" . APP_HOST . "/client/edit/" . $value->getId() . ">" . $value->getPhoneClient() . "</td>";
                            echo "<td><a href=http://" . APP_HOST . "/client/edit/" . $value->getId() . ">" . $value->getContactClient() . "</td>";
                            echo "<td><a href=http://" . APP_HOST . "/agent/edit/" . $value->getIdAgent() . ">" . $value->getNameAgent() . "</td>";
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