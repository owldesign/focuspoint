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
      this.$field.find('.helper-tool-img').attr('src', response.image);
      this.$field.find('.target-overlay').attr('src', response.image);
      this.$spinner.addClass('hidden');
    }, this));
  }
});

})(jQuery);