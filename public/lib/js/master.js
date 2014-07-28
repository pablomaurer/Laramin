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
        console.log("submit pressed, starting ajax request");
        var request = $.ajax({
            type: "POST",
            url: window.location.href.toString(),
            data: $(".form").serialize(),
            dataType: "json",
            success: function() {
                console.log("Success");
            }
        }).done(function(result) {
            if (result.url != null) {
                console.log("redirect cause response in ajax call contains url");
                window.location.href = result.url;
            } else if (result.notification == true) {
                console.log("response in ajax call contains no url, so refresh msgBag");
                $("#msgBag").load(window.location.href.toString() + " #msgBag");
            } else if (result.notification == false) {
                // todo delete this stuff, but find a way to use normal redirect
                console.log("stop ajax, and go ahead with php");
                request.abort();
            }
        });
        // so we stay on our page
        return false;
    });
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