<script>
$(document).ready(function(){
    
    /**
     * Routes the pages using AJAX
     * 
     */
        
    $('.main').load("View/home.php")
    $('.nav-link').click(function(e){
        e.preventDefault();
        $('.main').load("View/"+$(this).attr("href")+".php");
        
    });

});
</script>
<div class="main">
</div>