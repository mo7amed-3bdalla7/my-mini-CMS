<?php
class pages extends databaseModel {
	public $id;
	public $user_id;
	public $category_id;
	public $created;
	public $last_modified;
	public $title;
	public $slug;
	public $content;
	public $publish;
	public $table_name = 'pages';
	public $fields = array (
			'user_id',
			'category_id',
			'created',
			'last_modified',
			'title',
			'slug',
			'content',
			'publish' 
	);
	public function __construct($user_id = NULL, $category_id = NULL, $created = NULL, $last_modified = NULL, $title = NULL, $slug = NULL, $content = NULL, $publish = NULL) {
		if ($user_id != NULL)
			$this->user_id = $user_id;
		if ($category_id != NULL)
			$this->category_id = $category_id;
		if ($created != NULL)
			$this->created = $created;
		if ($last_modified != NULL)
			$this->last_modified = $last_modified;
		if ($title != NULL)
			$this->title = $title;
		if ($slug != NULL)
			$this->slug = $slug;
		if ($content != NULL)
			$this->content = $content;
		if ($publish != NULL)
			$this->publish = $publish;
	}
}