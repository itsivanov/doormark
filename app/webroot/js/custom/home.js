$(document).ready(function () {
    Laminate.init();
});


var Laminate = function () {
    var Get = function () {
        $('body').on('click', '.crec', function (e) {
            var id = $(this).attr('id');
            var data = {
                id:id
            }
            HandleAjax(data);
        });

    }

    var HandleAjax = function (data) {
        $.ajax({
            url: '/ajax/laminate/',
            type: "POST",
            // dataType: 'json',
            data: $.param(data),
            success: function(response){
                $('#laminate').html(response);
            }
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            Get();
        }
    };
}();