<?php

class slideshow extends databaseModel
{
    public $id;
    public $file_name;
    public $title;
    public $description;
    public $table_name = 'slideshow';
    public $fields = [
            'file_name',
            'title',
            'description',
    ];

    public function __construct($file_name, $title, $description)
    {
        $this->file_name = $file_name;
        $this->title = $title;
        $this->description = $description;
    }
}
