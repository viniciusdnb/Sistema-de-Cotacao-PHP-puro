<div>
    <ol>
        <li>Adm</li>
        <li>Produtos</li>
        <li><a href="http://<?php echo APP_HOST ?>/product/index">Listar</a></li>
        <li><a href="http://<?php echo APP_HOST ?>/product/new">Cadastrar</a></li>
    </ol>
</div>
<?php

use App\Libs\FunctionPublic;
?>
<section>
    <div>
        <h3>Cadastro de Produto</h3>
    </div>

    <form method="POST" action="http://<?php echo APP_HOST; ?>/product/update">
        <div>
            <label>Codigo:</label>
            <input type="text" name="txt_code" value="<?php echo $viewVar['product']->getCodProd(); ?>">
            <label>Descrição:</label>
            <input type="text" name="txt_desc_res" value="<?php echo $viewVar['product']->getDescProd(); ?>">
            <label>UND:</label>


            <select name="txt_und">
                <?php
                $nameObjUnd =
                    [
                        0 => 'und',
                        1 => 'product'
                    ];

                $actionUnd =
                    [
                        0 => 'getId',
                        1 => 'getIdUnd'
                    ];

                $und = new FunctionPublic($viewVar, $nameObjUnd, $actionUnd);

                foreach ($viewVar['und'] as $value) {
                    echo '<option value="' . $value->getId() . '"';

                    if ($value->getId() == $und->cbxSelect()) {
                        echo ' selected="selected"';
                    }

                    echo '>' . $value->getUnd() . '</option>';
                }
                ?>

            </select>

            <label>Fabricante:</label>
            <select name="txt_factory">

                <?php

                $nameObjFactory =
                    [
                        0 => 'factory',
                        1 => 'product',
                    ];

                $actionFactory =
                    [
                        0 => 'getId',
                        1 => 'getIdFactory'
                    ];

                $factory = new FunctionPublic($viewVar, $nameObjFactory, $actionFactory);

                foreach ($viewVar['factory'] as $value) {
                    echo '<option value="' . $value->getId() . '"';

                    if ($value->getId() == $factory->cbxSelect()) {
                        echo ' selected="selected"';
                    }

                    echo '>' . $value->getNameFactory() . '</option>';
                }
                ?>

            </select>

            <label>Descrição completa:</label>
            <textarea name="txt_desc_com"><?php echo $viewVar['product']->getDescCompleteProd() ?></textarea>
        </div>
        <div>
            <label>Ativo:</label>
            <select name="txt_active">
                <option value="1" <?php if ($viewVar['product']->getActiveProd() == 1) {
                                        echo ' selected="selected"';
                                    } ?>>Sim</option>
                <option value="0" <?php if ($viewVar['product']->getActiveProd() == 0) {
                                        echo ' selected="selected"';
                                    } ?>>Não</option>
            </select>
            <label>Medicamento:</label>
            <select name="txt_medicament">
                <option value="0" <?php if ($viewVar['product']->getMedciamentProd() == 0) {
                                        echo ' selected="selected"';
                                    } ?>>Não</option>
                <option value="1" <?php if ($viewVar['product']->getMedciamentProd() == 1) {
                                        echo ' selected="selected"';
                                    } ?>>Sim</option>
            </select>
            <label>Controlado:</label>
            <select name="txt_controlled">
                <option value="0" <?php if ($viewVar['product']->getControlledProd() == 0) {
                                        echo ' selected="selected"';
                                    } ?>>Não</option>
                <option value="1" <?php if ($viewVar['product']->getControlledProd() == 1) {
                                        echo ' selected="selected"';
                                    } ?>>Sim</option>
            </select>
        </div>

        <input type="hidden" name="id" value="<?php echo $viewVar['product']->getId(); ?>" <div>

        <button type="submit">Atualizar</button>
        <a href="http://<?php echo APP_HOST; ?>/product/index">Cancelar</a>
        <a href="http://<?php echo APP_HOST; ?>/product/delete/ <?php echo $viewVar['product']->getId(); ?>">Excluir</a>
        </div>
    </form>

</section>