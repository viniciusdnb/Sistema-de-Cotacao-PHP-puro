<div>
    <ol>
        <li>Adm</li>
        <li>Cadastro de Vendedores</li>
        <li><a href="#">Listar</a></li>
        <li><a href="http://<?php echo APP_HOST ?>/agent/new">Cadastrar</a></li>
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
                    <td>Email</td>
                    <td>Telefone</td>
                </tr>
            </thead>
            <tbody>
                <?php
                switch (count($viewVar)) {
                    case 2:
                        echo "Nao a item Cadastrado";
                        break;

                    default:
                        foreach ($viewVar['agent'] as $value) {
                            echo '<tr>';
                            echo '<td><a href="http://' . APP_HOST . '/agent/edit/' . $value->getId() . '">' . $value->getId() . '</a></td>';
                            echo '<td><a href="http://' . APP_HOST . '/agent/edit/' . $value->getId() . '">' . $value->getNameAgent() . '</a></td>';
                            echo '<td><a href="http://' . APP_HOST . '/agent/edit/' . $value->getId() . '">' . $value->getEmailAgent() . '</a></td>';
                            echo '<td><a href="http://' . APP_HOST . '/agent/edit/' . $value->getId() . '">' . $value->getPhoneAgent() . '</a></td>';
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