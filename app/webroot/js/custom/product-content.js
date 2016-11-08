$(document).ready(function () {
    ProductContent.init();
});


var ProductContent = function () {
    var Get = function () {

        $('body').on('click', '.imageRoom', function () {
            var url = $(this).attr('src'),
                title = $(this).attr('data-name');
            $('#laminateImageFinish').attr('src', url);
            $('#laminateTextFinish').text(title);
        })

        $('body').on('click', '.imageRoomFinishes', function () {
            var url = $(this).attr('src'),
                title = $(this).attr('data-name');
            $('#finishesImageFinish').attr('src', url);
            $('#finishesTextFinish').text(title);
        })

        $('body').on('click', '.imageRoomMatch', function () {
            var url = $(this).attr('src'),
                title = $(this).attr('data-name');
            $('#matchImageFinish').attr('src', url);
            $('#matchTextFinish').text(title);
        })

        $('body').on('click', '.categorylamin', function (e) {
            e.preventDefault();
            var nameCat = $(this).html();
            $('.'+nameCat).css('display','none');

        })

    }

    return {
        //main function to initiate the module
        init: function () {
            Get();
        }
    };
}();


function getLaminate(id){
    $('.select-area span').hide();
    $('[data-cat=' + id + ']').show();
}

function getShow() {
    $('.select-area span').show();

}