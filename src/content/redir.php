---
index: false
---
<?php
// requested URL
$addr = strtolower($_SERVER['REQUEST_URI']);
$url = '';

// redirects
$redir = array(

	'index'		=> '',
	'welcome' => '',
	'home' 		=> '',
	'hotel' 	=> 'rooms/',
	'room' 		=> 'rooms/',
	'stay' 		=> 'rooms/',
	'break' 	=> 'rooms/',
	'food' 		=> 'restaurant/',
	'menu' 		=> 'restaurant/',
	'din' 		=> 'restaurant/',
	'lunch' 	=> 'restaurant/',
	'order'		=> 'restaurant/',
	'take'		=> 'restaurant/',
	'away'		=> 'restaurant/',
	'satur'		=> 'restaurant/',
	'supp'		=> 'restaurant/',
	'locat' 	=> 'location/',
	'dir' 		=> 'location/',
	'map' 		=> 'location/',
	'find' 		=> 'location/',
	'area' 		=> 'location/',
	'contact' => 'contact/',
	'book' 		=> 'contact/',
	'mail' 		=> 'contact/',
	'tel' 		=> 'contact/',
	'phone' 	=> 'contact/',
	'offer' 	=> 'offers/',
	'priv' 		=> 'privacy/',
	'book'		=> 'rooms/booking/',

);
foreach ($redir as $pold => $pnew) if (strpos($addr, $pold) !== false) $url = '${ tacs.root }' . $pnew;

if ($url !== '') {

	// redirect found
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: ' . $url);

}
else {

	// show error page
	header('HTTP/1.1 404 Not Found');
	include('404.html');

}
