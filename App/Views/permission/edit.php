<div>
    <ol>
        <li>Adm</li>
        <li>Permissões</li>
        <li><a href="http://<?php echo APP_HOST ?>/permission/index">Listar</a></li>
        <li><a href="#">Cadastrar</a></li>
    </ol>
</div>
<?php 
   
    
?>

<section>
    <div>
        <h3>Edição de Permissões</h3>
    </div>
    <form method="POST" name="form" action="http://<?php echo APP_HOST; ?>/permission/update">
        <div>
            <label>Codigo tipo:</label>
            <input type="text" name="txt_cod_type" value="<?php echo $viewVar['perm']->getType(); ?>">
        </div>
        <div>
            <label>Descrição tipo:</label>
            <input type="text" name="txt_name_type" value="<?php echo $viewVar['perm']->getTypeName(); ?>">
        </div>
        <div>
            <label>Codigo permissão:</label>
            <input type="text" name="txt_cod_perm" value="<?php echo $viewVar['perm']->getPerm(); ?>">
        </div>
        <div>
            <label>Descrição permissão:</label>
            <input type="text" name="txt_name_perm" value="<?php echo $viewVar['perm']->getPermName(); ?>">
        </div>
        <div>
            <input type="hidden" name="id" value="<?php echo $viewVar['perm']->getId(); ?>">
            <button type="submit">Atualizar</button>
            <a href="http://<?php echo APP_HOST; ?>/permission/index">Cancelar</a>
            <a href="http://<?php echo APP_HOST; ?>/permission/delete/<?php echo $viewVar['perm']->getId();?>">Excluir</a>
        </div>
    </form>
</section>