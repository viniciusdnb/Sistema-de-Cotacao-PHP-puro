 <div>
     <ol>
         <li>Adm</li>
         <li>Fornecedor</li>
         <li><a href="http://<?php echo APP_HOST; ?>/factory/index">Listar</a></li>
         <li><a href="http://<?php echo APP_HOST; ?>/factory/new">Cadastrar</a></li>
     </ol>
 </div>
 <?php
   
 ?>

 <section>
     <form action="http://<?php echo APP_HOST?>/factory/update" method="POST">
         <label>Nome:</label>
         <input type="text" name="txt_name" value="<?php echo $viewVar['factory']->getNameFactory(); ?>">
         <label>Endereço:</label>
         <input type="text" name="txt_addres" value="<?php echo $viewVar['factory']->getAddresFactory(); ?>">
         <label>Email:</label>
         <input type="email" name="txt_email" value="<?php echo $viewVar['factory']->getEmailFactory(); ?>">
         <label>CNPJ:</label>
         <input type="text" name="txt_cnpj" value="<?php echo $viewVar['factory']->getCnpjFactory(); ?>">
         <label>Telefone:</label>
         <input type="text" name="txt_phone" value="<?php echo $viewVar['factory']->getPhoneFactory(); ?>">
         <label>Contato:</label>
         <input type="text" name="txt_contact" value="<?php echo $viewVar['factory']->getContactFactory(); ?>">
         <div>
             <input type="hidden" name="id" value="<?php echo $viewVar['factory']->getId(); ?>">
             <button type="submit">Atualizar</button>
             <a href="http://<?php echo APP_HOST; ?>/factory/index">Cancelar</a>
             <a href="http://<?php echo APP_HOST; ?>/factory/delete/<?php echo $viewVar['factory']->getId(); ?>">Excluir</a>
         </div>
     </form>
 </section>