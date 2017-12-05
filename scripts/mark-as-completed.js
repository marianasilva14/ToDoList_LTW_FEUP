$(function() {
    //----- OPEN
    $('[data-popup-markTask-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-markTask-open');
        $('[data-popup-markTask="' + targeted_popup_class + '"]').fadeIn(1000);

        e.preventDefault();
    });

    //----- CLOSE
    $('[data-popup-close-markTask]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close-markTask');
        $('[data-popup-markTask="' + targeted_popup_class + '"]').fadeOut(1000);

        e.preventDefault();
    });
});