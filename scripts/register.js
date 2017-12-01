$(function() {
    //----- OPEN
    $('[data-popup-register-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-register-open');
        $('[data-popup-register="' + targeted_popup_class + '"]').fadeIn(1000);

        e.preventDefault();
    });

    //----- CLOSE
    $('[data-popup-register-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-register-close');
        $('[data-popup-register="' + targeted_popup_class + '"]').fadeOut(1000);

        e.preventDefault();
    });
});
