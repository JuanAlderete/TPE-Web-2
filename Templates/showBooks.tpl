{include file='templates/header.tpl'}

<div class="container">
    <h1>LIBRERIA</h1>
    <div class="container-home-books">
        <form action="searchBooks" method="post" class="form-search">
            <input type="text" name="filter" class="feedback-input-search" id="filter" placeholder="Buscar por titulo.." required>
            <input type="submit" value="Buscar" class="btn-search">
        </form>

        <table class="table-books">
            <thead>
                <tr>
                    <th>Titulos</th>
                </tr>
            <thead>
            <tbody>
        {foreach from=$books item=$book}
            <tr>
                <td><a class="booktitle" href="viewBook/{$book->id}">{$book->titulo}</a></td> 
            </tr>
        {/foreach}
            </tbody>    
        </table>
    </div>
</div>

{include file='templates/footer.tpl'}