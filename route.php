<!-- Route the pages using Request URI. -->
<div class="main">
<?php
    switch ($_SERVER['REQUEST_URI']) {
        case "/home":
            include("home.php");
            break;
        case "/pendingTodos":
            include("pendingTodos.php");
            break;
        case "/doneTodos":
            include("doneTodos.php");
            break;
        case "/about":
            include("about.php");
            break;
        default:
            include('home.php');
            break;
    }

?>
</div>