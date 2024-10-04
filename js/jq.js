$(document).ready(function () {
$(".form").submit(function(e){
    e.preventDefault();
    $(".productscontainer").load("ajax.php",{val:$(this).find("input").val()});
});
});