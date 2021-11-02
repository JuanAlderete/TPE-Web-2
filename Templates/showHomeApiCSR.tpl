{include file='templates/header.tpl'}

<div class="containerBooks">
    <h1>Lista de Libros</h1>

    <div id="createBook">
        <h2>Ingrese un nuevo libro</h2>
        <form action="CreateBook" method="post">
            <p>Nombre <input type="text" name="titulo" id="titulo"></p>
            <p>Fecha de publicacion <input type="text" name="fecha_publicacion" id="fecha_publicacion"></p>
            <p>Autor: 
                <select name="AuthorSelect" >
                    {foreach from=$authors item=$author}
                    <option value="{$author->id_autor}">{$author->nombre}</option>
                    {/foreach}
                </select>
            </p>
            <input type="submit" value="Guardar">
        </form>
    </div>

    <div id="list-books">
    </div>

</div>

<script type="text/javascript" src="js/api.js"> </script>

{include file='templates/footer.tpl'}