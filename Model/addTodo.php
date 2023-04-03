<?php
// Initialising Database class features
require("DbConnection.php");
$db= new DbConnection("todos");

if(isset($_REQUEST['add']) && $_REQUEST['add']=="TRUE" ){
    if($_REQUEST['data']!=""){
        // $content=nl2br(htmlspecialchars($_REQUEST['data'], ENT_QUOTES));
        $content=$_REQUEST['data'];
        $db->addTodos($content);
    }
    elseif(isset($_REQUEST['delete']) && $_REQUEST['delete']!="" ){
        
        $db->deleteTodo($_REQUEST['id']);
}
    else{
        echo '<div class="error">Todos should not be empty!'; 
    }
}

?>