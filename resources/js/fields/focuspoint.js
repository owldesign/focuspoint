
(function($){

Craft.FocuspointInput = Garnish.Base.extend(
{
  id: null,
  name: null,
  fieldId: null,
  elementId: null,
  $field: null,
  $spinner: null,

  init: function(id, name, fieldId, elementId)
  {
    // ----------------------------------
    // GET IMAGE ASSET
    // ----------------------------------
    that = this;
    this.id = id;
    this.name = name;
    this.fieldId = fieldId;
    this.elementId = elementId;
    this.$field = $('#'+id+'-field');
    this.$spinner = this.$field.find('.spinner');
    this.$spinner.removeClass('hidden');

    var params = {
      fieldId: this.fieldId,
      elementId: this.elementId
    };

    Craft.postActionRequest('focuspoint/getDefaultValues', params, $.proxy(function(response, textStatus)
    {
      var fieldHandle = response.field.model.handle;
      if (response.element[fieldHandle]) {
        var positionX = response.element[fieldHandle].positionX;
        var positionY = response.element[fieldHandle].positionY;
      } else {
        var positionX = '50%';
        var positionY = '50%';
      }
      
      $('.reticle').css({ 
        'top': positionY,
        'left': positionX
      });

      this.$field.find('.helper-tool-img').attr('src', response.image);
      this.$field.find('.target-overlay').attr('src', response.image);
      this.$spinner.addClass('hidden');
    }, this));
    // ----------------------------------


    // ----------------------------------
    // IMAGE POSITION
    // ----------------------------------
    $('.target-overlay').on('click', function(e){


      var focuspointData = {
        focuspointAttr: {
          x: 0,
          y: 0,
          w: 0,
          h: 0
        },
        focuspointPercentage: {
          top: 0,
          left: 0
        },
        element: {
          fieldName: that.name,
          fieldId: that.fieldId,
          elementId: that.elementId
        }
      };

      var theImage = new Image();
      theImage.src = $(this).attr("src");
      var originalImageW = theImage.width;
      var originalImageH = theImage.height;

      var imageW = $(this).width();
      var imageH = $(this).height();


      //Calculate FocusPoint coordinates
      var offsetX = e.pageX - $(this).offset().left;
      var offsetY = e.pageY - $(this).offset().top;
      var focusX = (offsetX/imageW - .5)*2;
      var focusY = (offsetY/imageH - .5)*-2;

      focuspointData.focuspointAttr.x = focusX;
      focuspointData.focuspointAttr.y = focusY;
      focuspointData.focuspointAttr.w = originalImageW;  
      focuspointData.focuspointAttr.h = originalImageH;

      //Calculate CSS Percentages
      var percentageX = (offsetX/imageW)*100;
      var percentageY = (offsetY/imageH)*100;
      focuspointData.focuspointPercentage.top = percentageY.toFixed(0)+'%';
      focuspointData.focuspointPercentage.left = percentageX.toFixed(0)+'%';

      //Leave a sweet target reticle at the focus point.
      $('.reticle').css({ 
        'left':percentageX+'%',
        'top':percentageY+'%'
      });

      // Save Asset Positions
      Craft.postActionRequest('focuspoint/savePosition', focuspointData, $.proxy(function(response, textStatus)
      {

      }, that));
    });
    // ----------------------------------

  }
});

})(jQuery);