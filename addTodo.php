<?php
require("class/DbConnection.php");
// Initialising Database class object
$db = new DbConnection("todos");

/**
 * If add parameter is passed from Home then add the data into Database using DbConnection Class object.
 * 
 */
if (isset($_REQUEST['add']) && $_REQUEST['add'] == "TRUE") {
    if ($_REQUEST['data'] != "") {
        $content = nl2br(htmlspecialchars($_REQUEST['data'], ENT_QUOTES));
        $db->addTodos($content);
        echo "Todo added successfully!";
    } else {
        echo "Todo should not be empty";
    }
}

?>