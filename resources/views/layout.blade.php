<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Pastel by MLPdesign</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" lang="en" content="open source html and css template">
<meta name="author" content="mlp design">
<meta name="robots" content="index, follow">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ mix('css/mystyle.css') }}">
</head>
<body>
<!-- Menu Items -->
<nav>
 <input type="checkbox" id="show-menu" role="button">
 <label for="show-menu" class="open"><span class="fa fa-bars"></span></label>
 <label for="show-menu" class="close"><span class="fa fa-times"></label>
 <ul id="menu">

  <li><a class="{{ Request::path() === '/' ? 'active' : '' }}" href="/">Kezdőoldal</a></li>
  <li><a class="{{ Request::path() === 'contact' ? 'active' : '' }}" href="/contact">Kapcsolat</a></li>
  <li><a class="{{ Request::path() === 'flights' ? 'active' : '' }}" href="/flights">Repülőjáratok</a></li>
  <li><a class="{{ Request::path() === 'airlines' ? 'active' : '' }}" href="/airlines">Légitársaságok</a></li>
  <li><a class="{{ Request::path() === 'cities' ? 'active' : '' }}" href="/cities">Városok</a></li>
  <li><a class="{{ Request::path() === 'luggages' ? 'active' : '' }}" href="/luggages">Poggyászok</a></li>

 </ul>
</nav>
<!-- // -->
<!-- Banner -->
<div id="banner">
 <div id="header">
  <h1>OldSchool Pastel</h1>
  <p class="sub">Fluid, responsive website template by MLPdesign.</p>
 </div>
</div>
<!-- // -->
<div id="content">
 <!-- Page Items -->
 <div class="pageitem">
     @yield('content')
 </div>
 <div class="pageitem">
  <h2>Ordered and Unordered Lists</h2>
  <p class="sub">Lists in two columns</p>
  <div class="two-col-cell">
   <h3>Ordered List</h3>
   <ol>
    <li>First in the list</li>
    <li>Second one goes here</li>
    <li>Third item on the list</li>
    <li>Fourth item here</li>
    <li>Fifth and some more to go</li>
    <li>Sixth, just because</li>
    <li>Seventh item</li>
    <li>Eighth and nearing the end </li>
    <li>Ninth and one more to go</li>
    <li>Tenth and last</li>
   </ol>
  </div>
  <div class="two-col-cell">
   <h3>Unordered List</h3>
   <ul>
    <li>Nulla consectetur</li>
    <li>Integer in accumsan nisi</li>
    <li>Cras augue odio</li>
    <li>Aliquam lacinia rutrum</li>
    <li>Vestibulum placerat sapien</li>
    <li>Pellentesque eleifend</li>
    <li>Etiam fringilla nisl lectus</li>
    <li>Proin eleifend sapie</li>
    <li>Maecenas placerat</li>
    <li>Praesent ut purus fri</li>
   </ul>
  </div>
 </div>
 <div class="pageitem">
  <h2>Simple Gallery</h2>
  <p class="sub">Images in three columns and unlimited rows.
   <p>Morbi aliquet elit quis viverra lobortis. Mauris ullamcorper neque eget mollis pretium. Cras lacinia dolor a laoreet porta. Aliquam bibendum mattis elit nec tincidunt. Curabitur efficitur sed mauris eget venenatis.</p>
   <div class="three-col-cell gallery">
    <img src="http://placeimg.com/300/200/animals"><br><span class="sub">Random animal by PlaceIMG</span>
   </div>
   <div class="three-col-cell gallery">
    <img src="http://placeimg.com/300/200/arch"><br><span class="sub">Random architecture by PlaceIMG</span>
   </div>
   <div class="three-col-cell gallery">
    <img src="http://placeimg.com/300/200/nature"><br><span class="sub">Random nature by PlaceIMG</span>
   </div>
   <div class="three-col-cell gallery">
    <img src="http://placeimg.com/300/200/people"><br><span class="sub">Random people by PlaceIMG</span>
   </div>
   <div class="three-col-cell gallery">
    <img src="http://placeimg.com/300/200/tech"><br><span class="sub">Random technology by PlaceIMG</span>
   </div>
   <div class="three-col-cell gallery">
    <img src="http://placeimg.com/300/200/any"><br><span class="sub">Random image by PlaceIMG</span>
   </div>
 </div>
 <!-- // -->
</div>
<!-- Footer Items -->
<div id="footer">
 <p>&copy; Copyright Your Name</p>
 <!--Credits below must be kept under CC-NC 3.0 License-->
 <p><a href="http://www.mlpdesign.net">HTML and CSS</a> by MLPdesign.net</p>
</div>
<!-- // -->
</body>
</html>
