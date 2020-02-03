<form method="post" action="edit/edit.php">
	<div id="popup_email" class="overlay">
		<div class="popup">
			<a class="close" href="#">&times;</a>
			<div class="popupcontent">
				<div class="email w4 left">
					<span class="gray"><? if($_SESSION['empty']=="email"){echo("Oba pola muszą być wypełnione.");}?></span><br>
					<input type="email" class="w4 orange left" name="email" placeholder="Nowy e-mail">
					<input type="email" class="w4 orange left" name="confirm_email" placeholder="Powtórz e-mail">
				</div>
				<input class="popupsave orange right titilium" type="submit" value="Zmien" name="emailbtn"/>
			</div>
		</div>
	</div>
<form>