$(function() {
    //----- OPEN
    $('[data-popup-addTask-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-addTask-open');
        $('[data-popup-addTask="' + targeted_popup_class + '"]').fadeIn(1000);

        e.preventDefault();
    });

    //----- CLOSE
    $('[data-popup-close-addTask]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close-addTask');
        $('[data-popup-addTask="' + targeted_popup_class + '"]').fadeOut(1000);

        e.preventDefault();
    });
});

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function dropdownfunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
