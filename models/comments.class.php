<?php

class comments extends databaseModel
{
    public $id;
    public $user_id;
    public $content;
    public $created;
    public $table_name = 'comments';
    public $fields = [
            'user_id',
            'content',
            'created',
    ];

    public function __construct($user_id, $content, $created)
    {
        $this->user_id = $user_id;
        $this->created = $created;
        $this->content = $content;
    }
}
