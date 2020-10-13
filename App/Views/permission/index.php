
                <div>
                    <ol>
                        <li>Adm</li>
                        <li>Permissões</li>
                        <li><a href="#">Listar</a></li>
                        <li><a href="http://<?php echo APP_HOST; ?>/permission/new">Cadastrar</a></li>
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
      
                            <table style="border: 1px solid;">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Codigo tipo</td>
                                        <td>Descrição tipo</td>
                                        <td>Codigo permissão</td>
                                        <td>Descrição Permissao</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($viewVar['perm'] as $value) {

                                        echo "<tr>";
                                        echo "<td>" . $value->getId() . "</td>";
                                        echo "<td>" . $value->getType() . "</td>";
                                        echo "<td>" . $value->gettypeName() . "</td>";
                                        echo "<td>" . $value->getPerm() . "</td>";
                                        echo "<td>" . $value->getPermName() . "</td>";
                                        echo "</td>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        
    </section>
