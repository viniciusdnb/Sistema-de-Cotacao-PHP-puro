<div>
    <ol>
        <li>Adm</li>
        <li>Produtos</li>
        <li><a href="http://<?php echo APP_HOST ?>/product/index">Listar</a></li>
        <li><a href="http://<?php echo APP_HOST ?>/product/new">Cadastrar</a></li>
    </ol>
</div>

<section>
    <div>
        <h3>Cadastro de Produto</h3>
    </div>

    <form method="POST" action="http://<?php echo APP_HOST; ?>/product/insert">
        <div>
            <label>Codigo:</label>
            <input type="text" name="txt_code">
            <label>Descrição:</label>
            <input type="text" name="txt_desc_res">
            <label>UND:</label>
            <select name="txt_und">
                <?php
                foreach ($viewVar['und'] as $value) {
                    echo '<option value="' . $value->getId() . '">' . $value->getUnd() . '</option>';
                }
                ?>
            </select>
            <label>Fabricante:</label>
            <select name="txt_factory">
                <?php
                foreach ($viewVar['factory'] as $value) {
                    echo '<option value="' . $value->getId() . '">' . $value->getNameFactory() . '</option>';
                }
                ?>
            </select>
            <label>Descrição completa:</label>
            <textarea name="txt_desc_com"></textarea>
        </div>
        <div>
            <label>Ativo:</label>
            <select name="txt_active">
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
            <label>Medicamento:</label>
            <select name="txt_medicament">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
            <label>Controlado:</label>
            <select name="txt_controlled">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>

        <div>
            <button type="submit">Cadastrar</button>
            <a href="http://<?php echo APP_HOST; ?>/product/index">Cancelar</a>
        </div>
    </form>

</section>