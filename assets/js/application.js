var App,
  bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

App = (function() {
  function App() {
    this.init = bind(this.init, this);
  }

  App.prototype.init = function() {
    var styles;
    styles = ["display: block", "background: #f7cd81", "color: white", "padding: 20px 20px 20px 20px", "text-align: center", "font-weight: normal", "font-size: 20px", "line-height: 60px"].join(';');
    console.log('%c Nutshell!', styles, 'Has loaded.');
    return console.log('Happy Coding!');
  };

  return App;

})();

$(function() {
  var Application;
  Application = new App();
  return Application.init();
});
