<?php snippet('header') ?>

	<section class="ph2 ph3-m ph4-l pv3 pv4-m pv5-l">
		<article class="measure-narrow-l center">
			<h1 class="mt0 mb4"><?= $page->title()->html() ?></h1>
			<div class="f5">
				<?= $page->text()->kirbytext()->bidi() ?>
			</div>
		</article>
	</section>

<?php snippet('footer') ?>