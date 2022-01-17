$(function () {
    $("form").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var body = $("body");

        $.ajax({
            url: form.attr("action"),
            data: form.serialize(),
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                body.addClass("loading");
            },
            success: function (callback) {

                // Imprime a mensagem de callback
                if (callback.message) {
                    var view = '<div class="alert alert-' + callback.message.type + ' alert-dismissible">' + callback.message.msg +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                    $(".form_callback_message").html(view);
                    $(".form_callback_message > .alert").effect("bounce");
                    return;
                }

                // Redireciona para uma determinada URL
                if (callback.redirect) {
                    window.location.href = callback.redirect.url;
                }
            },
            complete: function () {
                body.removeClass("loading");
            }
        });
    });
});