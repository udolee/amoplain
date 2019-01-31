<?php snippet('header') ?>

	<section class="ph2 ph3-m ph4-l pv3 pv4-m pv5-l">
		<article class="cf">
			<h1 class="mt0 tc tl-l mb5"><?= $page->title()->html() ?></h1>
			<?= $page->text()->kirbytext()->bidi() ?>
		</article>
	</section>

<?php snippet('footer') ?>