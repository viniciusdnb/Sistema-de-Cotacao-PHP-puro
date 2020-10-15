 <div>
     <ol>
         <li>Adm</li>
         <li>Permissões</li>
         <li><a href="http://<?php echo APP_HOST; ?>/factory/index">Listar</a></li>
         <li><a href="http://<?php echo APP_HOST; ?>/factory/new">Cadastrar</a></li>
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
                 <th>ID:</th>
                 <th>Nome:</th>
                 <th>Endereço:</th>
                 <th>Email:</th>
                 <th>CNPJ:</th>
                 <th>Telefone:</th>
                 <th>Contato</th>
             </tr>
         </thead>
         <tbody>
             <?php
                foreach ($viewVar['factory'] as $value) 
                {
                    echo '<tr>';
                    echo '<td><a href="http://'.APP_HOST.'/factory/edit/'. $value->getId().'">'.$value->getId().'</a></td>';
                    
                    echo '<td><a href="http://'. APP_HOST . '/factory/edit/' . $value->getId() . '">' . $value->getNameFactory() . '</a></td>';
                    echo '<td><a href="http://' . APP_HOST . '/factory/edit/' . $value->getId() . '">' . $value->getAddresFactory() . '</a></td>';
                    echo '<td><a href="http://' . APP_HOST . '/factory/edit/' . $value->getId() . '">' . $value->getEmailFactory() . '</a></td>';
                    echo '<td><a href="http://' . APP_HOST . '/factory/edit/' . $value->getId() . '">' . $value->getCnpjFactory() . '</a></td>';
                    echo '<td><a href="http://' . APP_HOST . '/factory/edit/' . $value->getId() . '">' . $value->getPhoneFactory() . '</a></td>';
                    echo '<td><a href="http://' . APP_HOST . '/factory/edit/' . $value->getId() . '">' . $value->getContactFactory() . '</a></td>';
                    echo '</tr>';
                }

             ?>
         </tbody>
     </table>
 </section>