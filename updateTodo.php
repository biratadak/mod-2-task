<?php
// Initialising Database class features
require("class/DbConnection.php");
$db= new DbConnection("todos");

// If user from Pending Todos Requests to delete a todo
if(isset($_REQUEST['delete']) && $_REQUEST['delete']!="" ){
    $db->deleteTodo($_REQUEST['delete']);
    echo "Deletion Successfull!";
}
// If user from Pending Todos Requests to update a todo
elseif(isset($_REQUEST['update']) && $_REQUEST['update']!="" ){
    $db->updateTodo($_REQUEST['update'],$_REQUEST['data']);
    echo "Updated Successfully!";
}
// If user from Pending Todos Requests to update a todo
elseif(isset($_REQUEST['done']) && $_REQUEST['done']!="" ){
    $db->doneTodo($_REQUEST['done']);
    echo "Successfully added to Done Todos!";
}
// If user access this page from any other ways 
else{
    echo 'Updation Failed'; 
}
?>