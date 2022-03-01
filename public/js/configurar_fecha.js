$(document).ready(function() {
    
    $(".calendario2").attr("disabled","disabled")
    $(".calendario1").on("change",function()
    {
        $(".calendario2").removeAttr("disabled");
        $(".calendario2").text("");
        $(".calendario2").datepicker({minDate:$(".calendario1").val()}).datepicker({minDate:"+1D"});
        
    })
    $(".calendario1").datepicker({minDate:0});
});





