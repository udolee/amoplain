<?php if ($user = $site->user()): ?>
<section class="ph2 ph3-m ph4-l pv3 pv4-m pv5-l">
	<header class="tc">
	 		
 		<?php if($avatar = $user->avatar()): ?>
 			
			<img class="br-100 pa1 ba b--black-10 " src="<?php echo $avatar->thumb(['width' => 80, 'height' => 80, 'crop' => true])->url() ?>" alt="<?= $user->firstname() != '' ? $user->firstname().' '.$user->lastname() : $user->username() ?>">
		<?php endif ?>
		 
		<h1 class="f5 f4-ns fw6 mid-gray"><?= $user->firstname() != '' ? $user->firstname().' '.$user->lastname() : $user->username() ?></h1>
		<h2 class="f6 gray fw4 tracked"><?= $user->email() ?></h2>

	</header>
	

	<nav class="measure-wide center border-box pa2  mt4 flex flex-column flex-row-l justify-between tc">
		<?php if ($user->can('panel.access.options')): ?>
			<a class="link f6 dim black-70 underline dib flex-auto mv2" href="<?= url('panel') ?>/pages/<?= $page->uri() ?>/edit">
				<?= l::get('edit-page') ?>
			</a>

			<a class="link f6 dim black-70 underline dib flex-auto mv2" href="<?= url('panel') ?>">
				<?= l::get('dashboard') ?>
			</a>

			<a class="link f6 dim black-70 underline dib flex-auto mv2" href="<?= url('panel') ?>/pages/shop/edit">
				<?= l::get('edit-shop') ?>
			</a>

		<?php endif ?>
			<a class="link f6 dim black-70 underline dib flex-auto mv2" href="<?= url('panel/users/'.$user->username().'/edit') ?>"">
				<?= l::get('edit-account') ?>
			</a>
			<a class="link f6 dim black-70 underline dib flex-auto mv2" href="<?= url('shop/orders') ?>"">
				<?= l::get('view-orders') ?>
			</a>

	</nav>

<?php endif ?>
</section>