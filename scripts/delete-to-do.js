$(function() {
    //----- OPEN
    $('[data-popup-deleteTask-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-deleteTask-open');
        $('[data-popup-deleteTask="' + targeted_popup_class + '"]').fadeIn(1000);

        e.preventDefault();
    });

    //----- CLOSE
    $('[data-popup-close-deleteTask]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close-deleteTask');
        $('[data-popup-deleteTask="' + targeted_popup_class + '"]').fadeOut(1000);

        e.preventDefault();
    });
});
