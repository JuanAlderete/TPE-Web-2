{include file='Templates/header.tpl'}

<div class="container">
    <h1>{$book->nombre}</h1>
        {* FALTA PODER VER LA CATEGORIA(OSEA EL AUTOR)*}
     <h2>Fecha de publicacion: {$book->fecha_publicacion}</h2>

    <a href="home" > Volver </a>
</div>

{include file='Templates/footer.tpl'}
