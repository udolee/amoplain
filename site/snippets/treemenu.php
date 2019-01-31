<?php
	if (!isset($subpages)) {
		if (isset($template)) {
			$subpages = $site->children()->filterBy('template',$template);
		} else {
			$subpages = $site->children();
		}
	} else {
		if (isset($template)) {
			$subpages = $subpages->filterBy('template',$template);
		} else {
			$subpages = $subpages;
		}
	}
?>

<ul class="<?php if ($class) echo $class ?>">
  <?php $class = false; ?>
  <?php foreach($subpages->visible() AS $p): ?>
  <li class="dib">
    <a class="link f6 ttu tracked dim black-50 dib mh2 <?php ecco($p->isActive(), 'b') ?>" href="<?php echo $p->url() ?>"><?php echo $p->title() ?></a>
  </li>
  <?php endforeach ?>
</ul>