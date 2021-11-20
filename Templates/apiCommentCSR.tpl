
<div class="container">
           
            <form class="form-comment">
             
                <label>Comentario</label> <input type="text" name="comentario" id="comentario" placeholder="Comentario">
                {*<label>Puntuacion</label> <input type="number" name="puntuacion" min="1" max="5" id="puntuacion" placeholder="Del 1 a 5">*}
                <input type="button" class="btn-comment" value="Guardar">
            </form>
</div>

 <h2>Comentarios</h2>
    <ul id="list-comments">

    </ul>

<script src="js/apiComment.js"></script>
{include file='templates/footer.tpl'} 