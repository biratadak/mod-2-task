All Todos
<script>
    $(document).ready(function () {

        $('.todo-option').click(function () {
            $id = $(this).val();
            $option=$(this).attr('id').split('-')[0];
            $id=$(this).attr('id').split('-')[1];
            
            $.post("../Model/addTodo.php?"+$option+"="+$id,function(r,s){
                console.log(r,s);
            });
        });

    });

</script>
<table class="todos fd-col">
    <?php
    require("../Model/getTodos.php");
    ?>
</table>