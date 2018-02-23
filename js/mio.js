$(function(){
    $(".ficha .btn-primary").on("click",function(e){
        e.preventDefault();
        var id=$(this).data("id");
        var $capaBici=$("#"+id);
        console.log($capaBici.find("h2").text());
        $("#bici").val($capaBici.find("h2").text());
    })

    $(".ficha img").on("click",function(e){
        $("#fotoBiciGrande")
            .empty()
            .append("<img src='"+$(this).attr("src")+"' alt='Bici'>");
        $("#imagenGrande").fadeIn(1000);
    });

    $("#imagenGrande").on("click",function(e){
        $(this).fadeOut(1000);
    })




});