$(function() {

    //autocomplete
    $("#auto").autocomplete({
        source: "index.php?controleur=Avion_types&action=index",
        minLength: 1
        
    });
});