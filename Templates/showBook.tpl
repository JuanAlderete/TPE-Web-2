{include file='Templates/header.tpl'}

<div class="container">
<<<<<<< HEAD
    <h1>{$book->titulo}</h1>
    <h2>Autor: {$book->nombre}</h2>
    <h2>Año de publicacion: {$book->fecha_publicacion}</h2>
     {* <h2>Finalizada: {$task->finalizada}</h2> *}
=======
    <h1>{$book->nombre}</h1>
        {* FALTA PODER VER LA CATEGORIA(OSEA EL AUTOR)*}
     <h2>Fecha de publicacion: {$book->fecha_publicacion}</h2>
>>>>>>> 32a3108d5f18999d48e277777b8c7c373ef6c2c6

    <a href="home" > Volver </a>
</div>

{include file='Templates/footer.tpl'}
