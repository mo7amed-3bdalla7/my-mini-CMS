
<h3>
	<i class="fa fa-angle-right"></i> Manage News Bar
</h3>
<div class="col-lg-12 main-chart">
<?php
$msg = isset ( $_GET ['msg'] ) ? $_GET ['msg'] : null;
if ($msg) {
	echo ' <div class="alert alert-success alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						  <strong>Successfully!</strong> ' . $msg . 'ing this item.
						</div>';
}

if ($action = isset ( $_GET ['action'] ) ? $_GET ['action'] : null) {
	if ($action !== null && $action == 'add') {
		if (isset ( $_POST ['save'] )) {
			$newsBar = new newsBar ();
			$newsBar->content = $_POST ['content'];
			$newsBar->created = date ( 'Y-m-d H-i-s' );
			if ($newsBar->save ()) {
				header ( 'location:?view=' . $_GET ['view'] . '&msg=add' );
			} else {
				echo ' <div class="alert alert-warning alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						  <strong>Warning!</strong> We can\'t add this item.
						</div>';
			}
		}
	} elseif ($action !== null && $action == 'edit') {
		$item = isset ( $_GET ['item'] ) ? intval ( $_GET ['item'] ) : null;
		if ($item) {
			$item_newsBar = newsBar::read ( 'SELECT * From newsBar  WHERE id=' . $item, PDO::FETCH_CLASS, 'newsBar' );
		}
		if ($item_newsBar != false) {
			if (isset ( $_POST ['save'] )) {
				
				$item_newsBar->content = $_POST ['content'];
				$item_newsBar->user_id = user::current_user ()->id;
				
				if ($item_newsBar->save ()) {
					header ( 'location:?view=' . $_GET ['view'] . '&msg=edit' );
				} else {
					echo ' <div class="alert alert-warning alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						  <strong>Warning!</strong> We can\'t edit this item.
						</div>';
				}
			}
		}
	} elseif ($action !== null && $action == 'delete') {
		$item = isset ( $_GET ['item'] ) ? intval ( $_GET ['item'] ) : null;
		if ($item) {
			$item_newsBar = news::read ( 'SELECT * From newsBar  WHERE id=' . $item, PDO::FETCH_CLASS, 'newsBar' );
		}
		if ($item_newsBar != false) {
			if ($item_newsBar->delete ()) {
				header ( 'location:?view=' . $_GET ['view'] . '&msg=delete' );
			} else {
				echo ' <div class="alert alert-warning alert-dismissable">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						  <strong>Warning!</strong> We can\'t delete this item.
						</div>';
			}
		}
	}
}

if ($action != null && ($action == 'edit' || $action == 'add')) {
	?>

<div class="row mt">
		<div class="col-lg-12">
			<div class="form-panel">
				<h4 class="mb">
					<i class="fa fa-angle-right"></i> <?=$action .' Categorie.';?>
				</h4>
				<form class="form-horizontal style-form" method="post">

					
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Content</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="6" cols="10" name="content"
								required><?= isset($item_newsBar)?$item_newsBar->content:'';?></textarea>
							<span class="help-block">Put the categorie content.</span>
						</div>
					</div>


					<button type="submit"
						class="btn btn-round btn-theme03 center-block" name="save">Save</button>

				</form>
			</div>
		</div>
		<!-- col-lg-12-->
	</div>
	<div class="row mt"></div>

	<?php
} else
	echo newsBar::control ();
?>		
</div>