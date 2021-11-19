{include file='Templates/header.tpl'}

<div class="container">

    <h1>{$book->titulo}</h1>
    
    <h3>Año de publicacion: {$book->fecha_publicacion}</h3>
     
    <h3>Autor: {$book->nombre}</h3>

    {if isset($book->imagen)}
        <div class="book-img">
            <img src="{$book->imagen}"/>
        </div>
    {/if}

    </br>
    
</div>
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

<a href="home" > Volver </a>


{include file='Templates/footer.tpl'}
