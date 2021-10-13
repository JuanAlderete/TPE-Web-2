{include file='Templates/header.tpl'}

<div class="container">
<h2>Editar autor</h2>
    <form action="editAuthor" method="post" >
        <input type="text" name="author" id="author" value="{$author->nombre}">
        <button id="editA" type="submit" name="author_id">Editar </button>
    </form>
    <button id="cancelEditAuthor" type="button" >Cancelar </button>
</div>

{include file='templates/footer.tpl'}