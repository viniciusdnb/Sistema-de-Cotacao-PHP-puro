 <div>
     <ol>
         <li>Adm</li>
         <li>Fornecedor</li>
         <li><a href="http://<?php echo APP_HOST; ?>/factory/index">Listar</a></li>
         <li><a href="http://<?php echo APP_HOST; ?>/factory/new">Cadastrar</a></li>
     </ol>
 </div>


 <section>
     <form action="http://<?php echo APP_HOST?>/factory/insert" method="POST">
         <label>Nome:</label>
         <input type="text" name="txt_name">
         <label>Endereço:</label>
         <input type="text" name="txt_addres" >
         <label>Email:</label>
         <input type="email" name="txt_email" >
         <label>CNPJ:</label>
         <input type="text" name="txt_cnpj" >
         <label>Telefone:</label>
         <input type="text" name="txt_phone" >
         <label>Contato:</label>
         <input type="text" name="txt_contact" >
         <div>
             <button type="submit">Salvar</button>
             <a href="http://<?php echo APP_HOST; ?>/factory/index">Cancelar</a>
             
         </div>
     </form>
 </section>