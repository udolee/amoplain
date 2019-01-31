
<?php if(!isset($response['success'])):  ?>
<section class="nl1 ph2 ph3-m ph4-l pv3 pv4-m pv5-l" id="nl1">
	<form class="mw7 center pa4 br2-ns relative" id="newsletter-registration" action="<?= $page->url() ?>"  method="post">
		<fieldset class="cf bn ma0 pa0"> 
			<legend class="pa0 f5 f4-ns mb3 black-80"><?= l::get('newsletter-title') ?></legend>
			<div class="cf">

				<input class="fl f6 lh-copy input-reset ba pa3 h3 b--solid b--black-70 hover-bg-near-white black-90 w-100 w-75-m w-80-l bg-animate outline-0" type="email" name="email" id="email" placeholder="<?= l::get('newsletter-placeholder') ?>" value="<?= isset($data['email']) ? $data['email'] : ''  ?>" required/>
				
				<div class="alert f6 absolute left-0 bottom-0 pl4 red"><?php if(isset($response['errors']['email'])) { echo $response['errors']['email']; } ?></div>


				<button class="button fl f5 fw5 button-reset h3 bw0 bg-black-70 hover-bg-black white pointer bg-animate w-100 w-25-m w-20-l" type="submit" name="register" value="Subscribe"><?= l::get('subscribe-btn') ?></button>

			</div>
			
			<div class="honey">
				<label for="message">If you are a human, leave this field empty</label>
				<input type="website" name="website" id="website" placeholder ="http://example.com" value="<?= isset($data['website']) ? $data['website'] : ''  ?>" />
			</div>

		</fieldset>
	</form>
</section>
<?php endif ?>

 
<div class="message baskerville ph2 ph3-m ph4-l pv3 pv4-m pv5-l bg-washed-green dark-green dn tc f2 f1-ns">

	<?php if(isset($response['success'])):  ?>
		<?php $response['success'] ?>
	<?php endif ?>

</div>



 