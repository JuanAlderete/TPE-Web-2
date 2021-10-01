{include file='templates/header.tpl'}

<div class="container">
    <h1>LIBRERIA</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
            </tr>
        <thead>
        <tbody>
    {foreach from=$books item=$book}
        <tr>
            <td><a href="viewBook/{$book->id}">{$book->nombre}</a></td> 
        </tr>
    {/foreach}
        </tbody>    
    </table>

</div>

{include file='templates/footer.tpl'}