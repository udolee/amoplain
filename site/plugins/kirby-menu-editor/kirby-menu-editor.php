<?php
$kirby->set('blueprint', 'fields/menu_default', __DIR__ . DS . 'core' . DS . 'definitions' . DS . 'default.yml');
$kirby->set('blueprint', 'fields/menu_minimal', __DIR__ . DS . 'core' . DS . 'definitions' . DS . 'minimal.yml');
$kirby->set('blueprint', 'fields/menu_full', __DIR__ . DS . 'core' . DS . 'definitions' . DS . 'full.yml');
$kirby->set('snippet', 'menueditor', __DIR__ . DS . 'core' . DS . 'snippet.php');

function menuEditorAttribute($attribute) {
	return r( ! empty( $attribute->value() ), ' ' . $attribute->key() . '="' . $attribute . '"' );
}

function menuEditorAttributes($item) {
	$target = menuEditorAttribute($item->target());
	$rel = menuEditorAttribute($item->rel());
	$class = menuEditorAttribute($item->class());

	return $target . $rel . $class;
}

function menuEditor() {
	$out = '';
	foreach( $page->addresses()->toStructure() as $item ) {
		$attributes = menuEditorAttributes($item);
		$out .= '<li>';
		$out .= '<a href="' . page( $item->page() )->url() . '"' . $attributes . '>' . $item->title() . '</a>';
    	$out .= '</li>';
  	}
}