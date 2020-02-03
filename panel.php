				<div class="menu">
				<ul>
					Zalogowany jako <span style="font-weight:bold;color:orange;"><?echo($_SESSION['login'])?></span>.
					<i><span style="font-weight:bold;color:gray;"><?if($row['rank']==0)echo('Użytkownik');elseif($row['rank']==1)echo('Moderator');elseif($row['rank']==2)echo('Administrator');?></span></i>
					<li class="none"><a href="profile.php<?echo"?site=$site&name=$login"?>">Profil</a></li>
					<li class="none"><a href="add_article.php<?echo"?site=$site"?>">Wstaw artykuł</a></li>
					<li class="none"><a href="logout.php">Wyloguj</a></li>
					<li>&nbsp;</li>
				</ul>
				</div>