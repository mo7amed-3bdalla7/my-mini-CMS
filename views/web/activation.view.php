
<div id="main" class="span8 contact-page image-preloader">

	<div class="row-fluid">
	
<?php
if (isset($_GET['key'])) {
    $sql = 'SELECT * FROM users WHERE activation=\''.$_GET['key'].'\'';
    $check = user::read($sql, PDO::FETCH_CLASS, 'user');
    if ($check) {
        $check->status = 1;
        $check->activation = '';
        if ($check->save()) {
            echo'<div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <h4>Success!</h4>
      Account activated successfully ..
     </div>';
        }
    } else {
        echo '
		<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<h4>Error!</h4><ul class="list-arrow-bold">Activation code not found !</ul></div>';
    }
}?>

</div></div>