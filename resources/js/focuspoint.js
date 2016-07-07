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
      $dataAttrInput = $('.focuspointBackground');
      $cssAttrInput = $('.focuspointBackground');
      $helperToolImage = $('.helper-tool-img');
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
      focusPointAttr.w = $(this).width();  
      focusPointAttr.h = $(this).height();

      //Calculate CSS Percentages
      var percentageX = (offsetX/imageW)*100;
      var percentageY = (offsetY/imageH)*100;
      var backgroundPosition = percentageX.toFixed(0) + '% ' + percentageY.toFixed(0) + '%';
      var backgroundPositionCSS = 'background-position: ' + backgroundPosition + ';';
      $('.focuspointBackground').val(backgroundPositionCSS);

      //Calculate JS Data Attributes
      // var inlinePositionJs = 'background-position: ' + backgroundPosition + ';';
      // $('.focuspointJsInline').val(inlinePositionJs);
      printDataAttr();
      // $focusPointContainers.attr({
      //   'data-focus-x':focusPointAttr.x,
      //   'data-focus-y':focusPointAttr.y,
      //   'data-image-w': focusPointAttrW,
      //   'data-image-h': focusPointAttrH
      // });

      //Leave a sweet target reticle at the focus point.
      $('.reticle').css({ 
        'top':percentageY+'%',
        'left':percentageX+'%'
      });
    });

    function printDataAttr(){
      $('.focuspointBackground').val('data-focus-x="'+focusPointAttr.x.toFixed(2)+'" data-focus-y="'+focusPointAttr.y.toFixed(2)+'" data-focus-w="'+focusPointAttr.w+'" data-focus-h="'+focusPointAttr.h+'"');
    }

  });
}(jQuery));