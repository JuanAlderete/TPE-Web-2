{include file='templates/header.tpl'}

<div class="container">
    <h1>LISTA DE AUTORES</h1>
    <table>
        <thead>
            <tr>
                <th>Autor</th>
            </tr>
        <thead>
        <tbody>
    {foreach from=$authors item=$author}
        <tr>
            <td>{$author->autor}</td>
        </tr>
    {/foreach}
        </tbody>    
    </table>

</div>

{include file='templates/footer.tpl'}