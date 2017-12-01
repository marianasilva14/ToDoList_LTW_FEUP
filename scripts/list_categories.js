function validate(form) {
  var e = form.elements;

  /* Your validation code. */

  if(e['password'].value != e['passwordConfirm'].value) {
    document.getElementById("passwordConfirm").setCustomValidity("Passwords Don't Match");
    return false;
  }
  return true;
}


$(function() {
    //----- OPEN
    $('[data-popup-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-open');
        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

        e.preventDefault();
    });

    //----- CLOSE
    $('[data-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

        e.preventDefault();
    });
});
