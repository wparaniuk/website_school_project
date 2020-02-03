<?
	$query_news="SELECT * FROM (select * from articles ORDER BY date DESC LIMIT 4) as foo ORDER BY foo.date DESC;";
	$result_news=mysql_query($query_news);
	if(mysql_num_rows($result_news)!==0){
		$row_news=mysql_fetch_assoc($result_news);
			
				echo '<div class="text">';
				echo '<div class="postbar">&nbsp;';
				echo '<a class="gray" href="showarticle.php?site='.$site.'&postid='.$row_news["id"].'">';
					echo '<span class="title left">'.$row_news["title"].'</span>';
				echo '</a>';
					echo '<span class="timestamp right">'.$row_news["date"].'</span>';
				echo '</div>';
					echo '<div class="post">';
							$news=$row_news['text'];
							$news=substr($news, 0, strpos($news, '<!--cut-->'));
							echo $news.'<br>';
							echo '<a class="orange" href="showarticle.php?site='.$site.'&postid='.$row_news["id"].'">';
								echo '<span style="font-size:20px;">Czytaj dalej...</span>';
							echo '</a>';
					echo '</div>';
				echo '<span class="author right gray">Stworzono przez: <a class="orange" href="profile.php?name='.$row_news["author"].'">'.$row_news["author"].'</a></span>';
				echo '</div>';
			
		while($row_news = mysql_fetch_assoc($result_news)){
			echo '<div class="text">';
				echo '<div class="postbar">&nbsp;';
				echo '<a class="gray" href="showarticle.php?site='.$site.'&postid='.$row_news["id"].'">';
					echo '<span class="title left">'.$row_news["title"].'</span>';
				echo '</a>';
					echo '<span class="timestamp right">'.$row_news["date"].'</span>';
				echo '</div>';
					echo '<div class="post">';
							$news=$row_news['text'];
							$news=substr($news, 0, strpos($news, '<!--cut-->'));
							echo $news.'<br>';
							echo '<a class="orange" href="showarticle.php?site='.$site.'&postid='.$row_news["id"].'">';
								echo '<span style="font-size:20px;">Czytaj dalej...</span>';
							echo '</a>';
					echo '</div>';
				echo '<span class="author right gray">Stworzono przez: <a class="orange" href="profile.php?name='.$row_news["author"].'">'.$row_news["author"].'</a></span>';
			echo '</div>';}
		}
	else{
			echo '<div class="text">';
				echo '<div class="post">';
					echo "Nie ma żadnych nowości.";
				echo '</div>';
			echo '</div>';}
?>