$(function () {
    $('.svgObject').click(function (event) {
        $('.svgObject').attr("class", 'svgObject');

        $(this).attr("class", $(this).attr("class") + ' active');

        $('.tab').addClass('invisible');
        $('#' + $(this).data('target')).removeClass('invisible');
    });

    $('#cancelModalBtn').click(function () {
        $('.modalBackground').toggleClass('invisible');
    });
});

