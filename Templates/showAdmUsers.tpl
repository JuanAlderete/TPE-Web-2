{include file='templates/header.tpl'}

<div class="containerUsers">
    <table class="table-users">
        <thead>
            <tr>
                <th>Usuarios</th>
                <th>Admin</th>
            </tr>
        <thead>
        <tbody>
    {foreach from=$users item=$user}
        <tr>
            <td><a class="username" data-id={$user->id_user}>{$user->email}</a> <a class="delete" href="deleteUser/{$user->id_user}"> Borrar usuario</a> {*<a class="btn-open-popup delete" href="#confirm"> Borrar usuario</a> <button class="popup-open" data-id="{$user->id_user}">Borrar usuario</button>*} </td>
            <td>
                {if ($user->isAdmin == 1)}
                    <a class="username">SI</a>
                    {else}
                        <a class="username">NO</a>
                {/if}
                {if ($user->isAdmin != 1)}
                    <a class="delete" href="doAdmin/{$user->id_user}"> Hacer admin</a>
                    {else}
                        <a class="delete" href="undoAdmin/{$user->id_user}"> Deshacer admin</a>
                {/if}
            </td>
        </tr>
    {/foreach}
        </tbody>    
    </table>
</div>

{* <div class="container-popup" id="confirm">
    <div class="popup">
        <div class="container-text">
            {if ($user->isAdmin == 1)}
                <h1> Este usuario es admin, esta seguro que desea eliminarlo? </h1>
                {else}
                    <h1> Esta seguro que quiere eliminar el usuario? </h1>
            {/if}
        </div>
        <a class="delete" href="deleteUser/{$user->id_user}"> Borrar usuario</a>
        <a class="btn-close-popup delete" id="close-popup" href="#"> Cerrar</a>
    </div>
</div> *}

{* <script type="text/javascript" src="js/popup.js"> </script> *}

{include file='templates/footer.tpl'}