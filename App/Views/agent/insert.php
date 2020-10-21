 <div>
     <ol>
         <li>Adm</li>
         <li>Unidade de medida</li>
         <li><a href="http://<?php echo APP_HOST ?>/agent/index">Listar</a></li>
         <li><a href="#">Cadastrar</a></li>
     </ol>
 </div>

 <section>



     <div>
         <h3>Cadastro de Vendedores </h3>
     </div>
     <form method="POST" name="form" action="http://<?php echo APP_HOST; ?>/agent/insert">


         <div>
             <label>Nome:</label>
             <input type="text" name="txt_name">
         </div>
         <div>
             <label>Email:</label>
             <input type="email" name="txt_email">
         </div>
         <div>

             <label>Telefone:</label>
             <input type="text" name="txt_phone">


         </div>
         <div>
             <button type="submit">Salvar</button>
             <a href="http://<?php echo APP_HOST; ?>/agent/index">Cancelar</a>

         </div>
     </form>




 </section>