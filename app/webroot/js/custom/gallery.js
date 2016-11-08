$(document).ready(function () {
    Gallery.init();
});


var Gallery = function () {
    var Downloads = function () {
        $('body').on('click', '#getImages', function (e) {
            e.preventDefault();
            $('#faLoad').addClass('fa-spin');
            var offset = $('.fancy').length;
            var data = {
                offset:offset
            }
            HandleAjax(data);
        });

        $('body').on('click', '.fancy', function () {
            var data = {
                id:$(this).attr('id')
            };
            HandleAlbumAjax(data);
        })
    }

    var HandleAjax = function (data) {
        $.ajax({
            url: '/ajax/gallery/',
            type: "POST",
            // dataType: 'json',
            data: $.param(data),
            success: function(response){
                $('#upImages').append(response);
                $('#faLoad').removeClass('fa-spin');
                if(response.length == 8){
                    $('#getImages').css('display', 'none');
                }
            }
        });
    }

    var HandleAlbumAjax = function (data) {
        $.ajax({
            url: '/ajax/album/',
            type: "POST",
            // dataType: 'json',
            data: $.param(data),
            success: function(response){
                $('.upImg .gallery-box').html(response);
                console.log(response);
                // setTimeout(function () {
                    $('.gallery-slider2').cycle('destroy');
                    $('.gallery-slider2').cycle();
                // }, 500)
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