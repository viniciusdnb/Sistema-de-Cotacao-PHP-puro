<div>
    <ol>
        <li>Adm</li>
        <li>Usuarios</li>
        <li><a href="http://<?php echo APP_HOST ?>/costAta/index">Listar</a></li>
        <li><a href="http://<?php echo APP_HOST ?>/costAta/new">Cadastrar</a></li>
    </ol>
</div>


<section>
    <div>
        <h3>Cadastro de custo de atas</h3>
    </div>

    <form action="http://<?php echo APP_HOST ?>/costAta/insert" method="post">
        <div>
            <hr>
            <label>Cliente</label>
            <select name="txt_client">
                <?php
                    echo'<option>Selecione</option>';
                foreach ($viewVar['client'] as $value) {
                    echo '<option value="' . $value->getid() . '">' . $value->getNameClient() . '</option>';
                }

                ?>
            </select>          
            
            <label>Data</label>
            <input type="date" name="txt_date">
            <label>Pr</label>
            <input type="text" name="txt_pr">
            <label>Processo</label>
            <input type="text" name="txt_process">
            <label>objeto</label>
            <textarea name="txt_object"></textarea>
            <hr>
        </div>
        <div>
            <hr>
            <label>No dia</label>
            <select name="txt_inday">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
            <label>Venceu</label>
            <select name="txt_winner">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
            <label>Dias para entregar</label>
            <input type="text" name="txt_days_deliver">
            <label>Amostras</label>
            <select name="txt_example">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
            <label>Bulas</label>
            <select name="txt_bula">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
            <hr>
        </div>
        <div>
            <label>Catalogos</label>
            <select name="txt_catalog">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
            <label>cbpf</label>
            <select name="txt_cbpf">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
            <label>credenciametp</label>
            <select name="txt_accreditation">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
            <label>Registro anvisa</label>
            <select name="txt_register_anvisa">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
            <label>registro dou</label>
            <select name="txt_register_dou">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>

        <input type="submit" value="salvar">
    </form>
</section>