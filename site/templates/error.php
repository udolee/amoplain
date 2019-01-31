<?php snippet('header') ?>

<section class="baskerville ph2 ph3-m ph4-l pv3 pv4-m pv5-l">
  <header class="tc ph5 lh-copy">
      <h1 class="f1 f-headline-l code mb3 mt0 fw9 dib tracked-tight light-purple"><?= $page->title()->html() ?></h1>
      <h2 class="tc f1-l fw1"><?= $page->text()->kirbytext()->bidi() ?></h2>
  </header>
  <p class="fw1 i tc mt4 mt5-l f4 f3-l">Are you looking for one of these?</p>

  
  <ul class="list tc pl0 w-100 mt5">
  	<?php foreach( $site->top_menu()->toStructure() as $item ) : ?>
    <li class="dib"><a class="f5 f4-ns link black db pv2 ph3 hover-light-purple" href="<?php echo page( $item->page() )->url(); ?>"><?php echo $item->title(); ?></a></li>
    <?php endforeach ?>
    <?php foreach( $site->footer_menu()->toStructure() as $item ) : ?>
    <?php $attributes = menuEditorAttributes($item); ?>
    <li class="dib"><a class="f5 f4-ns link black db pv2 ph3 hover-light-purple" href="<?php echo page( $item->page() )->url(); ?>"><?php echo $item->title(); ?></a></li>
    <?php endforeach ?>
  </ul>

</section>


<?php snippet('footer') ?>