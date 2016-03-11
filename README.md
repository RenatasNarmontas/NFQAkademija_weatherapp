Weather App
===========

###### Author: Renatas Narmontas ######


This application shows current temperature in selected city.

To launch local WEB server:

* use this command in your project directory
php app/console server:run 

* then navigate to
http://localhost:8000/city/Vilnius

and you should get various information about weather in Vilnius city.

##### WARNING: #####

You should use your own API key. Application will not work without it.
You can get it at https://home.openweathermap.org/users/sign_in

Installing API:

1. Create file parameters.yml in app/config directory;

1. Add line and save:
weather_api: YOUR_OPENWEATHERMAP_API

----------
A Symfony project created on March 10, 2016, 9:49 pm.