jQuery(document).ready(function(){
  Products.init();
});

var Products = function () {

    var productEdit = function () {
        $(function() {
            $("#tabs").tabs();

            $('.wysiwyg').elrte(opts);

            $(document).on('click', '#imageId', function(e) {
                e.preventDefault();
                var thisBtn = $(e.currentTarget);
                $("<div />").dialogelfinder({
                    width: 850,
                    url: '/js/elfinder2/connector.php',
                    commandsOptions: {
                        getfile: {
                            oncomplete: 'destroy' // destroy elFinder after file selection
                        }
                    },
                    getFileCallback: function (url) {
                        $('#imageInput').val(url);
                        thisBtn.attr('src', url);
                    }
                });
            });

            var i = '{{ data.ProductImages[(data.ProductImages | length-1)].id }}';

            $('.listPhotos').sortable({
                update: function(){
                    $('.listPhotos li').each(function(index){
                        $(this).find('.hidden-priority').val(index);
                    });
                }
            });

            $(document).on('click', '#uploadImage', function() {
                var a = $(this);

                $("<div />").dialogelfinder({
                    width: 850,
                    url: '/js/elfinder2/connector.php',
                    commandsOptions: {
                        getfile: {
                            oncomplete: 'destroy' // destroy elFinder after file selection
                        }
                    },

                    getFileCallback: function (url) {

                        $('.listPhotos').html('' +
                            '<li class="clearfix imageBlock">' +
                            '<div class="dottedFrame" style="position: relative">'+
                            '<span><img src="'+ url +'" width="200px" height="200px"></span>' +
                            '<input type="hidden" name="Product[image]" value="'+ url +'">' +
                            '</div>'+
                            '</li>');

                        showSuccess('Image uploaded successfully', 500);
                    }
                });
            });

            $(document).on('click', '#subUploadImage', function() {
                var a = $(this);

                $("<div />").dialogelfinder({
                    width: 850,
                    url: '/js/elfinder2/connector.php',
                    commandsOptions: {
                        getfile: {
                            oncomplete: 'destroy' // destroy elFinder after file selection
                        }
                    },

                    getFileCallback: function (url) {

                        $('.subListPhotos').html('' +
                            '<li class="clearfix imageBlock">' +
                            '<div class="dottedFrame" style="position: relative">'+
                            '<span><img src="'+ url +'" width="200px" height="200px"></span>' +
                            '<input type="hidden" name="Product[sub_img]" value="'+ url +'">' +
                            '</div>'+
                            '</li>');

                        showSuccess('Image uploaded successfully', 500);
                    }
                });
            });

            $(document).on('click', '.remove-img', function(e) {
                e.preventDefault();
                $(this).parents('.imageBlock').remove();
            });

        });
    }
    var imagesUpload = function(){

        $(function() {
            $("#tabs").tabs();
            $("#imageTabs").tabs();

            $('.wysiwyg').elrte(opts);

            $(document).on('click', '#imageId', function(e) {
                e.preventDefault();
                var thisBtn = $(e.currentTarget);
                $("<div />").dialogelfinder({
                    width: 850,
                    url: '/js/elfinder2/connector.php',
                    commandsOptions: {
                        getfile: {
                            oncomplete: 'destroy' // destroy elFinder after file selection
                        }
                    },
                    getFileCallback: function (url) {
                        $('#imageInput').val(url);
                        thisBtn.attr('src', url);
                    }
                });
            });

            var i = '{{ data.ProductImages[(data.ProductImages | length-1)].id }}';

            $('.listPhotos').sortable({
                update: function(){
                    $('.listPhotos li').each(function(index){
                        $(this).find('.hidden-priority').val(index);
                    });
                }
            });

            $(document).on('click', '#uploadImage', function() {
                var a = $(this);

                $("<div />").dialogelfinder({
                    width: 850,
                    url: '/js/elfinder2/connector.php',
                    commandsOptions: {
                        getfile: {
                            oncomplete: 'destroy' // destroy elFinder after file selection
                        }
                    },

                    getFileCallback: function (url) {

                        $('.listPhotos').html('' +
                            '<li class="clearfix imageBlock">' +
                            '<div class="dottedFrame" style="position: relative">'+
                            '<span><img src="'+ url +'" width="200px" height="200px"></span>' +
                            '<input type="hidden" name="Product[image]" value="'+ url +'">' +
                            '</div>'+
                            '</li>');

                        showSuccess('Image uploaded successfully', 500);
                    }
                });
            });

            $(document).on('click', '#subUploadImage', function() {
                var a = $(this);

                $("<div />").dialogelfinder({
                    width: 850,
                    url: '/js/elfinder2/connector.php',
                    commandsOptions: {
                        getfile: {
                            oncomplete: 'destroy' // destroy elFinder after file selection
                        }
                    },

                    getFileCallback: function (url) {

                        $('.subListPhotos').html('' +
                            '<li class="clearfix imageBlock">' +
                            '<div class="dottedFrame" style="position: relative">'+
                            '<span><img src="'+ url +'"  width="200px" height="200px"></span>' +
                            '<input type="hidden" name="Product[sub_img]" value="'+ url +'">' +
                            '</div>'+
                            '</li>');

                        showSuccess('Image uploaded successfully', 500);
                    }
                });
            });

            $(document).on('click', '.remove-img', function(e) {
                e.preventDefault();
                $(this).parents('.imageBlock').remove();
            });

        });
    }


    var oneImage = function () {
        //1
        $(document).on('click', '#one', function() {
            var a = $(this);

            $("<div />").dialogelfinder({
                width: 850,
                url: '/js/elfinder2/connector.php',
                commandsOptions: {
                    getfile: {
                        oncomplete: 'destroy' // destroy elFinder after file selection
                    }
                },

                getFileCallback: function (url) {

                    $('.firstList').html('' +
                        '<li class="clearfix imageBlock">' +
                        '<div class="dottedFrame" style="position: relative">'+
                        '<span><img src="'+ url +'"  width="200px" height="200px"></span>' +
                        '<input type="hidden" name="ProductImage[0][img]" value="'+ url +'">' +
                        '</div>'+
                        '</li>');

                    showSuccess('Image uploaded successfully', 500);
                }
            });
        });
        //2
        $(document).on('click', '#sub_one', function() {
            var a = $(this);

            $("<div />").dialogelfinder({
                width: 850,
                url: '/js/elfinder2/connector.php',
                commandsOptions: {
                    getfile: {
                        oncomplete: 'destroy' // destroy elFinder after file selection
                    }
                },

                getFileCallback: function (url) {

                    $('.subFirstList').html('' +
                        '<li class="clearfix imageBlock">' +
                        '<div class="dottedFrame" style="position: relative">'+
                        '<span><img src="'+ url +'"  width="200px" height="200px"></span>' +
                        '<input type="hidden" name="ProductImage[0][sub_img]" value="'+ url +'">' +
                        '</div>'+
                        '</li>');

                    showSuccess('Image uploaded successfully', 500);
                }
            });
        });
    };

    var secondImage = function () {
        //1
        $(document).on('click', '#secondUp', function() {
            var a = $(this);

            $("<div />").dialogelfinder({
                width: 850,
                url: '/js/elfinder2/connector.php',
                commandsOptions: {
                    getfile: {
                        oncomplete: 'destroy' // destroy elFinder after file selection
                    }
                },

                getFileCallback: function (url) {

                    $('.secondList').html('' +
                        '<li class="clearfix imageBlock">' +
                        '<div class="dottedFrame" style="position: relative">'+
                        '<span><img src="'+ url +'"  width="200px" height="200px"></span>' +
                        '<input type="hidden" name="ProductImage[1][img]" value="'+ url +'">' +
                        '</div>'+
                        '</li>');

                    showSuccess('Image uploaded successfully', 500);
                }
            });
        });
        //2
        $(document).on('click', '#subSecondUp', function() {
            var a = $(this);

            $("<div />").dialogelfinder({
                width: 850,
                url: '/js/elfinder2/connector.php',
                commandsOptions: {
                    getfile: {
                        oncomplete: 'destroy' // destroy elFinder after file selection
                    }
                },

                getFileCallback: function (url) {

                    $('.subSecondList').html('' +
                        '<li class="clearfix imageBlock">' +
                        '<div class="dottedFrame" style="position: relative">'+
                        '<span><img src="'+ url +'"  width="200px" height="200px"></span>' +
                        '<input type="hidden" name="ProductImage[1][sub_img]" value="'+ url +'">' +
                        '</div>'+
                        '</li>');

                    showSuccess('Image uploaded successfully', 500);
                }
            });
        });
    };


    var thirdImage = function () {
        //1
        $(document).on('click', '#thirdUp', function() {
            var a = $(this);

            $("<div />").dialogelfinder({
                width: 850,
                url: '/js/elfinder2/connector.php',
                commandsOptions: {
                    getfile: {
                        oncomplete: 'destroy' // destroy elFinder after file selection
                    }
                },

                getFileCallback: function (url) {

                    $('.thirdList').html('' +
                        '<li class="clearfix imageBlock">' +
                        '<div class="dottedFrame" style="position: relative">'+
                        '<span><img src="'+ url +'"  width="200px" height="200px"></span>' +
                        '<input type="hidden" name="ProductImage[2][img]" value="'+ url +'">' +
                        '</div>'+
                        '</li>');

                    showSuccess('Image uploaded successfully', 500);
                }
            });
        });
        //2
        $(document).on('click', '#subThirdUp', function() {
            var a = $(this);

            $("<div />").dialogelfinder({
                width: 850,
                url: '/js/elfinder2/connector.php',
                commandsOptions: {
                    getfile: {
                        oncomplete: 'destroy' // destroy elFinder after file selection
                    }
                },

                getFileCallback: function (url) {

                    $('.subThirdList').html('' +
                        '<li class="clearfix imageBlock">' +
                        '<div class="dottedFrame" style="position: relative">'+
                        '<span><img src="'+ url +'"  width="200px" height="200px"></span>' +
                        '<input type="hidden" name="ProductImage[2][sub_img]" value="'+ url +'">' +
                        '</div>'+
                        '</li>');

                    showSuccess('Image uploaded successfully', 500);
                }
            });
        });
    };

    var Palette = function () {

        $('#paletteTabs').tabs();
    }

    return {
        //main function to initiate the module
        init: function () {
            productEdit();
            imagesUpload();
            oneImage();
            secondImage();
            thirdImage();
            Palette();
        }

    };
}();