
<div class="container-comment">
           
            <form class="form-comment" method="post">
             
                <label>Comentario</label> <input type="text" name="comentario" id="comentario" placeholder="Comentario">
                <label>Calificacion</label> <input type="number" name="calificacion" min="1" max="5" id="calificacion" placeholder="De 1 a 5">
                               
                <button type="submit" class="btn-comment">Enviar comentario</button>
            </form>

            <div id="user" data-user={$iduser}>
            </div>
</div>

 <h2>Comentarios</h2>
    <ul id="list-comments">

    </ul>

<script src="js/apiComment.js"></script>
{include file='templates/footer.tpl'} 