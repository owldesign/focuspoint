$ ->
  $('#info').on 'click', (e) ->
    if !$(this).hasClass 'active'
      $(this).addClass 'active'

  $('body').on 'click', ('.close-info'), (e) ->
    $('#info').removeClass 'active'