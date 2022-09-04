// When a dropdown is opened
$('#menu-content .collapse').on('show.bs.collapse', function(e) {
    if ($('.menu-content .collapsing').length) {
      e.preventDefault();
      return;
    }
    $(this).prev().addClass('active');
    $('#menu-content .sub-menu').collapse('hide');
  });
  
  // When a dropdown is closed
  $('#menu-content .collapse').on('hide.bs.collapse', function(e) {
    $(this).prev().removeClass('active');
  });