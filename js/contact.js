$(function () {

    $('#contact-form').validator();


    // when the form is submitted
    $('#contact-form').on('submit', function (e) {

        // if the validator does not prevent form submit
        if (!e.isDefaultPrevented()) {
            var url = "listings-ajax.php";

            // POST values in the background of the script URL
            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                headers: {
                    "cache-control": "no-cache"
                },
                success: function (data)
                {
                    // data = JSON object that listing.php returns

                    // we recieve the type of the message: success x danger and apply it to the 
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;

                    // let's compose Bootstrap alert box HTML
                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    
                    // If we have messageAlert and messageText
                    if (messageAlert && messageText) {
                        // inject the alert to .messages div in our form
                        $('#contact-form').find('.messages').html(alertBox);

                        if (data.type === "success") {
                            // empty the form
                            $('#contact-form')[0].reset();
                            $('#mlsNumber-errors').empty();

                        } else if (data.type === "mlsunique") {
                            $('#mlsNumber-errors').html("MLS number is not unique.");
                        }

                    }
                }
            });
            return false;
        }
    })
});