{include file='Templates/header.tpl'}

<div class="containerEdit">
        <h2>Editar autor</h2>
        <form action="editAuthor" method="post" >
            <input type="text" name="author" id="author" value="{$author->nombre}">
            <button type="submit" class="editar" name="author_id" id="author_id" value="{$author->id_autor}">Editar </button>
        </form>

        <form action="admhome">
        <button id="cancelEdit" type="submit">Cancelar </button>
        </form>
        
</div>

{include file='templates/footer.tpl'}