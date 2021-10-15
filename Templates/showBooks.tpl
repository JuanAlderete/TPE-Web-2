{include file='templates/header.tpl'}

<div class="container">
    <div class="blockbooks">
        <h1>LIBRERIA</h1>
        <form action="searchBooks" method="post">
            <input type="text" name="filter" id="filter" placeholder="Buscar por titulo.." required>
            <input type="submit" value="Buscar">
        </form>

        <table>
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