<?php snippet('header') ?>

	<!-- PD1 - Product Detail for T-Shirt Start -->
	<section class="pd1 ph2 ph3-m ph4-l pv3 pv4-m pv5-l" id="pd1">
	    <div class="cf">
	    	<?php 
				if ($page->hasImages()) {
					$image = $page->images()->sortBy('sort', 'asc')->first();
				} else {
					$image = $site->images()->find($site->placeholder());
				}
				$thumb = $image->thumb(['height'=>600]);
				?>
			
	        <div class="fn fl-ns w-100 w-50-l"> 
	        	 
				<img src="<?php echo $thumb->url() ?>" title="<?php echo $page->title() ?>" class="w-100 db"/>
				 
	        </div>

	        <?php if (count($variants)): ?>
	        <div class="fn fl-ns w-100 w-50-l mt4 mt0-l">
	        	<?php foreach ($variants as $variant): ?>
	            <div class="ph0 pl5-l">
	                <div class="tc tl-l">
	                	<!-- Product Title Start -->
	                	<h3 class="product-title lh-title f4 f3-ns fw6"><?= $page->title()->html() ?></h3>
	                	<!-- Product Title End -->

	                	<!-- Product Designer Start -->
	                	<?php if ($page->designer()->isNotempty()): ?>
	                    <h4 class="product-designer lh-copy fw4 f6 black-70 tracked mt3"><?= l::get('design-by') ?> <?= $page->designer() ?></h4>
	                    <?php endif ?>
	                    <!-- Product Designer End -->

	                    <?php
			  				
			    			$minPrice = $variant->price()->value;
							$minSalePrice = salePrice($variant);

							if ($minSalePrice) {
								$priceFormatted = '<span class="black">'.formatPrice($minSalePrice).'</span>';
								$priceFormatted .= '<del class="pl3 silver">'.formatPrice($minPrice).'</del>';
							} else {
								$priceFormatted = formatPrice($minPrice);
							}

							echo $priceFormatted;
		
						?>
	                </div>
	                
				 	<div class="cf mt4">
		 
			            <form method="post" action="<?= url('shop/cart') ?>">

			            	<!-- Hidden fields -->
			            	<input type="hidden" name="action" value="add">
			            	<input type="hidden" name="uri" value="<?= $page->uri() ?>">
			            	<input type="hidden" name="variant" value="<?= str::slug($variant->name()) ?>">

							<?php if ($variant->hasOptions): ?>
							<label class="fl-ns w-100 w-30-ns relative arrow-select-black-70">
		                        <select class="f6 fw4 w-100 input-reset black-70 bg-white pb3 br0 outline-0 dim bt-0 bl-0 br-0 bb b--black pv3" id="size" name="option">
		                            <?php foreach (str::split($variant->options()) as $option): ?>
										<option value="<?= str::slug($option) ?>"><?= str::ucfirst($option) ?></option>
									<?php endforeach ?>
		                        </select>
	                        </label>
	                        <?php endif ?>

							<button <?php e(inStock($variant),'','disabled') ?> class="fr-ns bw0 f6 f5-l link button-reset pv3 ph4 tc bg-animate bg-orange dim white pointer w-100 mw5-ns mt3 mt0-ns" type="submit" property="offers" typeof="Offer">
					 		 <?= l::get('add-to-cart') ?>

								<link property="availability" href="<?php e(inStock($variant),'http://schema.org/InStock','http://schema.org/OutOfStock') ?>" />
							</button>
			            </form>
				
					 </div>

	                <!-- Tab Start -->
	                <div class="tab-wrap flex flex-wrap justify-start mt4">
	                	<?php
					 		// Get size guide info
							$sizes = $pages->find('size-guide')->fivecoltablebody();
							$headOne = $pages->find('size-guide')->fiveColTableHeadOne();
							$headTwo = $pages->find('size-guide')->fiveColTableHeadTwo();
							$headThree = $pages->find('size-guide')->fiveColTableHeadThree();
							$headFour = $pages->find('size-guide')->fiveColTableHeadFour();
							$headFive = $pages->find('size-guide')->fiveColTableHeadFive();

							$sizeNote = $pages->find('size-guide')->text()->kirbytext();

						?>
	                	<!-- Tab Buttons Start -->
	                    <input class="tab checked-tab--black-40" id="tab1" type="radio" name="tabGroup4" checked="">
	                    <label class="f6 pv2 pr3 black fw6 tracked dim" for="tab1">Description</label>
	                    <?php if ($sizes->isNotEmpty()): ?>
	                    <input class="tab checked-tab--black-40" id="tab2" type="radio" name="tabGroup4">
	                    <label class="f6 pv2 pr3 black fw6 tracked dim" for="tab2">Size Guide</label>
	                    <?php endif ?>
	                    <?php if ($page->fourColtablebody()->isNotEmpty()): ?>
	                    <input class="tab checked-tab--black-40" id="tab3" type="radio" name="tabGroup4">
	                    <label class="f6 pv2 pr3 black fw6 tracked dim" for="tab3">Shipping</label>
	                    <?php endif ?>
	                    <input class="tab checked-tab--black-40" id="tab4" type="radio" name="tabGroup4">
	                    <label class="f6 pv2 pr3 black fw6 tracked dim" for="tab4">Share</label>
	                    <!-- Tab Buttons End -->

	                    <!-- Tab Content Description Start -->
	                    <div class="description tab__content pv3 black-70 f6">

	                        <?= $page->text()->kirbytext()->bidi() ?>

	                        <!-- Designer Name Start -->
	                        <?php if ($page->designer()->isNotempty()): ?>
	                        <div class="dt w-100">
	                            <div class="dtc v-mid">
	                            	<h4 class="fw4">Designer:</h4>
	                            </div>
	                            <div class="dtc v-mid tr black"><?= $page->designer() ?></div>
	                        </div>
	                        <?php endif ?>
	                        <!-- Designer Name End -->

	                        <div class="dt w-100">
	                            <div class="dtc v-mid">
	                                <h4 class="fw4">Type:</h4></div>
	                            <div class="dtc v-mid tr"><?= $page->type() ?></div>
	                        </div>
	                        <div class="dt w-100">
	                            <div class="dtc v-mid">
	                                <h4 class="fw4">Fabric:</h4></div>
	                            <div class="dtc v-mid tr"><?= $page->fabric() ?></div>
	                        </div>
	                    </div>
	                    <!-- Tab Content Description End -->

				      	<?php if ($sizes->isNotEmpty()): ?>
	                   	<!-- Tab Content Size Guide Start -->
	                    <div class="size-guide tab__content pv4 f6 fw3">
	                        <table class="collapse w-100 f6 tl">
								<thead>
									<tr class="black-50 bb b--black-10">
										<th class="fw6 ttu pb3 pr3"><?= $headOne->html() ?></th>
          								<th class="fw6 ttu pb3 pr3"><?= $headTwo->html() ?></th>
          								<th class="fw6 ttu pb3 pr3"><?= $headThree->html() ?></th>
          								<th class="fw6 ttu pb3 pr3"><?= $headFour->html() ?></th>
          								<th class="fw6 ttu pb3 pr3"><?= $headFive->html() ?></th>
									</tr>
								</thead>
								
	                            <tbody>
	                            	<?php foreach($sizes->toStructure() as $tableBodyItem): ?>
	                            	<tr class="bb b--black-05">
	                            		<td class="pv3 fw3" data-label="<?= $headOne->html() ?>"><?php echo $tableBodyItem->table_col_1() ?></td>
          								<td class="pv3 fw3" data-label="<?= $headTwo->html() ?>"><?php echo $tableBodyItem->table_col_2() ?></td>
          								<td class="pv3 fw3" data-label="<?= $headThree->html() ?>"><?php echo $tableBodyItem->table_col_3() ?></td>
          								<td class="pv3 fw3" data-label="<?= $headFour->html() ?>"><?php echo $tableBodyItem->table_col_4() ?></td>
          								<td class="pv3 fw3" data-label="<?= $headFive->html() ?>"><?php echo $tableBodyItem->table_col_5() ?></td>
	                                </tr>
	                                <?php endforeach ?>
	                                
	                            </tbody>
	                        </table>
	                        
	                        <?= $sizeNote->bidi() ?>

	                    </div>
	                    <!-- Tab Content Size Guide End -->
	                    <?php endif ?>

	                    <!-- Tab Content Shipping Start -->
	                    <?php snippet('shipping') ?>
	                    <!-- Tab Content Shipping End -->



	                    <!-- Tab Content Share Buttons Start -->
	                    <div class="share tab__content pv3 f6 fw3">
	                        <div class="social-links">
	                        	<?php $rows = $site->social()->toStructure();?>
	                        	<?php if (count($rows)): ?>
	                        	<?php foreach($rows as $row):?>
	                            <a class="link dim black-70 dib h1 w1 br-100 mr3 pa2 bg-near-white ba b--black-10" href="<?= $row->social_url() ?>" title="<?= $row->social_name() ?>">
	                               
	                               <?php $previewName = $row->social_icon() ?>
						            <?php if ($previewName != ""): ?>   		          
						                <img class="db" src="<?= $previewName->toFile()->url() ?>">
						            <?php endif ?>
	                              
	                            </a>
	                            <?php endforeach ?>
	                            <?php endif ?>
	                        </div>
	                    </div>
	                    <!-- Tab Content Share Buttons End -->
	                </div>
	                <!-- Tab End -->	         
	            </div>
	            <?php endforeach ?>
	        </div>
	        <?php endif ?>
	    </div>
	</section>
	<!-- PD1 - Product Detail for T-Shirt End -->

<?php snippet('footer') ?>