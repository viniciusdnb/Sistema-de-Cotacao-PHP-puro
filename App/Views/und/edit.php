<div>
    <ol>
        <li>Adm</li>
        <li>Unidade de Medida</li>
        <li><a href="http://<?php echo APP_HOST ?>/und/index">Listar</a></li>
        <li><a href="http://<?php echo APP_HOST ?>/und/new">Cadastrar</a></li>
    </ol>
</div>
<?php

   

?>
<section>



    <div>
        <h3>Cadastro de Unidade de medida </h3>
    </div>
    <form method="POST" name="form" action="http://<?php echo APP_HOST; ?>/und/update">


        <div>
            <label>Descrição:</label>
            <input type="text" name="txt_description" value="<?php echo $viewVar['und']->getDescription(); ?>">
        </div>
        <div>
            <label>UND:</label>
            <input type="text" name="txt_und" maxlength="3" value="<?php echo $viewVar['und']->getUnd(); ?>">
        </div>
        <div>


            <input type="hidden" name="id" value="<?php echo $viewVar['und']->getId(); ?>">
            <button type="submit">Atualizar</button>
            <a href="http://<?php echo APP_HOST; ?>/und/index">Cancelar</a>
            <a href="http://<?php echo APP_HOST; ?>/und/delete/<?php echo $viewVar['und']->getId();?>">Excluir</a>
        </div>
    </form>
</section>