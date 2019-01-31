<!-- PP3 - Product Page 3 Columns No Gaps Start -->
<?php if(count($products) or $products->count()): ?>
<section class="pp3 pa2 pa3-m pa4-l" id="pp3">
	<div class="cf">
		<?php foreach($products as $product): ?>
		<div class="fl w-100 w-50-m w-third-l">
			<a href="<?php echo $product->url() ?>" class="db link dim tc">
				<?php 
					if ($product->hasImages()) {
						$image = $product->images()->sortBy('sort', 'asc')->first();
					} else {
						$image = $site->images()->find($site->placeholder());
					}
					$thumb = $image->thumb(['height'=>600]);
				?>
				<img src="<?php echo $thumb->dataUri() ?>" title="<?php echo $product->title() ?>" class="w-100 db"/>
				<dl class="mt2 f6 lh-copy">
					<dt class="clip">Product Title</dt>
					<dd class="ml0 fw7 black truncate w-100"><?php echo $product->title()->html() ?></dd>
					<dt class="clip">Product Price</dt>
					<?php
		    			$count = $minPrice = $minSalePrice = 0;
		    			foreach ($product->variants()->toStructure() as $variant) {
		    				// Assign the first price
		    				if (!$count) {
		    					$minVariant = $variant;
		    					$minPrice = $variant->price()->value;
		    					$minSalePrice = salePrice($variant);
		    				} else if ($variant->price()->value < $minPrice){
		    					$minVariant = $variant;
		    					$minPrice = $variant->price()->value;
		    					$minSalePrice = salePrice($variant);
		    				}
		    				$count++;
		    			}
					?>
					<dd class="ml0 mid-gray truncate w-100">
						<?php
							if ($minSalePrice) {
								$priceFormatted = formatPrice($minSalePrice);
								$priceFormatted .= '<del class="pl2 silver">'.formatPrice($minPrice).'</del>';
							} else {
								$priceFormatted = formatPrice($minPrice);
							}
							if ($count > 1) $priceFormatted = $priceFormatted;
							echo $priceFormatted;
						?>

					</dd>
				</dl>
			</a>
		</div>
		<?php endforeach ?>
	</div>
</section>
<?php endif ?>
<!-- PP3 -  Product Page 3 Columns No Gaps End -->