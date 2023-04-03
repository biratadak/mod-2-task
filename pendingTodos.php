<script>
    
    
    $(document).ready(function () {
            $('.delete-btn').click(function () {
            $option = $(this).attr('id').split('-')[0];
            $id = $(this).attr('id').split('-')[1];
            $.post("updateTodo.php?delete="+$id,function(r){
                alert(r);
                $('table').load("getTodos.php");
            });
            console.log("delete btn")
        });
        $('.edit-btn').click(function () {
            $hidden=$(this).parent().parent().children('.todo-edit');
            $hidden.slideToggle();
        })
        $('.update-btn').click(function(){
            $id=$(this).parent().parent().attr('id').split('-')[1];
            $data=$(this).parent().children('input').val();
            if($data!=""){
                
                $.post("updateTodo.php?update="+$id,{data:$data},function(r){
                    alert(r);
                    $('table').load("getTodos.php");
                });
            }
            else
            alert("Data should not be empty");
        });
        $('.done-btn').click(function(){
            $id=$(this).parent().parent().attr('id').split('-')[1];
            $.post("updateTodo.php?done="+$id,function (r) {
                alert(r);
                $('table').load("getTodos.php");
            });
        });
    });
    
</script>

<h4>Pending Todos</h4>
<table class="pending-todos fd-col">
<thead>
    <tr class="sp-ev">
        <th>status</th>
        <th>Todo</th>
        <th>Created on</th>
        <th>Options</th>
    </tr>
</thead>
<?php
require('getTodos.php');
?>
</table>
