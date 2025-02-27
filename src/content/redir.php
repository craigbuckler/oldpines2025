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
	'priv' 		=> 'privacy/',
	'fast'		=> 'restaurant/breakfast/',
	'din' 		=> 'restaurant/dinner/',
	'even' 		=> 'restaurant/dinner/',
	'menu' 		=> 'restaurant/dinner/',
	'sample' 	=> 'restaurant/dinner/',
	'vegan' 	=> 'restaurant/vegan/',
	'res'		 	=> 'restaurant/reserve-table/',
	'table' 	=> 'restaurant/reserve-table/',
	'food' 		=> 'restaurant/',
	'lunch' 	=> 'restaurant/',
	'meal'		=> 'restaurant/',
	'order'		=> 'restaurant/',
	'take'		=> 'restaurant/',
	'away'		=> 'restaurant/',
	'satur'		=> 'restaurant/',
	'supp'		=> 'restaurant/',
	'eat' 		=> 'restaurant/',
	'hotel' 	=> 'rooms/',
	'room' 		=> 'rooms/',
	'stay' 		=> 'rooms/',
	'break' 	=> 'rooms/',
	'locat' 	=> 'location/',
	'dir' 		=> 'location/',
	'map' 		=> 'location/',
	'find' 		=> 'location/',
	'area' 		=> 'location/',
	'activ' 	=> 'location/activities/',
	'todo' 		=> 'location/activities/',
	'contact' => 'contact/',
	'book' 		=> 'contact/',
	'mail' 		=> 'contact/',
	'tel' 		=> 'contact/',
	'phone' 	=> 'contact/',
	'offer' 	=> 'offers/',
	'gift'		=> 'vouchers/',
	'vouch'		=> 'vouchers/',
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
