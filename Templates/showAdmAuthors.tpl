<h1>Lista de Autores</h1>
<div class="containerAuthors">

    <div id="createAuthor">
        <h2>Ingrese un nuevo autor</h2>
        <form action="createAuthor" method="post" >
            <input type="text" name="author" id="author">
            <input type="submit" value="Agregar">
        </form>
    </div>

    {* <div class="hide" id="editAuthor">
    <h2>Editar autor</h2>
    <form action="editAuthor" method="post" >
        <input type="text" name="author" id="author" value="">
        <button id="editA" type="submit" name="author_id">Editar </button>
    </form>
    <button id="cancelEditAuthor" type="button" >Cancelar </button>
    </div> *}

    <table>
        <thead>
            <tr>
                <th>Autores</th>
            </tr>
        <thead>
        <tbody>
    {foreach from=$authors item=$author}
        <tr>
            <td><a class="authortitle" href="viewAuthor/{$author->id_autor}">{$author->nombre}</a> <button class="get_author_id" type ="button" data-id={$author->id_autor}>Borrar</button> <a class="editar" href="formEditAuthor/{$author->id_autor}"> Editar</a> </td>
            {* <td> <a class="authortitle" href="viewAuthor/{$author->id_autor}">{$author->nombre}</a> <a class="delete" id="botonBorrar" href="deleteAuthor/{$author->id_autor}">Borrar</a> <a class="editar" href="formEditAuthor/{$author->id_autor}"> Editar</a> </td> *}
        </tr>
    {/foreach}
        </tbody>    
    </table>

    <div class="nohide bloqueBorrar" id="editAuthor">
        <p> Se borraran todos los libros relacionados a este autor, desea continuar? </p>
        <div class="bloqueFormBorrar">
            <div>
                <form action="deleteAuthor" method="post">
                    <button type="submit" name="author_id" id="editA">Confirmar </button>
                </form>
            <div>
            </div>
                <button id="cancelDeleteAuthor" class="get_author_id" type ="button">Cancelar</button>
            </div>
        </div>
    </div>

    {* <script type="text/javascript">
        var boton = document.getElementById('botonBorrar');
        var objetivo = boton.getAttribute('data-id');
        function alerta(){
            var mensaje;
            var opcion = confirm("Se borraran todos los libros relacionados a este autor, desea continuar?");
            if (opcion == true) {
            }
        }
    </script> *}

<script type="text/javascript" src="js/edit.js"> </script>