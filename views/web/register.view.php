<?php
if (isset($_POST['submit'])) {
    $user = new user($_POST['username']);
    $user->password = $_POST['password'];
    $user->email = $_POST['email'];
    $user->gender = $_POST['gender'];
    $cpassword = $_POST['cpassword'];
    $cemail = $_POST['cemail'];
    if ($user->user_exist()) {
        $msg .= '<li>username exists.</li>';
    }
    if ($user->email_exist()) {
        $msg .= '<li>email exists.</li>';
    }
    if ($user->email != $cemail) {
        $msg .= '<li>email not equal confirm email.</li>';
    }
    if ($user->password != $cpassword) {
        $msg .= '<li>password not equal confirm password.</li>';
    }
    if (empty($msg)) {
        $user->password = md5($user->username.$user->password.SAULT);
        $user->status = 0;
        $user->activation = md5($user->username.$user->password.$user->email.SAULT.time());
        $user->privilege = 0;
        if ($user->save()) {
            $message = 'please go to the link to activate your account.. <a href="'.HOST_NAME.'?view=activation&key='.$user->activation.'" >Click here</a>';
            if (!mail($user->email, 'Activation of the account .', $message)) {
                echo $message;
            }
            $msg = '<div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <h4>Success!</h4>
      User inserted successfully ..
     </div>';
        }
    } else {
        $msg = '<div class="alert alert-error">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <h4>Error!</h4><ul class="list-arrow-bold">'.$msg.'</ul></div>';
    }
}
?>
<div id="main" class="span8 contact-page image-preloader">

	<div class="row-fluid">
		<h1>Join Us</h1>
		<?=$msg?>

		<form id="register-form" method="post" action="">

			<label>User Name <span class="font-required">*</span></label> <input
				required type="text" name="username" maxlength="80" /> <label>Password <span
				class="font-required">*</span></label> <input type="password"
				required name="password" maxlength="80"> <label>Confirm Password <span
				class="font-required">*</span></label> <input type="password"
				required name="cpassword" maxlength="80"> <label>Email<span
				class="font-required">*</span></label> <input type="email"
				required name="email" maxlength="225"> <label>Confirm Email <span
				class="font-required">*</span></label> <input type="email"
				required name="cemail" maxlength="225"> <label>Gender <span
				class="font-required">*</span></label> <label class="labels"><input
				required checked type="radio" name="gender" value="1"> Male</label> <label
				class="labels"><input required type="radio" name="gender" value="0"> Female</label>
			<input type="submit" name="submit" value="Sign Up">

			<div class="data-status"></div>
			<!-- data submit status -->

		</form>
	</div>
</div>
