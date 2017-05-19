<?php

class pages extends databaseModel
{
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
    public $fields = [
            'user_id',
            'category_id',
            'created',
            'last_modified',
            'title',
            'slug',
            'content',
            'publish',
    ];

    public function __construct($user_id = null, $category_id = null, $created = null, $last_modified = null, $title = null, $slug = null, $content = null, $publish = null)
    {
        if ($user_id != null) {
            $this->user_id = $user_id;
        }
        if ($category_id != null) {
            $this->category_id = $category_id;
        }
        if ($created != null) {
            $this->created = $created;
        }
        if ($last_modified != null) {
            $this->last_modified = $last_modified;
        }
        if ($title != null) {
            $this->title = $title;
        }
        if ($slug != null) {
            $this->slug = $slug;
        }
        if ($content != null) {
            $this->content = $content;
        }
        if ($publish != null) {
            $this->publish = $publish;
        }
    }
}
