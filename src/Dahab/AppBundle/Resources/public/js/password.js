/**
 * @author Mohamed Ragab Dahab <eng.mohamed.dahab@gmail.com>
 */
Password = {
    // acts like class constructor
    init: function () {

    },
    //check if a password is valid or not for a given rules
    check: function () {
        $('.passwordCheck').click(function (e) {

            //currenct selector object
            var _this = $(this);

            //stop the default behavior of <a>
            e.preventDefault();

            //password under check
            var password = $(_this).attr('data-password');

            //ajax request to call the password checker function from the password service class
            $.ajax({
                url: Routing.generate('password-check'),
                data: {password: password},
                type: 'post',
                success: function (data) {
                    //update the DOM with the response validation message
                    $(_this).parent().next().children('.message').text(data.message);
                }
            });

        });
    }
}

//initialize the password class
$(document).ready(function () {
    //class check function
    Password.check();
});