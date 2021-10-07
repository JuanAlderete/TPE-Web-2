{include file='Templates/header.tpl'}

<div class="bloqueLogin">
    <h2>LOGIN</h2>
    <form action="verifylogin" method="post">
            Email <input type="text" name="email" id="email">  {*</br>*}
            Contraseña <input type="password" name="password" id="password">
        <input type="submit" value="Entrar">
    </form> 
    {* </br>
    <form action="register" method="post">
            Email <input type="text" name="email" id="email"> </br>
            Contraseña <input type="password" name="password" id="password">
        <input type="submit" value="Registrar">
    </form> *}
</div>

{include file='templates/footer.tpl'}