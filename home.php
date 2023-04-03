<script>
    $(document).ready(function () {

        $('#add-todo-btn').click(function () {
            $content = $('#content').val();
            // Checks if filled todo is not empty. 
            if($content!=""){

                $.post("addTodo.php?add=TRUE", { data: $content }, function (r, s) {
                    alert(r);
                });
            }
            else{
                alert("Please fill the todo");
            }
        });

    });
</script>
<!-- Todo Creation Section -->
<div class="container fd-row home-div">
        <div class="create fd-row sp-bw">
            <img class="user_image" src="Public/user.jpeg" alt="">
            <textarea name="content" id="content"></textarea>
            <button id="add-todo-btn" class="add-todo-btn">Add</button>
        </div>
</div>