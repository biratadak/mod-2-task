
<?php
require("DbConnection.php");
$db= new DbConnection("todos");

                        
            foreach ($db->getAllTodos() as $row) {
                echo '<tr id="todo-'.$row['id'].'" class="todo sp-bw">
                <td class="todo-id">'.$row['id'].'</td>
                <td class="todo-content">'.$row['todo_content'].'</td>
                <td class="todo-date">'.$row['created'].'</td>
                <td class="todo-options">
                <button class="todo-option" id="edit-'.$row['id'].'">Edit</button>
                <button class="todo-option" id="delete-'.$row['id'].'">Delete</button>
                </td>
                </tr>
                ';
            }
            ?>