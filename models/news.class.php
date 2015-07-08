<?php
class news extends databaseModel {
	public $id;
	public $title;
	public $user_id;
	public $created;
	public $content;
	public $cat;
	public $table_name = 'news';
	public $fields = array (
			'title',
			'user_id',
			'created',
			'content',
			'cat' 
	);
	public function __construct($title=null, $user_id=null, $created=null, $content=null,$cat=null) {
	if($title!=null)
		$this->title = $title;
	if($user_id!=null)
		$this->user_id = $user_id;
	if($created!=null)
		$this->created = $created;
	if($content!=null)
		$this->content = $content;
	if($cat!=null)
		$this->cat = $cat;
	
	}
	public static function control() {
		$view=$_GET['view'];
		$edit_url='cpanel?view='.$view.'&action=edit&item=';
		$add_url='cpanel?view='.$view.'&action=add';
		$delete_url='cpanel?view='.$view.'&action=delete&item=';
		$confirm='onclick="if(!confirm(\'Do you want to delete this item\'))return false;"';
		$allnews = self::read ( 'SELECT * FROM news', PDO::FETCH_CLASS, __CLASS__ );
		$table = '<div class="content-panel">
	
		<h4>
			<i class="fa fa-angle-right"></i> news Table <a href="'.$add_url.'" class="btn btn-success pull-right" style="margin-right: 10px;"><i class="fa fa-plus"></i> Add</a>
		</h4>
		<hr>
		<table class="table table-striped table-advance table-hover">
	
	
			<thead>
				<tr>
					<th><i class="fa fa-bullhorn"></i> #</th>
					<th class="hidden-phone"><i class="fa fa-files-o"></i> Categorie
						Name</th>
					<th><i class=" fa fa-edit"></i> Control</th>
					<th></th>
				</tr>
			</thead>
			<tbody>';
		//var_dump($allnews);
		if ($allnews != false && $allnews !== null) {
			if (is_object ( $allnews )) {
				$table .= '<tr>
					<td>1</td>
					<td class="hidden-phone">' . $allnews->title . '</td>
	
					<td><a href="'.$edit_url.$allnews->id.'" class="btn btn-primary btn-xs"> <i
							class="fa fa-pencil"></i>
					</a> <a href="'.$delete_url.$allnews->id.'" '.$confirm.' class="btn btn-danger btn-xs"> <i
							class="fa fa-trash-o "></i>
					</a></td>
				</tr>';
			} else {
				$i=1;
				foreach ( $allnews as $news ) {
					$table .= '<tr>
					<td>'.$i++.'</td>
					<td class="hidden-phone">' . $news->title . '</td>
			
					<td><a href="'.$edit_url.$news->id.'" class="btn btn-primary btn-xs"> <i
							class="fa fa-pencil"></i>
					</a> <a href="'.$delete_url.$news->id.'"  '.$confirm.' class="btn btn-danger btn-xs"> <i
							class="fa fa-trash-o "></i>
					</a></td>
				</tr>';
				}
			}
		} else {
			$table .= '<tr><td colspan="4" style="color:#E95656; text-align:center;" >No news found.. </td></tr>';
		}
		$table .= '</tbody></table></div>';
		return $table;
	}
}