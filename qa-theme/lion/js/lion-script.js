$(document).ready(function () {

    $("table").wrap("<div style='overflow-x: auto'></div>");

    /********************************
     * login modal script
     *******************************/

    if ($('.auth').length) {

        $('.auth i').click(function (event) {
            $('.auth').toggleClass('auth-active');
            $('.qa-auth-box').toggle();
            if ($(this).text() === 'power_settings_new') {
                $(this).text('clear');
            } else {
                $(this).text('power_settings_new');
            }

            event.preventDefault();
        });
    }

    /********************************
     * search box  script
     *******************************/
    $('.search').click(function () {
        $('.qa-search').slideToggle(100, 'swing');
    });

    $('.close-search').click(function () {
        $('.qa-search').slideToggle(100, 'swing');
    });

    $('.qa-search-field').attr("placeholder", "Search...");


    /********************************
     * qa list items script
     *******************************/
    $('.q-item-meta-data').hide();

    $('.qa-q-item-main .meta-info-btn').click(function () {
        $(this).toggleClass('flip');
        $(this).closest('.qa-q-list-item').find(".q-item-meta-data").slideToggle('fast');
    });

    /********************************
     * qa view items script
     *******************************/

    $('.qa-q-more-buttons').on("click", function (e) {
        e.preventDefault();
        $(this).toggleClass('rotate');

        var id = $(this).attr('data-id');
        $('.qa-q-additional-buttons-model').each(function () {
            if ($(this).attr('id') == id) {
                $(this).slideToggle();
            }
        });
    });

});