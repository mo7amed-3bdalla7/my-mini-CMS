<?php

class newsBar extends databaseModel
{
    public $id;
    public $content;
    public $created;
    public $user_id;
    public $table_name = 'newsBar';
    public $fields = [
            'content',
            'created',
            'user_id',
    ];

    public function __construct($content = false, $created = false, $user_id = false)
    {
        if ($content != false) {
            $this->content = $content;
        }
        if ($created != false) {
            $this->created = $created;
        }
        if ($user_id != false) {
            $this->user_id = $user_id;
        }

        // $this->lastlogin=date('y-m-d h:i:s');
    }

    public static function control()
    {
        $view = $_GET['view'];
        $edit_url = 'cpanel?view='.$view.'&action=edit&item=';
        $add_url = 'cpanel?view='.$view.'&action=add';
        $delete_url = 'cpanel?view='.$view.'&action=delete&item=';
        $confirm = 'onclick="if(!confirm(\'Do you want to delete this content\'))return false;"';
        $allNewsBar = self::read('SELECT * FROM newsBar ', PDO::FETCH_CLASS, __CLASS__);
        $table = '<div class="content-panel">
	
		<h4>
			<i class="fa fa-angle-right"></i> News Bar Table '.' <a href="'.$add_url.'" class="btn btn-success pull-right" style="margin-right: 10px;"><i class="fa fa-plus"></i> Add</a>

		</h4>
		<hr>
		<table class="table table-striped table-advance table-hover">
	
	
			<thead>
				<tr>
					<th><i class="fa fa-bullhorn"></i> #</th>
					<th class="hidden-phone"><i class="fa fa-files-o"></i> Content</th>
					<th><i class=" fa fa-edit"></i> Control</th>
					<th></th>
				</tr>
			</thead>
			<tbody>';
        // var_dump($allusers);
        if ($allNewsBar != false && $allNewsBar !== null) {
            if (is_object($allNewsBar)) {
                $table .= '<tr>
					<td>1</td>
					<td class="hidden-phone">'.$allNewsBar->content.'</td>
	
					<td><a href="'.$edit_url.$allNewsBar->id.'" class="btn btn-primary btn-xs"> <i
							class="fa fa-pencil"></i>
					</a> <a href="'.$delete_url.$allNewsBar->id.'" '.$confirm.' class="btn btn-danger btn-xs"> <i
							class="fa fa-trash-o "></i>
					</a></td>
				</tr>';
            } else {
                $i = 1;
                foreach ($allNewsBar as $newsBar) {
                    $table .= '<tr>
					<td>'.$i++.'</td>
					<td class="hidden-phone">'.$newsBar->content.'</td>
		
					<td><a href="'.$edit_url.$newsBar->id.'" class="btn btn-primary btn-xs"> <i
							class="fa fa-pencil"></i>
					</a> <a href="'.$delete_url.$newsBar->id.'"  '.$confirm.' class="btn btn-danger btn-xs"> <i
							class="fa fa-trash-o "></i>
					</a></td>
				</tr>';
                }
            }
        } else {
            $table .= '<tr><td colspan="4" style="color:#E95656; text-align:center;" >No users found.. </td></tr>';
        }
        $table .= '</tbody></table></div>';

        return $table;
    }
}
