<div class="containerAuthors">
    <h1>Lista de Autores</h1>
    <div id="createAuthor">
    <h2>Ingrese un nuevo autor</h2>
    <form action="createAuthor" method="post" >
        <input type="text" name="author" id="author">
        <input type="submit" value="Agregar">
    </form>
    </div>

    <div class="hide" id="editAuthor">
    <h2>Editar autor</h2>
    <form action="editAuthor" method="post" >
        <input type="text" name="author" id="author" value="">
        <button id="editA" type="submit" name="author_id">Editar </button>
    </form>
    <button id="cancelEditAuthor" type="button" >Cancelar </button>
    </div>

    <table>
        <thead>
            <tr>
                <th>Autores</th>
            </tr>
        <thead>
        <tbody>
    {foreach from=$authors item=$author}
        <tr>
            <td>{$author->nombre} <a href="deleteAuthor/{$author->id_autor}">Borrar</a> <button class="get_author_id" type ="button" data-id={$author->id_autor} >Editar</button> </td>
            {* <td>{$author->nombre} <a href="deleteAuthor/{$author->id_autor}">Borrar</a> <a href="editAuthor/{$author->id_autor}"> Editar</a> </td> *}
        </tr>
    {/foreach}
        </tbody>    
    </table>


<script type="text/javascript" src="js/edit.js"> </script>