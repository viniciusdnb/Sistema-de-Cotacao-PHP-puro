<div>
    <ol>
        <li>Adm</li>
        <li>Unidade de Medida</li>
        <li><a href="http://<?php echo APP_HOST ?>/agent/index">Listar</a></li>
        <li><a href="http://<?php echo APP_HOST ?>/agent/new">Cadastrar</a></li>
    </ol>
</div>

<section>



    <div>
        <h3>Cadastro de Vendedor </h3>
    </div>
    <form method="POST" name="form" action="http://<?php echo APP_HOST; ?>/agent/update">


        <div>
            <label>Nome:</label>
            <input type="text" name="txt_name" value="<?php echo $viewVar['agent']->getNameAgent(); ?>">
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="txt_email" value="<?php echo $viewVar['agent']->getEmailAgent(); ?>">
        </div>
        <div>
            <label>Telefone:</label>
            <input type="txt" name="txt_phone" value="<?php echo $viewVar['agent']->getPhoneAgent(); ?>">
        </div>
        <div>


            <input type="hidden" name="id" value="<?php echo $viewVar['agent']->getId(); ?>">
            <button type="submit">Atualizar</button>
            <a href="http://<?php echo APP_HOST; ?>/agent/index">Cancelar</a>
            <a href="http://<?php echo APP_HOST; ?>/agent/delete/<?php echo $viewVar['agent']->getId(); ?>">Excluir</a>
        </div>
    </form>
</section>