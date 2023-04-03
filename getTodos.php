<?php
require("class/DbConnection.php");
$db = new DbConnection("todos");

if (!isset($_REQUEST['done'])) {

    //Pending Todos section
    foreach ($db->getAllTodos() as $row) {
        if ($row['status'] == 0)
            echo '<tr id="todo-' . $row['id'] . '" class="todo sp-bw">
        <td class="todo-stat"><button class="done-btn">Done</button></td>
        <td class="todo-content">' . $row['todo_content'] . '</td>
        <td class="todo-edit hide fd-row"><input type="text"><button class="update-btn">Update</button></td>
        <td class="todo-date">' . $row['created'] . '</td>
        <td class="todo-options">
        <button class="edit-btn" id="edit-' . $row['id'] . '">Edit</button>
        <button class="delete-btn" id="delete-' . $row['id'] . '">Delete</button>
        </td>
        </tr>
        ';
    }
} else {
    //Done Todos section
    echo '<thead>
    <tr class="sp-bw">
        <th>Todo</th>
        <th>Created on</th>
    </tr>
</thead>';
    foreach ($db->getAllTodos() as $row) {
        if ($row['status'] == 1)
            echo '<tr id="todo-' . $row['id'] . '" class="todo sp-bw">
        <td class="todo-content"><s>' . $row['todo_content'] . '</s></td>
        <td class="todo-date">' . $row['created'] . '</td>        </tr>
        ';
    }
}

?>