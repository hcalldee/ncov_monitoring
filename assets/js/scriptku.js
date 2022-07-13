$(function () {
    $('#image').on('change', function () {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })

    // animasi
    $('.page-scroll').on('click', function (e) {
        var href = $(this).attr('href');
        var elemenHref = $(href);
        $('html').animate({
            scrollTop: elemenHref.offset().top
        }, 2000, 'easeInOutExpo')   //animasi dari atas sampai tujuan (elemenherf)
        e.preventDefault();
    });

    // ===
    //choosen dropdown
    $('#role').chosen();




});