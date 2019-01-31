<?php

// Shopkit onboarding process

$notifications = [];

if ($site->users()->count() === 0) {

	// Check if a panel account has been created
	$notifications[] = l::get('notification-account');

} else if (page('shop')->currency_symbol() == '' or page('shop')->currency_code() == '') {

	if ($site->user() === false) {
		// Check if user is logged in
		$notifications[] = l::get('notification-login');
	} else {
		// Check if shop options have been set
		$notifications[] = l::get('notification-options');
	}

} else if (page('shop')->children()->filterBy('template','category')->count() === 0) {

	if ($site->user() === false) {
		// Check if user is logged in
		$notifications[] = l::get('notification-login');
	} else {
		// Check if a category has been created
		$notifications[] = l::get('notification-category');
	}

} else if (page('shop')->index()->filterBy('template','product')->count() === 0) {

	if ($site->user() === false) {
		// Check if user is logged in
		$notifications[] = l::get('notification-login');
	} else {
		// Check if a product has been created
		$uri = page('shop')->children()->filterBy('template','category')->first()->uri();
		$notifications[] = l::get('notification-product-first').$uri.l::get('notification-product-last');
	}

}

// Warnings

if (c::get('license-shopkit') == "") {
	// Check if there is a license key
	//$notifications[] = l::get('notification-license');
}

?>

<?php if(count($notifications) > 0):?>
	<?php foreach($notifications as $notification):?>
		<div class="notification baskerville ph2 ph3-m ph4-l pv3 pv4-m pv5-l bg-washed-red dark-red f3-ns relative flex items-center justify-between">
			<span class=""><?= $notification ?></span>	
			<span class="notification-close dark-red dim pointer">
				 <svg class="w3" viewBox="0 0 20 20" style="fill:currentcolor">
                    <path d="M10.185,1.417c-4.741,0-8.583,3.842-8.583,8.583c0,4.74,3.842,8.582,8.583,8.582S18.768,14.74,18.768,10C18.768,5.259,14.926,1.417,10.185,1.417 M10.185,17.68c-4.235,0-7.679-3.445-7.679-7.68c0-4.235,3.444-7.679,7.679-7.679S17.864,5.765,17.864,10C17.864,14.234,14.42,17.68,10.185,17.68 M10.824,10l2.842-2.844c0.178-0.176,0.178-0.46,0-0.637c-0.177-0.178-0.461-0.178-0.637,0l-2.844,2.841L7.341,6.52c-0.176-0.178-0.46-0.178-0.637,0c-0.178,0.176-0.178,0.461,0,0.637L9.546,10l-2.841,2.844c-0.178,0.176-0.178,0.461,0,0.637c0.178,0.178,0.459,0.178,0.637,0l2.844-2.841l2.844,2.841c0.178,0.178,0.459,0.178,0.637,0c0.178-0.176,0.178-0.461,0-0.637L10.824,10z"></path>
                </svg>
			</span>
			
		</div>
	<?php endforeach ?>
<?php endif ?>

<?php
// Success messages

$successes = [];

if (null !== s::get('discountCode')) {
	$successes[] = l::get('notification-discount');
}

if (null !== s::get('giftCertificateCode')) {
	$successes[] = l::get('notification-giftcertificate');
}

?>

<?php if(count($successes) > 0):?>
	<?php foreach($successes as $success):?>
		<div class="notification baskerville ph2 ph3-m ph4-l pv3 pv4-m pv5-l bg-washed-green dark-green f3-ns relative flex items-center justify-between">
			<span class=""><?= $success ?></span>	
			<span class="notification-close dark-green dim pointer">
				 <svg class="w3" viewBox="0 0 20 20" style="fill:currentcolor">
                    <path d="M10.185,1.417c-4.741,0-8.583,3.842-8.583,8.583c0,4.74,3.842,8.582,8.583,8.582S18.768,14.74,18.768,10C18.768,5.259,14.926,1.417,10.185,1.417 M10.185,17.68c-4.235,0-7.679-3.445-7.679-7.68c0-4.235,3.444-7.679,7.679-7.679S17.864,5.765,17.864,10C17.864,14.234,14.42,17.68,10.185,17.68 M10.824,10l2.842-2.844c0.178-0.176,0.178-0.46,0-0.637c-0.177-0.178-0.461-0.178-0.637,0l-2.844,2.841L7.341,6.52c-0.176-0.178-0.46-0.178-0.637,0c-0.178,0.176-0.178,0.461,0,0.637L9.546,10l-2.841,2.844c-0.178,0.176-0.178,0.461,0,0.637c0.178,0.178,0.459,0.178,0.637,0l2.844-2.841l2.844,2.841c0.178,0.178,0.459,0.178,0.637,0c0.178-0.176,0.178-0.461,0-0.637L10.824,10z"></path>
                </svg>
			</span>
			
		</div>
	<?php endforeach ?>
<?php endif ?>