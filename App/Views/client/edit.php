<div>
    <ol>
        <li>Adm</li>
        <li>Usuarios</li>
        <li><a href="http://<?php echo APP_HOST ?>/client/index">Listar</a></li>
        <li><a href="#">Cadastrar</a></li>
    </ol>
</div>



<div>
    <h3>Cadastro de Clientes</h3>
</div>
<form method="POST" name="form" action="http://<?php echo APP_HOST; ?>/client/update">


    <div>
        <label>Nome:</label>
        <input type="text" name="txt_name" value="<?php echo $viewVar['client']->getNameClient(); ?>">
    </div>
    <div>
        <label>Endereço:</label>
        <input type="text" name="txt_addres" value="<?php echo $viewVar['client']->getAddresClient(); ?>">
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="txt_email" value="<?php echo $viewVar['client']->getEmailClient(); ?>">
    </div>
    <div>
        <label>Cnpj:</label>
        <input type="text" name="txt_cnpj" value="<?php echo $viewVar['client']->getCnpjClient(); ?>">
    </div>
    <div>
        <label>Telefone:</label>
        <input type="text" name="txt_phone" value="<?php echo $viewVar['client']->getPhoneClient(); ?>">
    </div>
    <div>
        <label>Contato:</label>
        <input type="text" name="txt_contact" value="<?php echo $viewVar['client']->getContactClient(); ?>">
    </div>


    <div>
        <label>Vendedor:</label>
        <select name="txt_agent">
            <?php

            use App\Libs\FunctionPublic;

            $nameObj =
                [
                    0 => 'agent',
                    1 => 'client'
                ];

            $action =
                [
                    0 => 'getId',
                    1 => 'getIdAgent'
                ];

            $cbx = new FunctionPublic($viewVar, $nameObj, $action);

            foreach ($viewVar['agent'] as $value) {
                echo '<option value=' . '"' . $value->getId() . '"';
                if ($value->getId() == $cbx->cbxSelect()) {
                    echo ' selected="selected"';
                }
                echo '>' . $value->getId() . '. ' . $value->getNameAgent() . '</option>';
            }

            ?>
        </select>
    </div>

    <input type="hidden" name="id" value="<?php echo $viewVar['client']->getId(); ?>" <div>
    <button type="submit">Salvar</button>
    <a href="http://<?php echo APP_HOST; ?>/client/index">Cancelar</a>
    <a href="http://<?php echo APP_HOST; ?>/client/delete/<?php echo $viewVar['client']->getId();?>">Excluir</a>

    </div>
</form>




</section>