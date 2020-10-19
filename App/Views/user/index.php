<div>
    <ol>
        <li>Adm</li>
        <li>Usuarios</li>
        <li><a href="#">Listar</a></li>
        <li><a href="http://<?php echo APP_HOST ?>/user/new">Cadastrar</a></li>
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
                    <td>Ativo</td>
                    <td>Tipo</td>
                    <td>Permissão</td>
                    <td>Email</td>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($viewVar['findAll'] as $value) {
                    echo "<tr>";
                    echo "<td><a href=http://" . APP_HOST . "/user/edit/" . $value->getId() . ">" . $value->getId() . "</a></td>";
                    echo "<td><a href=http://" . APP_HOST . "/user/edit/" . $value->getId() . ">" . $value->getName() . "</a></td>";
                    echo "<td><a href=http://" . APP_HOST . "/user/edit/" . $value->getId() . ">" . $value->getActive() . "</a></td>";
                    echo "<td><a href=http://" . APP_HOST . "/user/edit/" . $value->getId() . ">" . $value->getTypeNamePerm() . "</a></td>";
                    echo "<td><a href=http://" . APP_HOST . "/user/edit/" . $value->getId() . ">" . $value->getPermName() . "</td>";
                    echo "<td><a href=http://" . APP_HOST . "/user/edit/" . $value->getId() . ">" . $value->getEmail() . "</td>";
                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
    </div>
</section>