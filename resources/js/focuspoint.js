
// Gets focus point coordinates from an image - adapt to suit your needs.

(function($) {
  $(document).ready(function() {
    
    var defaultImage;
    var $dataAttrInput;
    var $cssAttrInput;
    var $focusPointContainers;
    var $focusPointImages;
    var $helperToolImage;
    var focusPointAttr = {
        x: 0,
        y: 0,
        w: 0,
        h: 0
      }; 

    (function() {
      $dataAttrInput = $('.helper-tool-data-attr');
      $cssAttrInput = $('.focuspointCss3Background');
      $helperToolImage = $('.helper-tool-img');

      console.log($cssAttrInput.val());

      $('.reticle').css({ 
        'top': '27%',
        'left': '81%'
      });
    })();
    
    $(document).on('click', '.target-overlay', function(e) {
      var imageW = $(this).width();
      var imageH = $(this).height();
      
      //Calculate FocusPoint coordinates
      var offsetX = e.pageX - $(this).offset().left;
      var offsetY = e.pageY - $(this).offset().top;
      var focusX = (offsetX/imageW - .5)*2;
      var focusY = (offsetY/imageH - .5)*-2;
      focusPointAttr.x = focusX;
      focusPointAttr.y = focusY;

      //Calculate CSS Percentages
      var percentageX = (offsetX/imageW)*100;
      var percentageY = (offsetY/imageH)*100;
      var backgroundPosition = percentageX.toFixed(0) + '% ' + percentageY.toFixed(0) + '%';
      var backgroundPositionCSS = 'background-position: ' + backgroundPosition + ';';
      $('.focuspointCss3Background').val(backgroundPositionCSS);

      //Leave a sweet target reticle at the focus point.
      $('.reticle').css({ 
        'top':percentageY+'%',
        'left':percentageX+'%'
      });
    });
    
    
  });
}(jQuery));