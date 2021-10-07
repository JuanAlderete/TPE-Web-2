{include file='templates/header.tpl'}

<div class="container">
    <h1>Lista de Libros</h1>

    <div id="createBook">
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
    <div class="hide" id="editBook">
    <form action="editBook" method="post" >
            <h2>Editar libro</h2>

            Nombre <input type="text" name="titulo" id="titulo">
            Fecha de publicacion <input type="text" name="fecha_publicacion" id="fecha_publicacion">

            <select name="AuthorSelect" >
                {foreach from=$authors item=$author}
                <option value="{$author->id_autor}">{$author->nombre}</option>
                {/foreach}
            </select>

        <button id="edit" type="submit" name="book_id">Editar </button>

        </form>
        <button id="cancelEdit" type="button" >Cancelar </button>
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
            <td><a href="viewBook/{$book->id}">{$book->titulo} <a href="deleteBook/{$book->id}">Borrar</a>  <button  class="get_book_id" type ="button" data-id={$book->id} >Editar</button><a  href="editBook/ {$book->id}">Editar</a> </td> 
        </tr>
    {/foreach}
        </tbody>    
    </table>

</div>

<script type="text/javascript" src="js/edit.js"> </script>

{include file='templates/ShowAdmAuthors.tpl'}

{include file='templates/footer.tpl'}

