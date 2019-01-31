<!DOCTYPE html>
<html lang="<?= $site->language() ?>">
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>

	<!-- Styles -->
	<?= css('assets/css/styles.css') ?>

</head>
<body class="w-100 avenir bg-white">

	<?php snippet('header.nav') ?>
 	<?php snippet('header.notifications') ?>

 

	<main>

	

