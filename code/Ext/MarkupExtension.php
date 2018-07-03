<?php

class MarkupExtension extends DataExtension {


	private static $db = array();

	private static $has_one = array();

	private static $has_many = array();

	public function contentControllerInit()
	{
		Requirements::css(MARKUP_DIR. '/css/style.min.css');
		Requirements::javascript(MARKUP_DIR . '/js/main.js');
	}
}