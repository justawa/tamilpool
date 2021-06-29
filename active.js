<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$('#open-close-toggle').on("click", function(){
var $arrows = $(this).find("img");
$('#activity').slideToggle(function(){
    $arrows.toggle();
});
});

</script>
