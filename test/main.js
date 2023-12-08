$(document).ready(function(){
    // $("option").each(function(){
    //     console.log($(this).val());
    // });

    $("#select").on("click", function(){
       zz
        let $html = $(`<input type="checkbox" name="checkbox" value="${$(this).val()}" id="checkbox" class="checkbox" checked>`);

        $("#test").append($html);

        $html = $(`<label for="checkbox">${$(this).val()}</label>`);

        $("#test").append($html);

        $(this).find(`#${$(this).val()}`).remove();



        $(".checkbox").on("click", function(){

            $(this).next().remove();
            $(this).remove();
            if(!$("#select").find(`#${$(this).val()}`).length){
                let $html = $(`<option value="${$(this).val()}" id="${$(this).val()}">${$(this).val()}</option>`);
                $("#select").append($html);
            }


        });
    });

    // console.log($("#select").val());
});