$(function() {
    //----- OPEN
    $('[data-popup-addTask-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-addTask-open');
        $('[data-popup-addTask="' + targeted_popup_class + '"]').fadeIn(1000);

        e.preventDefault();
    });

    //----- CLOSE
    $('[data-popup-addTask-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-addTask-close');
        $('[data-popup-addTask="' + targeted_popup_class + '"]').fadeOut(1000);

        e.preventDefault();
    });
});
