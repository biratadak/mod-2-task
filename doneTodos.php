<script>
    $(document).ready(function () {
        // When page is ready fetch all mark done todos.  
        $('table').load("getTodos.php?done")
    });

</script>

<h4>Done Todos</h4>
<table class="pending-todos fd-col">

    <!-- Table to show mark done todos -->
</table>