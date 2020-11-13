<div>
    <ol>
        <li>Adm</li>
        <li>Usuarios</li>
        <li><a href="http://<?php echo APP_HOST ?>/user/index">Listar</a></li>
        <li><a href="#">Cadastrar</a></li>
    </ol>
</div>


<section>



    <div>
        <h3>Cadastro de Usuario</h3>
    </div>
    <form method="POST" name="form" action="http://<?php echo APP_HOST; ?>/user/insert">


        <div>
            <label>Nome:</label>
            <input type="text" name="txt_name">
        </div>
        <div>
            <label>Senha:</label>
            <input type="password" name="txt_pass">
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="txt_email">
        </div>
        <div>

            <div>
                <label>Ativo:</label>
                <select name="txt_active">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div>
                <label>Permissão:</label>
                <select name="txt_perm">
                    <option>Selecione..</option>
                    <?php

                    foreach ($viewVar['findAll'] as $value) {
                        echo '<option value=' . $value->getId() . '>' . $value->getType() . '. ' . $value->getTypeName() . ' - ' . $value->getPerm() . '. ' . $value->getPermName() . '</option>';
                    }

                    ?>
                </select>
            </div>
            <di>
                <label>Opcional Fabricante</label>
                <select name="txt_id_factory">
                    <option>Selecione..</option>
                    <?php

                    foreach ($viewVar['factory'] as $factory) {
                        echo '<option value="' . $factory->getId() . '>' . $factory->getNameFactory() . '</option>';
                    }

                    ?>
                </select>
            </di>




        </div>
        <div>
            <button type="submit">Salvar</button>
            <a href="http://<?php echo APP_HOST; ?>/user/index">Cancelar</a>

        </div>
    </form>




</section>