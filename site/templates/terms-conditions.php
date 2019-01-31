<?php snippet('header') ?>

	<section class="ph2 ph3-m ph4-l pv3 pv4-m pv5-l">
		<article class="cf">
			<?= $page->text()->kirbytext()->bidi() ?>
		</article>
		<article class="cf w-100">
	        <header class="fn fl-l fl-m w-50-l w-40-m pr4-m">
	            <h2 class="f5 mb3 lh-title"><?= $page->title()->html() ?></h2>
	            <ul class="list pl0 ml0">
	            	<?php if ($page->title2()->isNotEmpty()): ?>
	                <li class="pv2"><a class="f6 dib mid-gray dim" href="#payment" title="Payment"><?= $page->title2()->html() ?></a></li>
	                <?php endif ?>

	                <?php if ($page->title3()->isNotEmpty()): ?>
	                <li class="pv2"><a class="f6 dib mid-gray dim" href="#shipping" title="Shipping"><?= $page->title3()->html() ?></a></li>
	                <?php endif ?>

	                <?php if ($page->title4()->isNotEmpty()): ?>
	                <li class="pv2"><a class="f6 dib mid-gray dim" href="#returns" title="Returns"><?= $page->title4()->html() ?></a></li>
	                <?php endif ?>

	                <?php if ($page->title5()->isNotEmpty()): ?>
	                <li class="pv2"> <a class="f6 dib mid-gray dim" href="#damage" title="Damage and Loss"><?= $page->title5()->html() ?></a></li>
	                <?php endif ?>

	                <?php if ($page->title6()->isNotEmpty()): ?>
	                <li class="pv2"> <a class="f6 dib mid-gray dim" href="#privacy" title="Privacy Policy"><?= $page->title6()->html() ?></a></li>
	                <?php endif ?>

	            </ul>
	        </header>
	        <div class="fn fl-l fl-m w-50-l w-60-m">
	            
	            <?php if ($page->title2()->isNotEmpty()): ?>
	            <h2 class="f5 fw4 ttu mb3 lh-title" id="payment"><?= $page->title2()->html() ?></h2>
	            <?= $page->text2()->kirbytext()->bidi() ?>
	            <?php endif ?>
	            
	            <?php if ($page->title3()->isNotEmpty()): ?>
	            <hr class="bb-0 b--black-10 mv5 mv6-ns">
	            <h2 class="f5 fw4 ttu mb3 lh-title" id="shipping"><?= $page->title3()->html() ?></h2>
	            <?= $page->text3()->kirbytext()->bidi() ?>
	            <?php endif ?>

	            <?php if ($page->title4()->isNotEmpty()): ?>
	            <hr class="bb-0 b--black-10 mv5 mv6-ns">
	            <h2 class="f5 fw4 ttu mb3 lh-title" id="returns"><?= $page->title4()->html() ?></h2>
	            <?= $page->text4()->kirbytext()->bidi() ?>
	            <?php endif ?>

	            <?php if ($page->title5()->isNotEmpty()): ?>
	            <hr class="bb-0 b--black-10 mv5 mv6-ns">
	            <h2 class="f5 fw4 ttu mb3 lh-title" id="damage"><?= $page->title5()->html() ?></h2>
	            <?= $page->text5()->kirbytext()->bidi() ?>
	            <?php endif ?>

	            <?php if ($page->title6()->isNotEmpty()): ?>
	            <hr class="bb-0 b--black-10 mv5 mv6-ns">
	            <h2 class="f5 fw4 ttu mb3 lh-title" id="privacy"><?= $page->title6()->html() ?></h2>
	            <?= $page->text6()->kirbytext()->bidi() ?>
	            <?php endif ?>

	           
	           
	        </div>
	    </article>
	</section>



<?php snippet('footer') ?>