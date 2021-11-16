{include file='templates/header.tpl'}

<div class="containerUsers">
    <table>
        <thead>
            <tr>
                <th>Usuarios</th>
                <th>Admin</th>
            </tr>
        <thead>
        <tbody>
    {foreach from=$users item=$user}
        <tr>
            <td><a class="username" data-id={$user->id_user}>{$user->email}</a> <a class="delete" {*href="deleteBook/{*$user->id_user*}"*}> Borrar</a></td>
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

{include file='templates/footer.tpl'}