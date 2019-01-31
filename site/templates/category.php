<?php snippet('header') ?>

	<!-- Global category listing -->
    <?php if (page('shop')->children()->filterBy('template','category')->count() > 0): ?>
        <div class="ph2 ph3-m ph4-l pv3 pv4-m pv5-l tc">
            <?php snippet('treemenu',array('subpages' => page('shop')->children(), 'template' => 'category', 'class' => 'list pa0')) ?>
        </div>
    <?php endif ?>

	<!-- Product List Start -->
	<?php snippet('list.product', ['products' => $products]) ?>
	<!-- Product List End -->



<?php snippet('footer') ?>