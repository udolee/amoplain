	</main>
<!-- FT6 - Large Type Mail, 3 Columns Start -->
<footer class="ft6 cf ph3 ph4-ns pv6 black-70 bg-near-white" id="ft6">
	<div class="fn fl-l fl-m w-100 w-40-l tc tl-l"> 
			<?php if ($site->email()->isNotEmpty()): ?>
			<a class="link b f3 f2-ns dim black-70 lh-solid" href="mailto:<?= $site->email()->html() ?>"><?= $site->email()->html() ?></a>
			<?php endif ?>
            <p class="f6 db lh-copy">
            	<?= $site->copyright()->html() ?>
 			</p>
    </div>
    <div class="fn fl-l fl-m w-100 w-30-l tc tl-l mt4 mt0-l">
        <h3 class="f5 lh-solid mt0"><?= $site->footerMenuTitle()->html() ?></h3>
        <ul class="list f6 f5-l pl0 ml0">
        <?php foreach( $site->footer_menu()->toStructure() as $item ) : ?>
            <?php $attributes = menuEditorAttributes($item); ?>
            <li class="pv2">
            <a class="dib pr2 mid-gray dim <?php e(page( $item->page() )->isOpen(), 'black') ?>" href="<?php echo page( $item->page() )->url(); ?>"><?php echo $item->title(); ?></a>
            </li>
        <?php endforeach ?>
         </ul>

    </div>
    <div class="fn fl-l fl-m w-100 w-30-l tc tl-l mt4 mt0-l">
        <h3 class="f5 lh-solid mt0"><?= l::get('menu-title') ?></h3>
        <ul class="list f6 f5-l pl0 ml0">
            <?php $rows = $site->social()->toStructure();?>
     
            <?php foreach($rows as $row):?>
            <li class="pv2">
                <a class="dib pr2 mid-gray dim" target="_blank" href="<?= $row->social_url() ?>" title="<?= $row->social_name() ?>">
                    <?= $row->social_name() ?>
                </a>
            </li>
            <?php endforeach ?>
            
        </ul>


    </div>
</footer>
<!-- FT6 - Large Type Mail, 3 Columns End -->


<?php echo js(array(
  'assets/js/jquery-2.2.3.min.js',
  'assets/js/script.js',
)) ?>

</body>
</html>