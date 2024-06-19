
$(document).ready(function () {

    $('.navbar').fadeIn(500);

    $('.navbar-brand').hover(
        function () {

            $(this).css('color', 'white');
        },
    );

    $('.nav-link').hover(
        function () {

            $(this).css('color', '#c7b474');
        },
        function () {

            $(this).css('color', 'white');
        }
    );
    $(document).ready(function () {

        $('.fade-in-image').css('opacity', '1');
    });
});
