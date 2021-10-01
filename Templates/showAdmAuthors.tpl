{include file='templates/header.tpl'}

<div class="container">
    <h1>Lista de Autores</h1>
    
    <h2>Ingrese un nuevo autor</h2>
    <form action="createAuthor" method="post" >
    <input type="text" name="author" id="author">
    <input type="submit" value="Guardar">
    </form>
    <table>
        <thead>
            <tr>
                <th>Autor</th>
                
            </tr>
        <thead>
        <tbody>
    {foreach from=$authors item=$author}
        <tr>
            <td>{$author->autor} <a href="deleteAuthor/{$author->id}">Borrar</a> <a  href="editAuthor/ {$author->id}">Editar</a> </td>
            
            
        </tr>
    {/foreach}
        </tbody>    
    </table>

</div>

{include file='templates/footer.tpl'}