<?php snippet('header') ?>
<!-- SU1 - Sign Up Centered Start -->
<section class="su1 ph2 ph3-m ph4-l pv3 pv4-m pv5-l " id="su1">
  <?php if($register_message): ?>
    <div class="baskerville measure center pa4 bg-washed-green dark-green black f4 f3-ns mb5">
      <?= $register_message ?>
    </div>
  <?php endif ?>

  <form class="measure center" method="post">
    <fieldset id="sign_up" class="ba b--transparent ph0 mh0">
      <legend class="f4 f3-ns fw6 ph0 mh0"><?= $page->title()->html() ?></legend>
      <div class="forRobots clip">
        <label for="subject"><?= l::get('honeypot-label') ?></label>
        <input type="text" name="subject">
      </div>


      <div class="mt3">
        <label class="db fw6 lh-copy f6" for="email"><?= l::get('email-address') ?> *</label>
        <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100 outline-0" type="text" id="email" name="email">
      </div>
      <div class="mv3">
        <label class="db fw6 lh-copy f6" for="fullname"><?= l::get('full-name') ?> *</label>
        <input class="b pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100 outline-0 fw4" type="text" id="fullname" name="fullname" value="<?= get('fullname') ?>">
      </div>
      <div class="mv4">
        <label class="w-100 relative arrow-select-black-70" for="country">
          <select class="f6 fw4 w-100 input-reset black-70 bg-white pb3 br0 outline-0 dim bt-0 bl-0 br-0 bb b--black" name="country" id="country">
            <?php foreach ($countries as $c): ?>
              <option value="<?= $c->slug() ?>"><?= $c->title() ?></option>
            <?php endforeach ?>
          </select>
        </label>
        <p class="lh-copy f6"><?= l::get('country-help') ?></p>
      </div>

    </fieldset> 

    <button class="ph5 pv3 dim link button-reset white bw0 bg-black pointer f6 dib" type="submit" name="register">
        <?= l::get('register') ?>
    </button>
    <div class="lh-copy mt3">
      <span class="f6"><?= l::get('or') ?></span> <a href="<?= $site->url() ?>" class="f6 link dim black dib b underline"><?= l::get('back-to-store') ?></a>
    </div>
  </form>
</section>
<!-- SU1 - Sign Up Centered End -->
<?php snippet('footer') ?>





