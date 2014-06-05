$(document).ready(function()
{
    var $loading = $('#loadingImg').hide();
    $(document)
        .ajaxStart(function () {
            $loading.show();
        })
        .ajaxStop(function () {
            $loading.hide();
        });

    // if click on submit in the form with id loginForm
    $(document).on('submit', '.form', function()
    {
        $.ajax({
            type: "POST",
            url: window.location.href.toString(),
            data: $(".form").serialize(),
            dataType: "json",
            success: function() {
                console.log("Success");
            }
        }).done(function(result) {
            if (result.url != null) {
                window.location.href = result.url;
            } else {
                $("#msgBag").load(window.location.href.toString() + " #msgBag");
            }
        });

        /*
         .always(function() {
         $("#msgBag").load(window.location.href.toString() + " #msgBag"); //todo animation?
         })
         .fail(function() {
            alert("Ajax Error, please contact Website owner!");
         })
        */

        //function(result) - if in controller - return Response::json(array('logged' => false));
        /*.done(function(result)
        {
            console.log("Result");
            $("#msgBag").load(window.location.href.toString() + " #msgBag");
        });*/

        // so we stay on our page
        return false;
    });
});