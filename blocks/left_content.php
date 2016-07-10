<div id="wrapper">
<div id="left_content">
	
<nav>
	<ul>
		<li> <a href="http://<?=SITE_NAME;?>/index"> Главная </a> </li>
		<li> <a href="http://<?=SITE_NAME;?>/articles"> Статьи </a> </li>
		<li> <a href="http://<?=SITE_NAME;?>/registration"> Регистрация </a> </li>

	</ul>

</nav>

<div id="auth">

	<?if($_SESSION['auth']['user']):?>

		<p> hello <?=$_SESSION['auth']['user']; ?> </p>
		<p id="exit"> <a href="http://<?=SITE_NAME;?>/logout"> EXIT </a>  </p>

	<?else:?>

		<table>
			<form method="post">
				<tr>
					<td>Login:</td>
					<td><input type="text" name="auth_login"></td>

				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="auth_password"></td>

				</tr>
				<tr>

					<td colspan="2"><input type="submit" name="auth" value="Войти"></td>
				</tr>
			</form>
		</table>


	<?endif;?>


</div>






</div> <!-- end div left_contnet -->