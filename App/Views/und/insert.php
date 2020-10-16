 <div>
     <ol>
         <li>Adm</li>
         <li>Unidade de medida</li>
         <li><a href="http://<?php echo APP_HOST ?>/und/index">Listar</a></li>
         <li><a href="#">Cadastrar</a></li>
     </ol>
 </div>

 <section>



     <div>
         <h3>Cadastro de Unidade de medida </h3>
     </div>
     <form method="POST" name="form" action="http://<?php echo APP_HOST; ?>/und/insert">


         <div>
             <label>Descrição:</label>
             <input type="text" name="txt_description">
         </div>
         <div>
             <label>UND:</label>
             <input type="text" name="txt_und" maxlength="3">
         </div>
         <div>         




         </div>
         <div>
             <button type="submit">Salvar</button>
             <a href="http://<?php echo APP_HOST; ?>/und/index">Cancelar</a>

         </div>
     </form>




 </section>