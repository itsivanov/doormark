$(document).ready(function () {
    Door.init();
});


var Door = function () {
    var Downloads = function () {
        $('body').on('click', '#getCategory', function (e) {
            e.preventDefault();
            $('#faLoad').addClass('fa-spin');
            var offset = $('.countCat').length;
            var data = {
                offset:offset
            }
            HandleAjax(data);
        });
    }

    var HandleAjax = function (data) {
        $.ajax({
            url: '/ajax/door/',
            type: "POST",
            // dataType: 'json',
            data: $.param(data),
            success: function(response){
                $('#upCategories').append(response);
                $('#faLoad').removeClass('fa-spin');
                console.log(response.length);
                if(response.length == 8){
                    $('#getCategory').css('display', 'none');
                }
            }
        });
    }


    return {
        //main function to initiate the module
        init: function () {
            Downloads();
        }
    };
}();