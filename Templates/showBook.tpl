{include file='Templates/header.tpl'}

<div class="container">

    <h1>{$book->titulo}</h1>
    
    <h2>Año de publicacion: {$book->fecha_publicacion}</h2>
     

    <h1>{$book->nombre}</h1>
       

    <a href="home" > Volver </a>
</div>

{include file='Templates/footer.tpl'}
