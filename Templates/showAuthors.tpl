

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
<<<<<<< HEAD
            <td><a href="viewBook/{$author->id_autor}">{$author->nombre}</a></td>
=======
            <td><a href="viewBook/{$author->id}"> {$author->nombre}</a></td>
>>>>>>> c39a245d50c68acc657218273e441b5a8fa7c12e
        </tr>
    {/foreach}
        </tbody>    
    </table>

</div>

{include file='templates/footer.tpl'}