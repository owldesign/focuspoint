class App
  init: =>
    styles = ["display: block","background: #f7cd81","color: white","padding: 20px 20px 20px 20px","text-align: center","font-weight: normal","font-size: 20px","line-height: 60px"].join(';')
    console.log '%c Nutshell!', styles, 'Has loaded.'
    console.log 'Happy Coding!'

$ ->
  Application = new App()
  Application.init()