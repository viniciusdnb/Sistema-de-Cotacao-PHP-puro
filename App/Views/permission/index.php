
                <div>
                    <ol>
                        <li>Adm</li>
                        <li>Permissões</li>
                        <li><a href="http://<?php echo APP_HOST; ?>/permission/index">Listar</a></li>
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

                    foreach ($viewVar['perm'] as $value) 
                    {
                     echo "<tr>";
                      echo '<td><a href="http://'.APP_HOST.'/permission/edit/'.$value->getId().'">'. $value->getId().'</a></td>';
                      echo '<td><a href="http://'.APP_HOST.'/permission/edit/'.$value->getId().'">'. $value->getType().'</a></td>';
                      echo '<td><a href="http://'.APP_HOST.'/permission/edit/'.$value->getId().'">'. $value->gettypeName().'</a></td>';
                      echo '<td><a href="http://'.APP_HOST.'/permission/edit/'.$value->getId().'">'. $value->getPerm().'</a></td>';
                      echo '<td><a href="http://'.APP_HOST.'/permission/edit/'.$value->getId().'">'. $value->getPermName().'</a></td>';
                     echo "</td>";
                    }

                ?>
            </tbody>
         </table>
                        
    </section>
