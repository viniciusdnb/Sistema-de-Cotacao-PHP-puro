<?php echo $Session::getMessage(); ?>

<form action="http://<?php echo APP_HOST; ?>/Authentication/login" method="POST">
    <div>
        <input type="text" name="txt_user" required="required" placeholder="Usuario">
    </div>
    <div>
        <input type="password" name="txt_pass" required="required" placeholder="Senha">
    </div>
    <button type="submit" name="submit">Entrar</button>
</form>