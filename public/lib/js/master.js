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
    $(document).on('submit', '#loginForm', function()
    {
        $.ajax({
            type: "POST",
            url: window.location.href.toString(),
            data: $("#loginForm").serialize(),
            dataType: "json",
            success: function() {
                console.log("Success");
            }
        }).always(function() {
            $("#msgBag").load(window.location.href.toString() + " #msgBag"); //todo animation?
        }).fail(function() {
            alert("Ajax Error, please contact Website owner!");
        });

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