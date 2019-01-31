<?php snippet('header') ?>

 




<!-- CT1 - Cart with Promotion Code Start -->
<section class="ct1 ph2 ph3-m ph4-l pb6 pt5" id="ct1">
    <?php if ($cart->count() === 0): ?>
        <div class="baskerville flex flex-column items-center">
            <span class="purple">
                <svg class="w4" viewBox="0 0 20 20" style="fill:currentcolor">
                    <path  d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z"></path>
                    <path d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z"></path>
                    <path d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z"></path>
                </svg>
            </span>
            <h2 class="tc f3 f1-l fw1 mv0"><?= l::get('no-cart-items') ?></h2>
            <a href="<?= $site->url() ?>" class="link fw1 green dim i tc mt4 mt5-l f4 f3-l"><?= l::get('back-to-store') ?></a>
        </div>
    <?php else: ?>
    
        <!-- Header Start -->
        <div class="dt dt--fixed w-100 bw2 bb b--black-70">
            <div class="dtc v-mid">
                <h3><?= $page->title()->html() ?></h3>
            </div>
            <div class="dtc v-mid tr">
                <a href="<?= $site->url() ?>" class="f6 link dim black dib b underline"><?= l::get('back-to-store') ?></a>
            </div>
        </div>
        <!-- Header End -->

        <!-- Product 1 Start -->
        <?php foreach($items as $i => $item): ?>
        <div class="flex flex-column flex-row-ns items-center justify-start-ns w-100 bb b--black-10 pv3 tc tl-ns">
            
            <!-- Quantity Start -->
            <div class="flex-auto">
                <div class="flex items-center justify-start">
                    <!-- Arrow Down Start -->
                    <form class="dib" action="" method="post">
                        <input type="hidden" name="action" value="remove">
                        <input type="hidden" name="id" value="<?= $item->id ?>">
                        <button class="button-reset bg-transparent bw0 black hover-red pointer" type="submit">
                            <svg class="w2" viewBox="0 0 20 20" style="fill:currentcolor">
                                <path d="M14.776,10c0,0.239-0.195,0.434-0.435,0.434H5.658c-0.239,0-0.434-0.195-0.434-0.434s0.195-0.434,0.434-0.434h8.684C14.581,9.566,14.776,9.762,14.776,10 M18.25,10c0,4.558-3.693,8.25-8.25,8.25c-4.557,0-8.25-3.691-8.25-8.25c0-4.557,3.693-8.25,8.25-8.25C14.557,1.75,18.25,5.443,18.25,10 M17.382,10c0-4.071-3.312-7.381-7.382-7.381C5.929,2.619,2.619,5.93,2.619,10c0,4.07,3.311,7.382,7.381,7.382C14.07,17.383,17.382,14.07,17.382,10"></path>
                            </svg>
                        </button>                       
                    </form>
                    <!-- Arrow Down End -->

                    <!-- Quantity Start -->
                    <span class="dib"><?= $item->quantity ?></span>
                    <!-- Quantity End -->

                    <!-- Arrow Up Start -->
                    <form class="dib" action="" method="post">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="id" value="<?= $item->id ?>">
                        <!-- Count Start -->
                        <button class="button-reset bg-transparent bw0 black hover-blue pointer" <?php ecco($item->maxQty,'disabled') ?> type="submit">
                            <svg class="w2" viewBox="0 0 20 20" style="fill:currentcolor">
                                <path d="M14.613,10c0,0.23-0.188,0.419-0.419,0.419H10.42v3.774c0,0.23-0.189,0.42-0.42,0.42s-0.419-0.189-0.419-0.42v-3.774H5.806c-0.23,0-0.419-0.189-0.419-0.419s0.189-0.419,0.419-0.419h3.775V5.806c0-0.23,0.189-0.419,0.419-0.419s0.42,0.189,0.42,0.419v3.775h3.774C14.425,9.581,14.613,9.77,14.613,10 M17.969,10c0,4.401-3.567,7.969-7.969,7.969c-4.402,0-7.969-3.567-7.969-7.969c0-4.402,3.567-7.969,7.969-7.969C14.401,2.031,17.969,5.598,17.969,10 M17.13,10c0-3.932-3.198-7.13-7.13-7.13S2.87,6.068,2.87,10c0,3.933,3.198,7.13,7.13,7.13S17.13,13.933,17.13,10"></path>
                            </svg>
                        </button>
                    </form>
                    <!-- Arrow Up Start -->
                </div>
            </div>
            <!-- Quantity End -->

            <!-- Product Info Start -->
            <a class="flex-auto link black-40 hover-black mt3 mt0-ns" href="<?= url($item->uri) ?>" title="<?= $item->fullTitle() ?>">
                <div class="cf flex items-center justify-start">

                    <!-- Product Image Start -->
                    <?php if ($item->imgSrc): ?>
                        <img class="dn db-l ma0 pa0" src="<?= $item->imgSrc ?>" title="<?= $item->name ?>">
                    <?php endif ?>
                    <!-- Product Image End -->
        
                    <!-- Product Title, SKU, Variant and Option Start -->
                    <div class="pl2">
                        <span class="f6 mt0 ttu">
                            <!-- Product SKU Start -->
                            <?php ecco($item->sku,'<strong>SKU</strong> '.$item->sku.' / ') ?>
                            <!-- Product SKU End -->

                            <!-- Product Variant Start -->
                            <strong><?php ecco($item->variant,$item->variant) ?></strong>
                            <!-- Product Variant End -->

                            <!-- Product Option Start -->
                            <?php ecco($item->option,' / '.$item->option) ?>
                            <!-- Product Option End -->
                        </span>
                        <!-- Product Name Start -->
                        <h4 class="f6 f5-l mt1 mb0"><?= $item->name ?></h4>
                        <!-- Product Name End -->
                    </div>
                    <!-- Product Title, SKU, Variant and Option End -->
                </div>
            </a>
            <!-- Product Info End -->

            <!-- Product Price Start -->
            <div class="flex-auto mv3 mv0-ns">
                <span class="f6"><?= $item->priceText ?></span>
            </div>
            <!-- Product Price End -->

            <!-- Product Delete Start -->
            <div class="flex-auto tr-ns">
                <form action="" method="post">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $item->id ?>">
                    <button class="button-reset bg-transparent bw0 pointer f6 link dim red dib" type="submit">
                        <svg class="w2" viewBox="0 0 20 20" style="fill:currentcolor">
                            <path d="M10.185,1.417c-4.741,0-8.583,3.842-8.583,8.583c0,4.74,3.842,8.582,8.583,8.582S18.768,14.74,18.768,10C18.768,5.259,14.926,1.417,10.185,1.417 M10.185,17.68c-4.235,0-7.679-3.445-7.679-7.68c0-4.235,3.444-7.679,7.679-7.679S17.864,5.765,17.864,10C17.864,14.234,14.42,17.68,10.185,17.68 M10.824,10l2.842-2.844c0.178-0.176,0.178-0.46,0-0.637c-0.177-0.178-0.461-0.178-0.637,0l-2.844,2.841L7.341,6.52c-0.176-0.178-0.46-0.178-0.637,0c-0.178,0.176-0.178,0.461,0,0.637L9.546,10l-2.841,2.844c-0.178,0.176-0.178,0.461,0,0.637c0.178,0.178,0.459,0.178,0.637,0l2.844-2.841l2.844,2.841c0.178,0.178,0.459,0.178,0.637,0c0.178-0.176,0.178-0.461,0-0.637L10.824,10z"></path>
                        </svg>
                    </button> 
                </form>
            </div>
            <!-- Product Delete End -->
        </div>
        <?php endforeach ?>
        <!-- Product 1 End -->

        <!-- Footer Discount, Giftcard and Total Start -->
        <div class="cf w-100 mt4">

            <!-- Discount and Giftcard Start -->
            <div class="db fl mb5 mb0-l w-100 w-40-l">
                <!-- Discount Start -->
                <?php if (page('shop')->discount_codes()->toStructure()->count() > 0): ?>
                    <?php if ($discount): ?>
                    <?= '&ndash; '.formatPrice($discount['amount']) ?>
                    <form  method="post" class="mw6-l discount db mb4">
                        <fieldset class="cf bn ma0 pa0">
                            <legend class="pa0 f5 f4-ns mb3 mt0 black-80"><?= l::get('discount') ?></legend>
                            <div class="cf">
                                <input class="fl f6 f5-l input-reset black-80 bg-white pa3 lh-solid w-100 w-75-m w-80-l outline-0 ba b--black-10 dim" type="hidden" name="dc" value="">
                                <button class="fl f6 f5-l button-reset pv3 tc bg-animate bg-black-70 hover-bg-black white pointer w-100 w-25-m w-20-l ba b--black-10" type="submit">
                                <?= l::get('delete') ?>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                    <?php else: ?>

                    <form method="post" class="discount db mb4">
                        <fieldset class="cf bn ma0 pa0">
                            <legend class="pa0 f5 f4-ns mb3 mt0 black-80"><?= l::get('discount') ?></legend>
                            <div class="cf">
                                <input type="text" name="dc" class="fl f6 f5-l input-reset black-80 bg-white pa3 lh-solid w-100 w-75-m w-80-l outline-0 ba b--black-10 dim" placeholder="eg: discount">
                                <button class="fl f6 lh-copy button-reset pv3 tc bg-animate bg-black-70 hover-bg-black white pointer w-100 w-25-m w-20-l ba b--black-10" type="submit">
                                    <?= l::get('code-apply') ?>
                                </button>
                            </div>
                        </fieldset>
                    </form>

                    <?php endif ?>
                <?php endif ?>
                <!-- Discount End -->

                <!-- Giftcard Start -->
                <?php if (page('shop')->gift_certificates()->toStructure()->count() > 0): ?>
                    <?php if ($giftCertificate): ?>
                    <div class="db mb2">
                        <span class="db black b mb1 lh-copy"><?= '&ndash; '.formatPrice($giftCertificate['amount']).' '.page('shop')->currency_code() ?></span>
                        <span class="db lh-copy"><?= formatPrice($giftCertificate['remaining']).' '.l::get('remaining') ?></span>
                    </div>
                    <form  method="post" class="mw6-l discount db">
                        <fieldset class="cf bn ma0 pa0">
                            <div class="cf">
                                <input class="fl f6 f5-l input-reset black-80 bg-white pa3 lh-solid w-100 w-75-m w-80-l outline-0 ba b--black-10 dim" type="hidden" name="gc" value="">
                                <button class="button-reset f6 white bg-red dim pv2 ph3 tc bw0 pointer" type="submit">
                                <?= l::get('delete') ?>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                    <?php else: ?>

                    <form method="post" class="discount db">
                        <fieldset class="cf bn ma0 pa0">
                            <legend class="pa0 f5 f4-ns mb3 mt0 black-80"><?= l::get('gift-certificate') ?></legend>
                            <div class="cf">
                                <input type="text" name="gc" class="fl f6 f5-l input-reset black-80 bg-white pa3 lh-solid w-100 w-75-m w-80-l outline-0 ba b--black-10 dim" placeholder="eg: GIFT2017">
                                <button class="fl f6 lh-copy button-reset pv3 tc bg-animate bg-black-70 hover-bg-black white pointer w-100 w-25-m w-20-l ba b--black-10" type="submit">
                                    <?= l::get('code-apply') ?>
                                </button>
                            </div>
                        </fieldset>
                    </form>

                    <?php endif ?>
                <?php endif ?>
                <!-- Giftcard Start -->
            </div>
            <!-- Discount and Giftcard End -->

            <div class="db fr pl5-l black-70 w-100 w-50-l">
                <div class="dt w-100">
                    <div class="dtc v-mid fw5"><?= l::get('subtotal') ?></div>
                    <div class="dtc v-mid tr"><?= formatPrice($cart->getAmount()) ?></div>
                </div>
                <div class="dt w-100 pt4">
                    <div class="dtc v-mid fw5"><?= l::get('tax') ?></div>
                    <div class="dtc v-mid tr"><?= formatPrice($cart->getTax()) ?></div>
                </div>
                <div class="dt w-100 pt4">
                    <div class="cf">
                        <div class="fl w-100 w-20-l fw5 mb4 mb0-l"><?= l::get('shipping') ?></div>
                        <div class="fr w-100 w-80-l">
                            <div class="dt-l w-100">
                                <!-- Set country -->
                                <form class="cf dtc-l v-mid-l pr4-l w-100 w-50-l" id="setCountry" action="" method="POST">
                                    <label class="w-100 relative arrow-select-black-70">
                                    <select class="f6 fw4 w-100 input-reset black-70 bg-white pb3 br0 outline-0 dim bt-0 bl-0 br-0 bb b--black" name="country" onChange="document.forms['setCountry'].submit();">
                                        <?php foreach ($countries as $c): ?>
                                            <option <?php ecco(s::get('country') === $c->uid(), 'selected') ?> value="<?= $c->countrycode() ?>">
                                                <?= $c->title() ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    </label>
                                    <button class="button-reset bw0 bg-transparent dn" type="submit"><?= l::get('update-country') ?></button>
                                </form>

                                <!-- Set shipping -->
                                <form class="cf dtc-l v-mid-l w-100 w-50-l mt3 mt0-l" id="setShipping" action="" method="POST">
                                    <label class="w-100 relative arrow-select-black-70">
                                    <select class="f6 fw4 w-100 input-reset black-70 bg-white pb3 br0 outline-0 dim bt-0 bl-0 br-0 bb b--black" name="shipping" onChange="document.forms['setShipping'].submit();">
                                        <?php if (count($shipping_rates) > 0): ?>
                                            <?php foreach ($shipping_rates as $rate): ?>
                                                <option value="<?= str::slug($rate['title']) ?>" <?php e($shipping['title'] === $rate['title'],'selected') ?>>
                                                    <?= $rate['title'] ?> (<?= formatPrice($rate['rate']) ?>)
                                                </option>
                                            <?php endforeach ?>
                                        <?php else: ?>
                                            <!-- If no shipping rates are set, show free shipping -->
                                            <option value="free-shipping"><?= l::get('free-shipping') ?></option>
                                        <?php endif ?>
                                    </select>
                                    </label>
                                    <button class="button-reset bw0 bg-transparent dn" type="submit"><?= l::get('update-shipping') ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="bb-0 b--black-10 mv4">
                <div class="dt w-100">
                    <div class="dtc v-mid ttu b black"><?= l::get('total') ?></div>
                    <div class="dtc v-mid tr b">
                        <?= formatPrice($total) ?>
                        <?= page('shop')->currency_code() ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Discount, Giftcard and Total End -->

        <!-- Terms and conditions -->
        <?php if ($tc = page('shop/terms-conditions') and $tc->text()->isNotEmpty()): ?>
            <div class="uk-alert">
                <p dir="auto"><?= l::get('terms-conditions') ?> <a href="<?= $tc->url() ?>" target="_blank"><?= $tc->title() ?></a>.</p>
            </div>
        <?php endif ?>
        
        <?php if ($giftCertificate and $giftCertificate['amount'] == $total): ?>
            <?php $g = $kirby->get('option', 'gateway-paylater') ?>
            <form method="post" action="<?= url('shop/cart/process') ?>">
                
                <input type="hidden" name="gateway" value="paylater">

                <input type="hidden" name="giftCertificateAmount" value="<?= $giftCertificate['amount'] ?>">
                <input type="hidden" name="giftCertificateRemaining" value="<?= $giftCertificate['remaining'] ?>">
                <input type="hidden" name="giftCertificatePaid" value="true">

                <div class="forRobots clip">
                  <label for="subject"><?= l::get('honeypot-label') ?></label>
                  <input type="text" name="subject">
                </div>

                <div class="mt4 db">
                    <button class="button-reset f6 white bg-green dim pv2 ph3 tc bw0 pointer" type="submit">
                        <?= l('confirm-order') ?>
                    </button>
                </div>
            </form>
        <?php else: ?>
            <!-- Gateway payment buttons -->
            <div class="mt5 flex-l flex-row-reverse-l items-top">
                <?php foreach($gateways as $gateway): ?>
                    <?php if ($gateway == 'paylater' and !$cart->canPayLater()) continue ?>
                    <?php $g = $kirby->get('option', 'gateway-'.$gateway) ?>
                    
                        <form class="gateway ml2-l" method="post" action="<?= url('shop/cart/process') ?>">
                            
                            <input type="hidden" name="gateway" value="<?= $gateway ?>">

                            <?php if ($giftCertificate): ?>
                                <input type="hidden" name="giftCertificateAmount" value="<?= $giftCertificate['amount'] ?>">
                                <input type="hidden" name="giftCertificateRemaining" value="<?= $giftCertificate['remaining'] ?>">
                            <?php endif ?>

                            <div class="forRobots clip">
                              <label for="subject"><?= l::get('honeypot-label') ?></label>
                              <input  type="text" name="subject">
                            </div>
                            
                            <button class="gateway button-reset bg-orange dim pointer bw0 w-100 mw4-l h4-l tc white pv2 ph3 mb2" type="submit">
                                <?= $gateway != 'paylater' ? '<span class="db">'.l::get('pay-now').'</span>' : '' ?>
                                <?php if (!$g['logo']): ?>
                                   <span class="fw6"><?= $g['label'] ?></span> 
                                <?php else: ?>
                                    <img class="w3 dib mt2" src="<?=f::uri($g['logo']) ?>" alt="<?= $g['label'] ?>">
                                <?php endif ?>
                            </button>

                        </form>
                    
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <script type="text/javascript">
            // Hide setCountry and setShipping submit buttons
            document.querySelector('#setCountry button').style.display = 'none';
            document.querySelector('#setShipping button').style.display = 'none';
        </script>

    <?php endif ?>
</section>
<!-- CT1 - Cart with Promotion Code Start -->

<?php snippet('footer') ?>

