
![logo](images/logo.png)

  
  
  

# Regional HIV/AIDS Connection Website

  

  
  
  

## Final Intergrated Project - Fanshawe College

  

  

  

## Description

  

  

  

A microsite designed to help inform youths about HIV / AIDs. Bright colours, simplistic design and clear-cut facts are utilized to help grab the attention of younger demographics.

  

  

  

### Features

  

  

  

* Multiple-Page Website

  

  

* Admin Login / CMS

  

  

* Custom Google Maps Widget

  

  

* Campaign Video

  

  

  

#### Multiple-Page Website

  

  

  

* Four main pages: Home / The Facts / About Us / Admin Login

  

  

* Four admin pages: Dashboard / Manage User / Manage Users / Manage Content

  

  

  

#### Admin Login / CMS

  

  

  

* Admins can login to view / edit users or content

  

  

* Password is encrypted and verified upon login

  

  

* Admins can edit their own account information

  

  

* Admins can add / delete users

  

  

* CMS can edit / add popups on Home page along with SVG icons

  

  

* CMS can edit / add popups on About Us page

  

  

  

#### Custom Google Maps Widget

  

  

  

* Users can enter their postal code to find HIV / AIDs testing clinics within a 20 kilometre radius of input location

  

  

* Distance between input location / clinics is calculated using the haversine formula

  

  

* For a more in-depth look at the haversine formula / map widget click <a  href="https://github.com/philipwood0912/haversine_test">here</a>

  

  

* Built using Google Maps API / vue-google-maps.js / geocoder

  

  

  

### Prerequisites

  

  

  

* Web browser: Chrome / Firefox / Safari preferred

  

  

* MAMP / WAMP installed and running

  

  

* Google Maps API key: Needed for the website to function properly

  

  

  

----------

  

  

  

## Getting Started

  

  

  

Using command line: Change directories to either htdocs (Mac) or www (Windows) within MAMP/WAMP and clone the repo!

  

  

  

#### Example: Mac

  

  

```
$ cd /Applications/MAMP/htdocs
$ git clone https://github.com/philipwood0912/FIP_website
```

  

  

  

### Importing Database

  

  

  

Navigate to phpMyAdmin in MAMP/WAMP and import database/db_fip.sql into a database with the same name as file.

  

  

  

Or install using command line:

  

  

  

#### Example: Mac

  

  

Connect to mysql:

  

  

  

```
$ /Applications/MAMP/Library/bin/mysql -uroot -proot
```

  

  

  

Create / Use database and import .sql file:

  

  

  

```
mysql> CREATE DATABASE db_fip;
mysql> USE db_fip;
mysql> SOURCE /Applications/MAMP/htdocs/FIP_website/database/db_fip.sql;
```

  

  

  

Congratulations, you've imported the database!

  

  

  

### Add Google Maps API Key

  

  

  

**IMPORTANT! - Key is needed for site to function, or else Vue will throw errors**

  

  

  

API key can be acquired from <a  href="https://cloud.google.com/maps-platform">Google</a> at the cost of giving them your credit card.

  

  

  

Create config.js and add it to the config folder.

  

  

  

#### Example: Mac

  

  

  

```
$ cd /Applications/MAMP/htdocs/FIP_website/config
$ touch config.js
```

  

  

  

Now add this to config.js using a code editor of your choice:

  

  

  

```javascript
var  config = {
MY_KEY :  'api key goes here'
}
```

  

  

  

Save the file and you'll be ready for deployment!

  

  

  

--------

  

  

## Deployment

  

  

  

If file was cloned into htdocs / www directory, navigate to MAMP/WAMP webpage and open up the website.

  

  

  

Or on a Mac navigate to URL:

  

  

  

```
http://localhost:8888/FIP_website/
```

  

  

  

If file was cloned / database imported properly, then deployment should be successful.

  

  

  

--------

  

  

## Built With

  

  
  

*  <a  href="https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5">HTML5</a>

  



*  <a  href="https://developer.mozilla.org/en-US/docs/Web/JavaScript">JavaScript</a>

  

  

*  <a  href="https://vuejs.org/v2/api/">Vue.js</a>

  

  

*  <a  href="https://router.vuejs.org/api/">Vue-Router</a>

  

  

*  <a  href="https://github.com/xkjyeah/vue-google-maps">vue-google-maps.js</a>

  

  

*  <a  href="https://developers.google.com/maps/documentation">Google Maps API</a>

  

  

*  <a  href="https://geocoder.ca/">Geocoder.ca</a>

  

  

*  <a  href="https://www.php.net/docs.php">PHP</a>

  

  

*  <a  href="https://dev.mysql.com/doc/">MySQL</a>

  

  

*  <a  href="https://sass-lang.com/documentation">SASS</a> / <a  href="https://developer.mozilla.org/en-US/docs/Web/CSS">CSS</a>

  

  

  

--------------

  

  

## Issues

  

  

  

### Browser compatibility

  

  

  

* Chrome - 100%

  

  

* Firefox - 100%

  

  

* Safari - 100%

  

  

* IE - Unknown at the moment

  

  

----------

  

  

## Authors

  

  

  

*  **Scott Olthoff** ~ Motion Designer / Project Manager

  

  

*  **Brisk Yunus** ~ Graphic Designer

  

  

*  **Michael Prior** ~ Front-End Developer

  

  

*  **Philip Wood** ~ Back-End Developer