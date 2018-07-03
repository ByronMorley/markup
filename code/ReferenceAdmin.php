<?php

class ReferenceAdmin extends ModelAdmin {

	private static $url_segment = 'reference';

	private static $menu_title = 'References';

	private static $managed_models = array(
		'Reference'
	);
}