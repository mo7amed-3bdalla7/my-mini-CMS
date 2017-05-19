<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!user::auth($username, $password)) {
        $msg = '<div class="alert alert-error">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <h4>Error!</h4><ul class="list-arrow-bold"> username or  password not corrrect or you you may be disabled.</ul></div>';
    }
}

?>
<div id="main" class="span8 contact-page image-preloader">

	<div class="row-fluid">
		<h1>Log In</h1>
		<?=$msg?>

		<form id="register-form" method="post" action="">

			<label>User Name <span class="font-required">*</span></label> <input
				required type="text" name="username" maxlength="80" /> <label>Password
				<span class="font-required">*</span>
			</label> <input type="password" required name="password"
				maxlength="80"> <input type="submit" name="submit" value="Log in">

			<div class="data-status"></div>
			<!-- data submit status -->

		</form>
	</div>
</div>
