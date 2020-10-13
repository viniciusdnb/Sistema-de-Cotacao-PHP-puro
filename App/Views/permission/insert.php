
                <div>
                    <ol>
                        <li>Adm</li>
                        <li>Permissões</li>
                        <li><a href="http://<?php echo APP_HOST ?>/permission/index">Listar</a></li>
                        <li><a href="#">Cadastrar</a></li>
                    </ol>
                </div>
            

    <section>
        
                        <div>
                            <h3>Cadastro de Permissões</h3>
                        </div>
                        <form method="POST" name="form" action="http://<?php echo APP_HOST; ?>/permission/insert">
                            
                                    <div >
                                        <label>Codigo tipo:</label>
                                        <input type="text" name="txt_cod_type">
                                    </div>
                                    <div >
                                        <label>Descrição tipo:</label>
                                        <input type="text" name="txt_name_type">
                                    </div>
                                    <div >
                                        <label>Codigo permissão:</label>
                                        <input type="text" name="txt_cod_perm">
                                    </div>
                                    <div >
                                        <label>Descrição permissão:</label>
                                        <input type="text" name="txt_name_perm">
                                    </div>
                                
                            
                            <div>
                                <button type="submit">Salvar</button>

                                <a href="http://<?php echo APP_HOST; ?>/permission/index">Cancelar</a>
                                <a href="http://<?php echo APP_HOST; ?>/permisson/delete">Excluir</a>
                            </div>
                        </form>
                    
    </section>
