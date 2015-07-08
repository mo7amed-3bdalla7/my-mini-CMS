<?php
class settings extends databaseModel {
	public $id;
	public $title;
	public $status;
	public $theme;
	public $table_name = 'settings';
	public $fields = array (
			'title',
			'status',
			'theme' 
	);
	public function __construct($title, $status, $theme) {
		$this->title = $title;
		$this->status = $status;
		$this->theme = $theme;
	}
}