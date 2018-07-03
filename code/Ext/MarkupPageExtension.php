<?php

class MarkupPageExtension extends DataExtension
{

	public function markup(SS_HTTPRequest $request)
	{
		$id = explode('-', $request['reference'])[1];
		$ref = Reference::get()->byID($id);
		return ($ref) ? $ref->LargeDesc : null;
	}

	private static $db = array();

	private static $has_one = array();

	private static $has_many = array();

	public function contentControllerInit()
	{

	}
}