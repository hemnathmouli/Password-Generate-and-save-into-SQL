$(document).ready(function(){
    $("#genrate").click(function(){
        $.get('passes.php',{gen:''},function(data){
            $("#genpass").val(data);
        });
    }).preventDefault;
});
