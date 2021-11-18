{include file='templates/header.tpl'}
<div class="container">

    
            <h2>Comentarios</h2>
            <form class="form-alta" action="createTask" method="post">
                <input placeholder="Deja tu comentario.." type="text" name="comentario" id="comentario" required>
                <textarea placeholder="Deja tu comentario" type="text" name="comentario" id="comentario"> </textarea>
                <input placeholder="Nombre del libro" type="text" name="libro" id="libro" required>
                <input placeholder="Usuario" type="text" name="usuario" id="usuario">
                <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
</div>

<script src="js/app.js"></script>
{include file='templates/footer.tpl'}