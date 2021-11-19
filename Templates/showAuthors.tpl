
<h1>LISTA DE AUTORES</h1>
<div class="containerAuthors">
    <table class="table-authors">
        <thead>
            <tr>
                <th>Autores</th>
            </tr>
        <thead>
        <tbody>
    {foreach from=$authors item=$author}
        <tr>
            <td><a class="authortitle" href="viewAuthor/{$author->id_autor}"> {$author->nombre}</a></td>

        </tr>
    {/foreach}
        </tbody>    
    </table>

</div>

{include file='templates/footer.tpl'}