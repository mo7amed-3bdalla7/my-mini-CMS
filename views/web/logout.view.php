<?php
if(user::logedin()){
	$user=$_SESSION['user'];
	$user->logout();
}else{
	header('location:'.HOST_NAME.'?view=login');
}