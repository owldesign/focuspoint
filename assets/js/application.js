$(function() {
  $('#info').on('click', function(e) {
    if (!$(this).hasClass('active')) {
      return $(this).addClass('active');
    }
  });
  return $('body').on('click', '.close-info', function(e) {
    return $('#info').removeClass('active');
  });
});
