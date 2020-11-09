<section>

    <form action="http://<?php echo APP_HOST; ?>/costAta/update" method="POST">
        <div>
            <h3>Dados da ata</h3>
            <label>Codigo</label>
            <input type="text" value="<?php echo $viewVar['headerCostAta']->getId() ?>" disabled>
            <input type="hidden" value="<?php echo $viewVar['headerCostAta']->getId() ?>" name="id">

            <select name="txt_client">
                <?php
                echo '<option>Selecione</option>';
                foreach ($viewVar['client'] as $value) {
                    echo '<option value="' . $value->getid() . '"';
                    echo $value->getid() == $viewVar['headerCostAta']->getIdClient() ? 'selected="selected"' : '';
                    echo '>' . $value->getNameClient() . '</option>';
                }

                ?>
            </select>
            <label>Data</label>
            <input type="date" value="<?php echo $viewVar['headerCostAta']->getDate() ?>" name="txt_date">
            <label>Pr</label>
            <input type=" text" value="<?php echo $viewVar['headerCostAta']->getPr() ?>" name="txt_pr">
            <label>Processo</label>
            <input type="text" value="<?php echo $viewVar['headerCostAta']->getProcess() ?>" name="txt_process">
            <label>objeto</label>
            <textarea name="txt_object"><?php echo $viewVar['headerCostAta']->getObject() ?></textarea>
        </div>
        <div>
            <h4>Relações de documentos</h4>
            <label>No dia</label>
            <select name="txt_inday">
                <option value="1" <?php echo $viewVar['headerCostAta']->getInDay() ? 'selected="selected"' : ''; ?>>Sim</option>
                <option value="0" <?php echo $viewVar['headerCostAta']->getInDay() ? '' : 'selected="selected"'; ?>>Não</option>
            </select>

            <label>Venceu</label>
            <select name="txt_winner">
                <option value="1" <?php echo $viewVar['headerCostAta']->getWinner() ? 'selected="selected"' : ''; ?>>Sim</option>
                <option value="0" <?php echo $viewVar['headerCostAta']->getWinner() ? '' : 'selected="selected"'; ?>>Não</option>
            </select>

            <label>Dias para entregar</label>
            <input type="text" value="<?php echo $viewVar['headerCostAta']->getDaysDeliver() ?>" name="txt_days_deliver">

            <label>Amostras</label>
            <select name="txt_example">
                <option value="1" <?php echo $viewVar['headerCostAta']->getExample() ? 'selected="selected"' : ''; ?>>Sim</option>
                <option value="0" <?php echo $viewVar['headerCostAta']->getExample() ? '' : 'selected="selected"'; ?>>Não</option>
            </select>

            <label>Bulas</label>
            <select name="txt_bula">
                <option value="1" <?php echo $viewVar['headerCostAta']->getBula() ? 'selected="selected"' : ''; ?>>Sim</option>
                <option value="0" <?php echo $viewVar['headerCostAta']->getBula() ? '' : 'selected="selected"'; ?>>Não</option>
            </select>

        </div>
        <div>
            <label>Catalogos</label>
            <select name="txt_catalog">
                <option value="1" <?php echo $viewVar['headerCostAta']->getCatalog() ? 'selected="selected"' : ''; ?>>Sim</option>
                <option value="0" <?php echo $viewVar['headerCostAta']->getCatalog() ? '' : 'selected="selected"'; ?>>Não</option>
            </select>

            <label>cbpf</label>
            <select name="txt_cbpf">
                <option value="1" <?php echo $viewVar['headerCostAta']->getCbpf() ? 'selected="selected"' : ''; ?>>Sim</option>
                <option value="0" <?php echo $viewVar['headerCostAta']->getCbpf() ? '' : 'selected="selected"'; ?>>Não</option>
            </select>

            <label>credenciameto</label>
            <select name="txt_accreditation">
                <option value="1" <?php echo $viewVar['headerCostAta']->getAccreditation() ? 'selected="selected"' : ''; ?>>Sim</option>
                <option value="0" <?php echo $viewVar['headerCostAta']->getAccreditation() ? '' : 'selected="selected"'; ?>>Não</option>
            </select>

            <label>Registro anvisa</label>
            <select name="txt_register_anvisa">
                <option value="1" <?php echo $viewVar['headerCostAta']->getRegisterAnvisa() ? 'selected="selected"' : ''; ?>>Sim</option>
                <option value="0" <?php echo $viewVar['headerCostAta']->getRegisterAnvisa() ? '' : 'selected="selected"'; ?>>Não</option>
            </select>

            <label>registro dou</label>
            <select name="txt_register_dou">
                <option value="1" <?php echo $viewVar['headerCostAta']->getRegisterDou() ? 'selected="selected"' : ''; ?>>Sim</option>
                <option value="0" <?php echo $viewVar['headerCostAta']->getRegisterDou() ? '' : 'selected="selected"'; ?>>Não</option>
            </select>

        </div>

        <input type="submit" value="salvar">
    </form>


    <a href="http://<?php echo APP_HOST; ?>/costAta/editItens/<?php echo $viewVar['headerCostAta']->getId() ?>">Editar itens</a>
    <a href="http://<?php echo APP_HOST; ?>/costAta/delete/<?php echo $viewVar['headerCostAta']->getId() ?>">Excluir ata</a>

</section>