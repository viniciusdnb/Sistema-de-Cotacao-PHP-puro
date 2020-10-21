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
<form method="POST" name="form" action="http://<?php echo APP_HOST; ?>/client/insert">


    <div>
        <label>Nome:</label>
        <input type="text" name="txt_name">
    </div>
    <div>
        <label>Endereço:</label>
        <input type="text" name="txt_addres">
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="txt_email">
    </div>
    <div>
        <label>Cnpj:</label>
        <input type="text" name="txt_cnpj">
    </div>
    <div>
        <label>Telefone:</label>
        <input type="text" name="txt_phone">
    </div>
    <div>
        <label>Contato:</label>
        <input type="text" name="txt_contact">
    </div>


    <div>
        <label>Vendedor:</label>
        <select name="txt_agent">
            <?php

            foreach ($viewVar['agent'] as $value) {
                echo '<option value=' . $value->getId() . '>' . $value->getId() . '. ' . $value->getNameAgent() . '</option>';
            }

            ?>
        </select>
    </div>




    <div>
        <button type="submit">Salvar</button>
        <a href="http://<?php echo APP_HOST; ?>/client/index">Cancelar</a>

    </div>
</form>




</section>