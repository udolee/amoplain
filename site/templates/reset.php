<?php snippet('header') ?>
<!-- RS1 - Reset Password Start -->
<section class="rs1 ph2 ph3-m ph4-l pv3 pv4-m pv5-l" id="rs1">
  <?php if($reset_message) { ?>
    <div class="baskerville measure center pa4 bg-washed-red dark-red black f4 f3-ns mb5">
      <p class="lh-solid"><?= $reset_message ?></p>
    </div>
  <?php } ?>
  <form class="measure center" method="post">
    <fieldset id="sign_up" class="ba b--transparent ph0 mh0">
      <legend class="f4 f3-ns fw6 ph0 mh0"><?= $page->title()->html() ?></legend>
      <p class="f4 fw3 mt3 lh-copy">
        <?= l::get('reset-info') ?>
      </p>
      <div class="forRobots clip">
        <label for="subject"><?= l::get('honeypot-label') ?></label>
        <input type="text" name="subject">
      </div>
      <div class="mt3">
        <label class="db fw6 lh-copy f6" for="email-address" for="email"><?= l::get('email-address') ?></label>
        <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100 outline-0" type="text" id="email" name="email">
      </div>
    </fieldset> 
    <div class="">
      <button class="ph5 pv3 dim link button-reset white bw0 bg-black pointer f6 dib" type="submit" name="reset">
        <?= l::get('reset-submit') ?>
      </button>
    </div>
    <div class="lh-copy mt3">
      <span class="f6"><?= l::get('or') ?></span> <a href="<?= $site->url() ?>" class="f6 link dim black dib b underline"><?= l::get('back-to-store') ?></a>
    </div>
  </form>
</section>
<!-- RS1 - Reset Password Start -->
<?php snippet('footer') ?>

