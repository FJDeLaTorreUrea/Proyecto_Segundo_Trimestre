$(document).ready(function()
{
    $("#modalVideo").modal("hide");
    $("#muestra_video").on("click",function()
    {
        $("#modalVideo").modal("show");
        $("#video_de_hotel").get(0).currentTime=0;
    })


    $("#cierra_modal").on("click",function()
    {
        $("#video_de_hotel").get(0).pause();
        $("#modalVideo").modal("hide");
    })
})