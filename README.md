![Screenshot](resources/screenshots/plugin_logo.png)

Focuspoint lets you select a focal point of an image asset. 


## Usage Example

Create a field using `Focuspoint` Field Type. Attached that field to your Field Layout in the Asset Sources.


Here is what you have access to:

* `image.[fieldHandleName].inline` 
	* data-focus-x="0.5" data-focus-y="-0.1" data-focus-w="600" data-focus-h="400"
* `image.[fieldHandleName].background` 
	* 50% 50%
* `image.[fieldHandleName].positionX`
	* 50% 
* `image.[fieldHandleName].positionY`
	* 50% 

`[fieldHandleName]` - repace this with Focuspoint field handle name.


##### For css background positions

```
 {% set image = entry.image.first() %}
 <div style="background-position: {{ image.[fieldHandleName].background }};"></div>

```

##### For inline images using data attributes

```
{% set image = entry.image.first() %}
 <div {{ image.[fieldHandleName].inline |raw }}>
	<img src="{{ image.getUrl('large') }}">
 </div>
```

##### Using with Imager plugin

```
{% set image = entry.image.first() %}
{% set transformedImage = craft.imager.transformImage(image, {
    width: 800,
    mode: 'crop',
    position: image.[fieldHandleName].background
}) %}
<img src="{{ transformedImage.url }}">
```