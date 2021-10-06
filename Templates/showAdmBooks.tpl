{include file='templates/header.tpl'}

<div class="container">
    <h1>Lista de Libros</h1>

    <div class="FormBooks">
        <form action="CreateBook" method="post">
            <h2>Ingrese un nuevo libro</h2>

            Nombre <input type="text" name="titulo" id="titulo">
            Fecha de publicacion <input type="text" name="fecha_publicacion" id="fecha_publicacion">

            <select name="AuthorSelect" >
                {foreach from=$authors item=$author}
                <option value="{$author->id_autor}">{$author->nombre}</option>
                {/foreach}
            </select>

        <input type="submit" value="Guardar">

        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Titulos</th>
            </tr>
        <thead>
        <tbody>
    {foreach from=$books item=$book}
        <tr>
            <td><a href="viewBook/{$book->id}">{$book->titulo}<a href="deleteBook/{$book->id}">Borrar</a> <a  href="editBook/ {$book->id}">Editar</a> </td> 
        </tr>
    {/foreach}
        </tbody>    
    </table>

</div>

{include file='templates/ShowAdmAuthors.tpl'}

{include file='templates/footer.tpl'}