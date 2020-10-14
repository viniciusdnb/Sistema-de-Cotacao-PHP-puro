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
        <h3>Edição de Usuario</h3>
    </div>
    <form method="POST" name="form" action="http://<?php echo APP_HOST; ?>/user/update">


        <div>
            <label>Nome:</label>
            <input type="text" name="txt_name" value="<?php echo $viewVar['findIdUser']->getName(); ?>">
        </div>

        <div>

            <div>
                <label>Ativo:</label>
                <select name="txt_active">
                    <option value="0" <?php if ($viewVar['findIdUser']->getActive() == 0) {
                                            echo 'selected="selected"';
                                        } ?>>Não</option>
                    <option value="1" <?php if ($viewVar['findIdUser']->getActive() == 1) {
                                            echo 'selected="selected"';
                                        } ?>>Sim</option>
                </select>
            </div>
            <div>
                <label>Permissão:</label>




                <select name="txt_perm">

                    <?php

                    use App\Libs\FunctionPublic;


                    foreach ($viewVar['findAllPerm'] as $value) {
                        echo '<option value="' . $value->getId() . '"';

                        if ($value->getId() == FunctionPublic::idPerm($viewVar)) {
                            echo ' selected="selected"';
                        }

                        echo '>' . $value->getType() . '. ' . $value->getTypeName() . ' - ' . $value->getPerm() . '. ' . $value->getPermName() . '</option>';
                    }

                    ?>

                </select>
            </div>

            <input type="hidden" name="id" value="<?php echo $viewVar['findIdUser']->getId(); ?>" </div> <div>
            <button type="submit">Atualizar</button>
            <a href="http://<?php echo APP_HOST; ?>/user/index">Cancelar</a>
            <a href="http://<?php echo APP_HOST; ?>/user/delete/<?php echo $viewVar['findIdUser']->getId(); ?>">Excluir</a>
        </div>
    </form>




</section>