{include file='Templates/header.tpl'}

<div class="container">
    <h1>{$book->titulo}</h1>
    <h2>Autor: {$book->nombre}</h2>
    {* <h2>Prioridad: {$task->prioridad}</h2>
    <h2>Finalizada: {$task->finalizada}</h2> *}

    <a href="home" > Volver </a>
</div>

{include file='Templates/footer.tpl'}
