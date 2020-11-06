<section>
    <div>
        <h3>Dados da ata</h3>
        <label>Codigo</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getId() ?>" disabled>
        <label>Cliente</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getNameClient() ?>">
        <label>Data</label>
        <input type="date" value="<?php echo $viewVar['headerCostAta']->getDate() ?>">
        <label>Pr</label>
        <input type=" text" value="<?php echo $viewVar['headerCostAta']->getPr() ?>">
        <label>Processo</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getProcess() ?>">
        <label>objeto</label>
        <textarea><?php echo $viewVar['headerCostAta']->getObject() ?>"</textarea>
    </div>
    <div>
        <h4>Relações de documentos</h4>
        <label>No dia</label>
        <select>
            <option value="1" <?php echo $viewVar['headerCostAta']->getInDay() ? 'selected="selected"' : ''; ?>>Sim</option>
            <option value="0" <?php echo $viewVar['headerCostAta']->getInDay() ? '' : 'selected="selected"'; ?>>Não</option>
        </select>

        <label>Venceu</label>
        <select>
            <option value="1" <?php echo $viewVar['headerCostAta']->getWinner() ? 'selected="selected"' : ''; ?>>Sim</option>
            <option value="0" <?php echo $viewVar['headerCostAta']->getWinner() ? '' : 'selected="selected"'; ?>>Não</option>
        </select>

        <label>Dias para entregar</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getDaysDeliver() ?>">

        <label>Amostras</label>
        <select>
            <option value="1" <?php echo $viewVar['headerCostAta']->getExample() ? 'selected="selected"' : ''; ?>>Sim</option>
            <option value="0" <?php echo $viewVar['headerCostAta']->getExample() ? '' : 'selected="selected"'; ?>>Não</option>
        </select>

        <label>Bulas</label>
        <select>
            <option value="1" <?php echo $viewVar['headerCostAta']->getBula() ? 'selected="selected"' : ''; ?>>Sim</option>
            <option value="0" <?php echo $viewVar['headerCostAta']->getBula() ? '' : 'selected="selected"'; ?>>Não</option>
        </select>

    </div>
    <div>
        <label>Catalogos</label>
        <select>
            <option value="1" <?php echo $viewVar['headerCostAta']->getCatalog() ? 'selected="selected"' : ''; ?>>Sim</option>
            <option value="0" <?php echo $viewVar['headerCostAta']->getCatalog() ? '' : 'selected="selected"'; ?>>Não</option>
        </select>

        <label>cbpf</label>
        <select>
            <option value="1" <?php echo $viewVar['headerCostAta']->getCbpf() ? 'selected="selected"' : ''; ?>>Sim</option>
            <option value="0" <?php echo $viewVar['headerCostAta']->getCbpf() ? '' : 'selected="selected"'; ?>>Não</option>
        </select>

        <label>credenciameto</label>
        <select>
            <option value="1" <?php echo $viewVar['headerCostAta']->getAccreditation() ? 'selected="selected"' : ''; ?>>Sim</option>
            <option value="0" <?php echo $viewVar['headerCostAta']->getAccreditation() ? '' : 'selected="selected"'; ?>>Não</option>
        </select>

        <label>Registro anvisa</label>
        <select>
            <option value="1" <?php echo $viewVar['headerCostAta']->getRegisterAnvisa() ? 'selected="selected"' : ''; ?>>Sim</option>
            <option value="0" <?php echo $viewVar['headerCostAta']->getRegisterAnvisa() ? '' : 'selected="selected"'; ?>>Não</option>
        </select>

        <label>registro dou</label>
        <select>
            <option value="1" <?php echo $viewVar['headerCostAta']->getRegisterDou() ? 'selected="selected"' : ''; ?>>Sim</option>
            <option value="0" <?php echo $viewVar['headerCostAta']->getRegisterDou() ? '' : 'selected="selected"'; ?>>Não</option>
        </select>

    </div>

    <a href="http://<?php echo APP_HOST; ?>/costAta/editItens/<?php echo $viewVar['headerCostAta']->getId() ?>">Editar itens</a>

</section>