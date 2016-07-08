![image](http://od-github.s3.amazonaws.com/nutshell-logo.png)

[![image](https://img.shields.io/badge/version-0.0.1-brightgreen.svg)](https://github.com/owldesign/Nutshell)
[![image](https://img.shields.io/packagist/v/owldesign/nutshell.svg)](https://packagist.org/packages/owldesign/nutshell)
[![image](https://img.shields.io/github/license/mashape/apistatus.svg)](http://opensource.org/licenses/MIT)

***

Nutshell is a front-end HTML5 starter. Development is automated using GRUNT to compile SCSS and CoffeeScript files.

<b>Whats inside:</b>
* GRUNT
* SCSS
* CoffeeScript

***

<b>Usage:</b>

* Clone the repo, go to your project directory and run ```npm install```. This will install all the GRUNT dependencies.
* In your terminal run ```grunt``` to compile your SCSS and CoffeeScript files.
* Open the project in your favorite editor and you are set to go!

***

<b>Development Assets</b><br />
You will find all the appropriate development files inside ```dev``` folder. For styles look inside ```scss``` folder. Everything is broken into different files and are imported into ```application.scss```. If you need to add javascript code pop open ```coffee/application.coffee``` file.

<b>JavaScript Libraries</b>
* If you have 3rd party JavaScript libraries you want to use, you should minify and paste the code into ```app/js/plugins.js```. Place other files into ```app/js/lib``` directory and update your ```app/index.html``` file.

<b>CSS Libraries</b>
* If you're using some type of JavaScript library that has default/required CSS styles. You can drop that into ```app/css/plugins.css```.

***

<b>Production Assets</b><br />
All production files are located in the ```app``` directory. Upload all the contents inside the ```app``` directory to your webhost.

***

### Happy Coding