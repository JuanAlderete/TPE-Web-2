
    <div class="container-form-comments">
            
                <form class="form-comment" method="post">
                    <div class="input-form-comments">
                    <label>Comentario</label> </br> <input type="text" class="feedback-input-comment" name="comentario" id="comentario" placeholder="Comentario"> </br> 
                    <label>Calificacion</label> </br> <input type="number" class="feedback-input-comment" name="calificacion" min="1" max="5" id="calificacion" placeholder="De 1 a 5">
                    </div>
                    
                    <div class="btn-form-comment">
                    <button type="submit" class="btn-comment">Enviar comentario</button>
                    </div>
                </form>

                <div id="user" data-user={$iduser}>
                </div>
    </div>

    <div class="container-comments">
        <h2>Comentarios</h2>
        <ul id="list-comments">

        </ul>
    </div>

<script src="js/apiComment.js"></script>
{include file='templates/footer.tpl'} 