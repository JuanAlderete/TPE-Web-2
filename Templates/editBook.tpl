{include file='Templates/header.tpl'}

<div class="containerEdit">
    <h2>Editar libro</h2>
    <form action="editBook" method="post" >
        <p>Nombre <input type="text" name="titulo" id="titulo" value="{$book->titulo}"></p>
        <p>Fecha de publicacion <input type="text" name="fecha_publicacion" id="fecha_publicacion" value="{$book->fecha_publicacion}"></p>
        <p>Autor: {$book->nombre}
            <select name="AuthorSelect" >
                {foreach from=$authors item=$author}
                <option value="{$author->id_autor}">{$author->nombre}</option>
                {/foreach}
            </select>
        </p>

        <button id="book_id" class="editar" type="submit" name="book_id" value="{$book->id}" >Editar </button>

    </form>
    
    <form action="admhome">
    <button id="cancelEdit" type="submit">Cancelar </button>
    </form>

</div>

{include file='templates/footer.tpl'}