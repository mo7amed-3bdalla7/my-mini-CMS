<?php
class categories extends databaseModel {
	public $id;
	public $user_id;
	public $created;
	public $title;
	public $slug;
	public $content;
	public $table_name = 'categories';
	public $fields = array (
			'user_id',
			'created',
			'title',
			'slug',
			'content' 
	);
	public function __construct($user_id=null, $created=null, $title=null, $slug=null, $content=null) {
		if ($user_id!=null)
		$this->user_id = $user_id;
		if ($created!=null)
		$this->created = $created;
		if ($title=null)
		$this->title = $title;
		if ($slug!=null)
		$this->slug = $slug;
		if ($content!=null)
		$this->content = $content;
	}
	public static function control() {
		$view=$_GET['view'];
		$edit_url='cpanel?view='.$view.'&action=edit&item=';
		$add_url='cpanel?view='.$view.'&action=add';
		$delete_url='cpanel?view='.$view.'&action=delete&item=';
		$confirm='onclick="if(!confirm(\'Do you want to delete this item\'))return false;"';
		$allcategries = self::read ( 'SELECT * FROM categories', PDO::FETCH_CLASS, __CLASS__ );
		$table = '<div class="content-panel">
				
		<h4>
			<i class="fa fa-angle-right"></i> Categories Table <a href="'.$add_url.'" class="btn btn-success pull-right" style="margin-right: 10px;"><i class="fa fa-plus"></i> Add</a>
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
		//var_dump($allcategries);
		if ($allcategries != false && $allcategries !== null) {
			if (is_object ( $allcategries )) {
				$table .= '<tr>
					<td>1</td>
					<td class="hidden-phone">' . $allcategries->title . '</td>

					<td><a href="'.$edit_url.$allcategries->id.'" class="btn btn-primary btn-xs"> <i
							class="fa fa-pencil"></i>
					</a> <a href="'.$delete_url.$allcategries->id.'" '.$confirm.' class="btn btn-danger btn-xs"> <i
							class="fa fa-trash-o "></i>
					</a></td>
				</tr>';
			} else {
				$i=1;
				foreach ( $allcategries as $categrie ) {
					$table .= '<tr>
					<td>'.$i++.'</td>
					<td class="hidden-phone">' . $categrie->title . '</td>
					
					<td><a href="'.$edit_url.$categrie->id.'" class="btn btn-primary btn-xs"> <i
							class="fa fa-pencil"></i>
					</a> <a href="'.$delete_url.$categrie->id.'"  '.$confirm.' class="btn btn-danger btn-xs"> <i
							class="fa fa-trash-o "></i>
					</a></td>
				</tr>';
				}
			}
		} else {
			$table .= '<tr><td colspan="5" style="color:#E95656; text-align:center;" >No categories found.. </td></tr>';
		}
		$table .= '</tbody></table></div>';
		return $table;
	}
	
	
}