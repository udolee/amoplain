<?php foreach( $page->{$field}()->toStructure() as $item ) : ?>
<?php $attributes = menuEditorAttributes($item); ?>
    <li>
      <a href="<?php echo page( $item->page() )->url(); ?>"<?php echo $attributes; ?>><?php echo $item->title(); ?></a>
    </li>
<?php endforeach;