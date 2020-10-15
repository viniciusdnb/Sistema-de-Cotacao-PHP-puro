 <div>
     <ol>
         <li>Adm</li>
         <li>Permissões</li>
         <li><a href="http://<?php echo APP_HOST; ?>/factory/index">Listar</a></li>
         <li><a href="http://<?php echo APP_HOST; ?>/factory/new">Cadastrar</a></li>
     </ol>
 </div>

 <section>
     <form action="" method="POST">
         <label>Nome:</label>
         <input type="text" name="txt_name" value="<?php ?>">
         <label>Endereço:</label>
         <input type="text" name="txt_addres" value="<?php ?>">
         <label>Email:</label>
         <input type="email" name="txt_email" value="<?php ?>">
         <label>CNPJ:</label>
         <input type="text" name="txt_cnpj" value="<?php ?>">
         <label>Telefone:</label>
         <input type="text" name="txt_phone" value="<?php ?>">
         <label>Contato:</label>
         <input type="text" name="txt_contact" value="<?php ?>">

         <button type="submit">Salvar</button>
     </form>
 </section>