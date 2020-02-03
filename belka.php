	<? $_SESSION['url']=$_SERVER['REQUEST_URI']; 
	$postid=$output['postid'];
	if(isset($output['name'])){
	$temp_name="&name=$name";}
	elseif(isset($output['postid'])){
		$temp_postid="&postid=$postid";}
	?>
		<div class="belka">
			<ul>
				<li class="left left_first"><a class="belkabtn" href="logged.php<?echo"?site=".$output['site'];?>">Glowna</a></li>
				<li class="left"><a class="belkabtn" href="refresh.php<?echo"?site=".$output['site']."".$temp_name."".$temp_postid;?>"><? if($output['site']=="lol"){echo("World of Tanks");}elseif($output['site']=="wot"){echo("League of Legends");}?></a>
				<li class="left"><a class="belkabtn" href="forum.php<?echo"?site=".$output['site'];?>">Forum</a></li>
				<li class="left left_last"><a class="belkabtn" href="contact.php<?echo"?site=".$output['site'];?>">Kontakt</a></li>
			</ul>
		</div>

	