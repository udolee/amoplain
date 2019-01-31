<?php snippet('header') ?>

	<section class="ph2 ph3-m ph4-l pv3 pv4-m pv5-l">
		<article class="cf">
			<header class="fn fl-l w-50-l pr4-l">
				<h1 class="mb3 mt0 lh-title"><?= $page->title()->html() ?></h1>
				<h2 class="f6 ttu tracked gray"><?= $page->subtitle()->html() ?></h2>
			</header>

			<div class="fn fr-l w-50-l measure">
				<?= $page->text()->kirbytext()->bidi() ?>
			</div>

		</article>
	</section>

<?php snippet('footer') ?>