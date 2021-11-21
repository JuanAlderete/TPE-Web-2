
<div class="container">
           
            <form class="form-comment">
             
                <label>Comentario</label> <input type="text" name="comentario" id="comentario" placeholder="Comentario">
                <label>Calificacion</label> <input type="number" name="calificacion" min="1" max="5" id="calificacion" placeholder="De 1 a 5">
                
                <input type="button" class="btn-comment" value="Guardar">
            </form>
</div>

 <h2>Comentarios</h2>
    <ul id="list-comments">

    </ul>

<script src="js/apiComment.js"></script>
{include file='templates/footer.tpl'} 