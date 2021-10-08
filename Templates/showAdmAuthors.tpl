<div class="containerAuthors">
    <h1>Lista de Autores</h1>
    
    <h2>Ingrese un nuevo autor</h2>
    <form action="createAuthor" method="post" >
        <input type="text" name="author" id="author">
        <input type="submit" value="Agregar">
    </form>
    <table>
        <thead>
            <tr>
                <th>Autores</th>
            </tr>
        <thead>
        <tbody>
    {foreach from=$authors item=$author}
        <tr>
            <td>{$author->nombre} <a href="deleteAuthor/{$author->id_autor}">Borrar</a> <a  href="editAuthor/ {$author->id_autor}">Editar</a> </td>  
        </tr>
    {/foreach}
        </tbody>    
    </table>

</div>