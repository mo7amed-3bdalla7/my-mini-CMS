
<h3>
	<i class="fa fa-angle-right"></i> Manage Users
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
	if ($action !== null && $action == 'edit') {
		$item = isset ( $_GET ['item'] ) ? intval ( $_GET ['item'] ) : null;
		if ($item) {
			$item_users = user::read ( 'SELECT * FROM users  WHERE id=' . $item, PDO::FETCH_CLASS, 'user' );
		}
		if ($item_users != false) {
			if (isset ( $_POST ['save'] )) {
				$item_users->status = $_POST ['status'];
				$item_users->privilege = $_POST ['privilege'];
				if ($item_users->save ()) {
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
			$item_users = user::read ( 'SELECT * FROM users  WHERE id=' . $item, PDO::FETCH_CLASS, 'user' );
		}
		if ($item_users != false) {
			if ($item_users->delete ()) {
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
					<i class="fa fa-angle-right"></i> <?=$action .' user.';?>
				</h4>
				<form class="form-horizontal style-form" method="post">

					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Status</label>
						<div class="col-sm-9">
							<select name="status" class="form-control">
								<option
									<?= (isset($item_users)&&$item_users->status==1)?'selected':'';?>
									value="1">Enable</option>
								<option
									<?= (isset($item_users)&&$item_users->status==0)?'selected':'';?>
									value="0">Disable</option>
							</select> <span class="help-block">Enable or disable the user.</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">privilege</label>
						<div class="col-sm-9">
							<select name="privilege" class="form-control">
								<option
									<?= (isset($item_users)&&$item_users->privilege==1)?'selected':'';?>
									value="1">Admin</option>
								<option
									<?= (isset($item_users)&&$item_users->privilege==0)?'selected':'';?>
									value="0">Normal user</option>
							</select> <span class="help-block">choose user type .</span>
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
	echo user::control ();
?>		
</div>