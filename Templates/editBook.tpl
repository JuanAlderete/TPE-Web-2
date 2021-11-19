{include file='Templates/header.tpl'}

<div class="containerEdit">
    <h2>Editar libro</h2>
    <form action="editBook" method="post" enctype="multipart/form-data" class="form-edit">
        <p>Nombre <input type="text" name="titulo" class="feedback-input" id="titulo" value="{$book->titulo}"></p>
        <p>Fecha de publicacion <input type="text" name="fecha_publicacion" class="feedback-input" id="fecha_publicacion" value="{$book->fecha_publicacion}"></p>
        <p>Autor: {$book->nombre}
            <select name="AuthorSelect" >
                {foreach from=$authors item=$author}
                <option value="{$author->id_autor}">{$author->nombre}</option>
                {/foreach}
            </select>
        </p>

        <div class="form-file feedback-input form-edit-input-img">
            <input type="file" name="input_name" id="imageToUpload">
        </div>

        <button id="book_id" class="editar btn-editar" type="submit" name="book_id" value="{$book->id}" >Editar </button>

    </form>
    
    <form action="admhome">
    <button id="cancelEdit" type="submit" class="btn-editar">Cancelar </button>
    </form>

</div>

{include file='templates/footer.tpl'}