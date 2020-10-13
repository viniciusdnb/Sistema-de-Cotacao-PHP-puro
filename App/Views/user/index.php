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
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($viewVar['findAll'] as $value) {
                    echo "<tr>";
                    echo "<td>" . $value->getId() . "</td>";
                    echo "<td>" . $value->getName() . "</td>";
                    echo "<td>" . $value->getActive() . "</td>";
                    echo "<td>" . $value->getTypeNamePerm() . "</td>";
                    echo "<td>" . $value->getPermName() . "</td>";
                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
    </div>
</section>