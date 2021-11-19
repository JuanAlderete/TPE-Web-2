
<div class="container">
           
            <form class="form-comment">
                
                <label>Deja tu comentario<label>
                <textarea placeholder="Deja tu comentario" type="text" name="comentario" id="comentario"> </textarea>
                <input placeholder="Nombre del libro" type="text" name="libro" id="libro" required>
                <input placeholder="Usuario" type="text" name="usuario" id="usuario">
                <input type="submit" class="btn-comment" value="Guardar">
            </form>
</div>

 <h2>Comentarios</h2>
    <ul id="list-comments">

    </ul>

<script src="js/apiComment.js"></script>
{include file='templates/footer.tpl'} 