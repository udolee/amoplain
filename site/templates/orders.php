<?php snippet('header') ?>

<section class="ph2 ph3-m ph4-l pv3 pv4-m pv5-l">
    <h1 class="mt0 tc tl-l mb5"><?= $page->title()->html() ?></h1>
    <div class="overflow-auto">
        <table dir="auto" class="f6 w-100" cellspacing="0">
            <thead>
                <tr>
                    <th class="fw6 bb b--black-20 tl pb3 pr3 bg-white"></th>
                    <th class="fw6 bb b--black-20 tl pb3 pr3 bg-white"><?= l::get('products') ?></th>
                    <th class="fw6 bb b--black-20 tl pb3 pr3 bg-white"><?= l::get('price') ?></th>
                    <th class="fw6 bb b--black-20 tl pb3 pr3 bg-white"><?= l::get('status') ?></th>
                </tr>
            </thead>
            <tbody class="lh-copy">
            <?php if ($orders): ?>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td class="pv3 pr3 bb b--black-20">
                            <strong><?= $order->txn_id() ?></strong><br>
                            <?php ecco($order->payer_name() != '',$order->payer_name().'<br>') ?>
                            <?php ecco($order->payer_email() != '','<a href="mailto:'.$order->payer_email().'">'.$order->payer_email().'</a><br>') ?>
                            <?= strftime('%e %B %Y, %H:%M',$order->txn_date()->value) ?><br>

                            <form action="<?= $site->url() ?>/<?= $site->language() ?>/shop/orders/pdf" method="POST">
                                <input type="hidden" name="uri" value="<?= $order->uri() ?>">
                                <button class="button-reset bw0 bg-black dim pointer white pv2 ph3 mt3" type="submit"><?= l::get('download-invoice') ?></button>
                            </form>
                        </td>
                        <td class="pv3 pr3 bb b--black-20">
                            <?php if (strpos($order->products(),'uri:')): ?>
                                <!-- Show products overview with download links -->
                                <?php foreach ($order->products()->toStructure() as $product): ?>
                                  
                                    <h3 class="lh-title f6 mb1"><?= $product->name() ?></h3> 
                                    <small class="db ttu">
                                        <?= $product->variant() ?>
                                        <?= $product->option()->isNotEmpty() ? ' / '.$product->option() : '' ?>
                                        <?= '/ '.l::get('qty').$product->quantity() ?>
                                    </small>
                                    <?php if ($product->downloads()->files()->isNotEmpty()): ?>
                                        <?php if ($product->downloads()->expires()->isEmpty() or $product->downloads()->expires()->value > time()): ?>
                                            <?php foreach ($product->downloads()->files() as $file): ?>
                                                <?php $hash = page($product->uri)->file(substr($file, strrpos($file,'/')+1))->hash() ?>
                                                <br>
                                                <small>
                                                    <a href="<?= u($product->uri.'/'.$product->variant.'/download/'.$order->uid().'/'.$hash) ?>" title="<?= $product->name() ?>">
                                                        <?= l::get('download-file') ?> [<?= substr($hash,-7) ?>]
                                                    </a>
                                                </small>
                                            <?php endforeach ?>
                                        <?php else: ?>
                                            <br><small><?= l::get('download-expired') ?></small>
                                        <?php endif ?>
                                    <?php endif ?>
                               
                                <?php endforeach ?>
                            <?php else: ?>
                                <!-- Old transaction files from Shopkit 1.0.5 and earlier -->
                                <?= $order->products()->kirbytext()->bidi() ?>
                            <?php endif ?>
                        </td>
                        <td class="pv3 pr3 bb b--black-20">
                            <table>
                                <tr>
                                    <td class="pv2 pr3"><?= l::get('subtotal') ?></td>
                                    <td class="pv2 pr3">
                                        <?= number_format($order->subtotal()->value,2,'.','') ?>&nbsp;<?= $order->txn_currency() ?>
                                    </td>
                                </tr>
                                <?php if ($order->discount()->value and $order->discount()->value != '0.00'): ?>
                                    <tr>
                                        <td class="pv2 pr3"><?= l::get('discount') ?></td>
                                        <td class="pv2 pr3">
                                            <?= '&ndash; '.number_format($order->discount()->value,2,'.','') ?>&nbsp;<?= $order->txn_currency() ?>
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <tr>
                                    <td class="pv2 pr3"><?= l::get('shipping') ?></td>
                                    <td class="pv2 pr3">
                                        <!-- Need to cast as (float) to handle null or nonexistent shipping value -->
                                        <?= number_format((float)$order->shipping()->value,2,'.','') ?>&nbsp;<?= $order->txn_currency() ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pv2 pr3"><?= l::get('tax') ?></td>
                                    <td class="pv2 pr3">
                                        <?= number_format($order->tax()->value,2,'.','') ?>&nbsp;<?= $order->txn_currency() ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pv2 pr3"><strong><?= l::get('total') ?></strong></td>
                                    <td class="pv2 pr3">
                                        <strong>
                                            <?= number_format($order->subtotal()->value+$order->shipping()->value+$order->tax()->value,2,'.','') ?>&nbsp;<?= $order->txn_currency() ?>
                                        </strong>
                                    </td>
                                </tr>
                                <?php if ($order->giftcertificate()->isNotEmpty() and $order->giftcertificate()->value > 0): ?>
                                    <tr>
                                        <td class="pv2 pr3"><?= str_replace(' ', '&nbsp;', l::get('gift-certificate')) ?></td>
                                        <td class="pv2 pr3">
                                            &ndash;&nbsp;<?= number_format($order->giftcertificate()->value,2,'.','') ?>&nbsp;<?= $order->txn_currency() ?>
                                        </td>
                                    </tr>
                                <?php endif ?>
                            </table>
                        </td>
                        <td class="pv3 pr3 bb b--black-20">
                            <?php if($user and $user->role() == 'admin'): ?>
                                
                                <form action="" method="POST">
                                    <input type="hidden" name="update_id" value="<?= $order->uid() ?>">
                                    <input type="hidden" name="action" value="mark_pending">
                                    <input class="button-reset bg-transparent underline dim bw0 pointer pv2 pr3 <?php ecco($order->status()->value === 'pending','purple fw7') ?>" type="submit" value="<?= l::get('pending') ?>">
                                </form>
                                <form action="" method="POST">
                                    <input type="hidden" name="update_id" value="<?= $order->uid() ?>">
                                    <input type="hidden" name="action" value="mark_paid">
                                    <input class="button-reset bg-transparent underline dim bw0 pointer pv2 pr3 mt2 <?php ecco($order->status()->value === 'paid','green fw7') ?>" type="submit" value="<?= l::get('paid') ?>">
                                </form>
                                <form action="" method="POST">
                                    <input type="hidden" name="update_id" value="<?= $order->uid() ?>">
                                    <input type="hidden" name="action" value="mark_shipped">
                                    <input class="button-reset bg-transparent underline dim bw0 pointer pv2 pr3 mt2 <?php ecco($order->status()->value === 'shipped','blue fw7') ?>" type="submit" value="<?= l::get('shipped') ?>">
                                </form>
                             
                            <?php else: ?> 

                            <?php switch ($order->status()->value) {
                                
                                case 'paid': 
                                    echo "<p class='lh-copy green'>";
                                    echo l::get('paid'); 
                                    echo "</p>";
                                    break;
                                
                                case 'shipped':
                                    echo "<p class='lh-copy blue'>"; 
                                    echo l::get('shipped');
                                    echo "</p>";
                                    break;
                                default: 
                                    echo "<p class='lh-copy purple'>"; 
                                    echo l::get('pending'); 
                                    echo "</p>";
                                    break;
                            } ?>                                                             
                              
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
                <?php if (!$orders->count() and get('status')): ?>
                    <tr>
                        <td class="pv3 pr3 bb b--black-20" colspan="4">
                            <p class="lh-copy f5 tc">
                                <?= l::get('no-filtered-orders') ?>
                            </p>
                        </td>
                    </tr>
                <?php elseif ($orders->count() === 0 and get('status') === null): ?>
                    <tr>
                        <td class="pv3 pr3 bb b--black-20" colspan="4">
                            <p class="lh-copy f5 tc">
                                <?= l::get('no-orders') ?>
                            </p>
                        </td>
                    </tr>
                <?php endif ?>

            <?php else: ?>
                <tr>
                    <td class="pv3 pr3 bb b--black-20" colspan="4">
                        <p class="lh-copy f5 tc">
                            <?= l::get('no-auth-orders') ?>
                        </p>
                    </td>
                </tr>
            <?php endif ?>
            </tbody>
        </table>
    </div>
</section>

<?php snippet('footer') ?>