<div id="main_content">
	<h2>Регистрация</h2>
	
<div id="registration">
	<form method="post" action="/registration">
		<table>
	<tr>
		<td> Логин </td>
		<td> <input type="text" name="login"> </td>
	</tr>

	<tr>
		<td> Пароль </td>
		<td> <input type="password" name="password"> </td>
	</tr>

	<tr>
		<td> Подтвердите пароль </td>
		<td> <input type="password" name="confirm_password"> </td>
	</tr>

	<tr>
		<td> Почта </td>
		<td> <input type="email" name="mail"> </td>
	</tr>

	<tr>
		<td colspan="2"> <input type="submit" name="reg" value="зарегестрироваться"> </td>
	</tr>
		</table>
	</form>

</div>

<? if($_SESSION['reg']['result']): ?>
	<div class = "reg_answer">
		<p><?= $_SESSION['reg']['result'];?></p>
	</div>


<?php
unset($_SESSION['reg']['result']);
endif; ?>

</div> <!-- end div main_contnet -->
<div class="clear"></div>
</div><!-- end div wrapper -->