<!DOCTYPE html>
    <html lang="en">
    <head>
        <base href="{BASE_URL}" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/styles.css">
        <title>LIBROS</title>
    </head>
    <body>

    <nav class="menu">
        {* <img src="../img/bookstore.jpg"> *}
        <ul>
            <li class="leftli"><a href="{BASE_URL}home">Home</a></li>
            <li class="leftli"><a href="{BASE_URL}admhome">Adm Home</a></li>
           {* <li class="leftli"><a href="{BASE_URL}CommentsApiCSR">Comments ApiCSR </a></li>*}
            <li class="leftli"><a href="{BASE_URL}ApiCSR">Adm ApiCSR Home</a></li>
            {if ({$smarty.session.admin} == 1) } <li class="rightli"><a href="{BASE_URL}users">Users</a></li> {/if}
            
            <li class="rightli"><a href="{BASE_URL}login">Login</a></li>
            <li class="rightli"><a href="{BASE_URL}logout">Logout</a></li>
        </ul>
    </nav>