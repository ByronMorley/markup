<?php

class Reference extends DataObject
{

	private static $db = array(
		'Title' => 'Varchar(200)',
		'SmallDesc' => 'varchar(30)',
		'LargeDesc' => 'HTMLText',
	);

	private static $has_one = array();

	private static $has_many = array();

	private static $summary_fields = array(
		'Title' => 'Title',
		'SmallDesc' => 'Small Description',
		'LargeDesc.NoHTML' => 'Large Description'
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->addFieldsToTab('Root.Main',
			array(TextField::create('Title', 'Reference')->setCustomValidationMessage('Required Field'),
				TextField::create('SmallDesc', 'Small Description')->setCustomValidationMessage('Required Field'),
				HtmlEditorField::create('LargeDesc', 'Large Description')->setCustomValidationMessage('Required Field')
			)
		);

		return $fields;
	}

	public function contentBlock()
	{
		return '<a href="javascript:void(0)" class="reference tooltips" id="reference-' . $this->ID . '" >' . $this->Title . '<span class="span-tip">' . $this->SmallDesc . ' <i class="fa fa-plus-square-o"  aria-hidden="true"></i><span class="span-hover" ></span></span></a>';
	}

	public function onAfterWrite()
	{
		parent::onAfterWrite();

		$code = CodeBlock::get()->byID($this->ID);
		$codeBlock = ($code) ? $code : CodeBlock::create();
		$codeBlock->ID = $this->ID;
		$codeBlock->Name = $this->Title;
		$codeBlock->Content = $this->contentBlock();
		$codeBlock->Active = 'Active';
		$codeBlock->write();
	}
}