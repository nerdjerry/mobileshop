<?php
	include_once 'header.php';
	include_once 'main_head.html';
	?>
	<!--Content-->
	<div class="section box">

		<form action="login.php" method="post">
			<fieldset>
				<legend>Login</legend>
				<p>
					<label for="username">Username:<span style="color:red">*</span></label>
					<input type="text" name="username" value="" required="" />
				</p>
				<p>
					<label for="password">Password:<span style="color:red">*</span></label>
					<input type="password" name="password" value="" required="" />
				</p>
				<p>
					<label></label>
					<input type="submit" name="login" value="Login" />
				</p>
			</fieldset>
		</form>
		<form action="register.php" method="post">
			<fieldset>
				<legend>Create Account</legend>
				<p>
					<label for="username">Username:<span style="color:red">*</span></label>
					<input type="text" name="username" value="" required="" />
				</p>
				<p>
					<label for="password">Password:<span style="color:red">*</span></label>
					<input type="password" name="password" value="" required="" />
				</p>
				<p>
					<label for="email">Email ID:<span style="color:red">*</span></label>
					<input type="email" name="email" value="" required="" />
				</p>
				<p>
					<label for="first_name">First Name:<span style="color:red">*</span></label>
					<input type="text" name="first_name" value="" required="" />
				</p>
				<p>
					<label for="last_name">Last Name:<span style="color:red">*</span></label>
					<input type="text" name="last_name" value="" required="" />
				</p>
					<input type="hidden" name="role" value="user" required=""/>
				<p>
					<label></label>
					<input type="submit" name="register" value="Create Account" />
				</p>
			</fieldset>
		</form>
	</div>
	<!--End of Content-->
<?php
	include_once 'main_footer.html';
	include_once 'footer.html';

?>