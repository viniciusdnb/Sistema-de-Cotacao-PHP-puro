<section>
    <div>
        <h3>Dados da ata</h3>
        <label>Codigo</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getId() ?>" disabled>
        <label>Cliente</label>
        <input disabled type="text" value="<?php echo $viewVar['headerCostAta']->getNameClient() ?>">
        <label>Data</label>
        <input type="date" value="<?php echo $viewVar['headerCostAta']->getDate() ?>" disabled>
        <label>Pr</label>
        <input type=" text" value="<?php echo $viewVar['headerCostAta']->getPr() ?>" disabled>
        <label>Processo</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getProcess() ?>" disabled>
        <label>objeto</label>
        <textarea disabled><?php echo $viewVar['headerCostAta']->getObject() ?>"</textarea>
    </div>
    <div>
        <h4>Relações de documentos</h4>
        <label>No dia</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getInDay() ? "Sim" : "Não"; ?>" disabled>
        <label>Venceu</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getWinner() ? "Sim" : "Não" ?>" disabled>
        <label>Dias para entregar</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getDaysDeliver() ?>" disabled>
        <label>Amostras</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getExample() ? "Sim" : "Não" ?>" disabled>
        <label>Bulas</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getBula() ? "Sim" : "Não" ?>" disabled>
    </div>
    <div>
        <label>Catalogos</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getCatalog() ? "Sim" : "Não" ?>" disabled>
        <label>cbpf</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getCbpf() ? "Sim" : "Não" ?>" disabled>
        <label>credenciameto</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getAccreditation() ? "Sim" : "Não" ?>" disabled>
        <label>Registro anvisa</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getRegisterAnvisa() ? "Sim" : "Não" ?>" disabled>
        <label>registro dou</label>
        <input type="text" value="<?php echo $viewVar['headerCostAta']->getRegisterDou() ? "Sim" : "Não" ?>" disabled>
    </div>

</section>