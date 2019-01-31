<!-- NB7 - Logo Links Inline with Language Start -->
<nav class="nb7 dt-l w-100 border-box pa2 pa3-m pa4-l bb b--black-05" id="nb7">
    
    <!-- Logo Start -->
    <h1 class="logo no-underline f5 ttu ma0 black">
        <a class="db dtc-l v-mid mid-gray link dim w-100 w-25-l tc tl-l" href="<?= $site->url() ?>">
            <?php if ($logo = $site->logo()->toFile()): ?>
            <img class="dib" src="<?= $logo->thumb(['width'=>400, 'height'=>400, 'upscale'=>false])->dataUri() ?>" title="<?= $site->title() ?>"/>
            <?php else: ?>
            <?= $site->title() ?>
            <?php endif ?>
        </a>
    </h1>
    <!-- Logo End -->
   

    <div class="f6 f5-ns db dtc-l v-mid w-100 w-75-l tc tr-l pt3 pt0-l">

        <?php foreach( $site->top_menu()->toStructure() as $item ) : ?>
            <?php $attributes = menuEditorAttributes($item); ?>
            <a class="link dim black-50 dib mr2 mr3-ns <?php e(page( $item->page() )->isOpen(), 'black') ?>" href="<?php echo page( $item->page() )->url(); ?>"><?php echo $item->title(); ?></a>
        <?php endforeach ?>
 

        <span class="dib mr2 mr3-l">|</span>
        
        <!-- Login Start -->
        <?php if ($user = $site->user()): ?>
            <!-- Account -->
            <a href="<?= url('account/login') ?>" class="link dim dib mr2 mr3-ns <?php e(page('account')->isOpen(), 'fw6 black') ?>">

                <?= $user->firstname() != '' ? $user->firstname().' '.$user->lastname() : $user->username() ?>
            </a>
            
            <!-- Logout -->
            <a href="<?= url('logout') ?>" class="link dim red dib mr2 mr3-ns">
                <?= l::get('logout') ?>
            </a>
       
       <?php else: ?>
       <a class="link dim green dn dib-ns mr2 mr3-ns" href="<?= url('account/login') ?>" title="<?= l::get('login') ?>"><?= l::get('login') ?></a>
       <?php endif ?>
       <!-- Login End -->

        <!-- Cart Start -->
        <a class="link dim black-50 dib" href="<?= url('shop/cart') ?>" title="<?php l::get('view-cart') ?>">
            <?php
                $cart = Cart::getCart();
                $count = $cart->count();
            ?>
            <?= l::get('cart') ?>
            <span class="b black">(<?= $count ?>)</span>
        </a>
        <!-- Cart End -->

        <!-- <span class="dib mr2 mr3-l">|</span> -->
        <!-- <a class="link dim gray dib" href="#" title="Language">TR</span></a> -->

    </div>
</nav>
<!-- NB7 - Logo Links Inline with Language End -->