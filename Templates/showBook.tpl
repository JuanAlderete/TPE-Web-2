{include file='Templates/header.tpl'}

<div class="container">

    <h1>{$book->titulo}</h1>
    
    <h3>Año de publicacion: {$book->fecha_publicacion}</h3>
     

    <h3>Autor: {$book->nombre}</h3>
       

    <a href="home" > Volver </a>
</div>

{include file='Templates/footer.tpl'}
