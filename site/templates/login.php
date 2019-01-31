<?php snippet('header') ?>
<?php snippet('header.user') ?> 

<!-- SI1 - Sign In Centered Start -->
<section class="ph2 ph3-m ph4-l pv3 pv4-m pv5-l">
  <?php if (!$user = $site->user()): ?>

    <?php if (get('login') === 'failed'): ?>
        <div class="measure center red">
            <p class="lh-copy fw1 mt4 mt5-l f4 f3-l mb5"><?= l::get('notification-login-failed') ?></p>
        </div>
    <?php endif ?>
    
    <form dir="auto" action="<?= url('/login') ?>" method="POST" id="login" class="measure center">
        <fieldset class="ba b--transparent ph0 mh0">
            <legend class="f4 f3-ns fw6 ph0 mh0"><?= l::get('login') ?></legend>
            <input type="hidden" name="redirect" value="<?= $page->uri() ?>">

            <div class="mt3">
              <label class="db fw6 lh-copy f6" for="email"><?= l::get('email-address') ?></label>
              <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100 outline-0" type="text" id="email" name="email">
            </div>
            <div class="mt3">
              <label class="db fw6 lh-copy f6" for="password"><?= l::get('password') ?></label>
              <input class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100 outline-0" type="password" id="password" name="password">
            </div>

        </fieldset> 

        <button class="ph5 pv3 dim link button-reset white bw0 bg-black pointer f6 dib" type="submit" name="login">
            <?= l::get('login') ?>
        </button>
        <div class="lh-copy mt3">
                
            <span class="f6"><?= l::get('new-customer') ?></span>
            <a class="f6 link dim black b" href="<?= url('account/register') ?>" title="<?= l::get('register') ?>"><?= l::get('register') ?></a>
            <a class="f6 link dim black db b" href="<?= url('account/reset') ?>" title="<?= l::get('forgot-password') ?>"><?= l::get('forgot-password') ?></a>
        </div>
    </form>

    <script>
        // domready (c) Dustin Diaz 2014 - License MIT
        !function(e,t){typeof module!="undefined"?module.exports=t():typeof define=="function"&&typeof define.amd=="object"?define(t):this[e]=t()}("domready",function(){var e=[],t,n=document,r=n.documentElement.doScroll,i="DOMContentLoaded",s=(r?/^loaded|^c/:/^loaded|^i|^c/).test(n.readyState);return s||n.addEventListener(i,t=function(){n.removeEventListener(i,t),s=1;while(t=e.shift())t()}),function(t){s?setTimeout(t,0):e.push(t)}})

        // Add click handlers to the links to make the login form flash
        domready(function() {
            function flashForm(event) {
                var form = document.getElementById('login');
                form.scrollIntoView(true);
                form.style.opacity = 0;
                setTimeout(function(){ form.style.opacity = 1; }, 300);
            }
            var links = document.querySelectorAll('a[href="#user"]');
            for (var i = 0; i < links.length; i++) {
                links[i].addEventListener("mouseup", flashForm, true);
            }
        });
    </script>
 
<?php endif ?>
</section>
<!-- SI1 - Sign In Centered End -->

<?php snippet('footer') ?>


