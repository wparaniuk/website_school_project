<?
	$postid=$output['postid'];
	$query_news="SELECT * from articles WHERE id='$postid';";
	$result_news=mysql_query($query_news);
		$row_news=mysql_fetch_assoc($result_news);
			echo '<div class="text">';
				echo '<div class="postbar">&nbsp;';
					echo '<span class="title left">'.$row_news["title"].'</span>';
					echo '<span class="timestamp right">'.$row_news["date"].'</span>';
				echo '</div>';
				echo '<div class="post">';
					echo $row_news['text'];
				echo '</div>';
				echo '<span class="author right gray">Stworzono przez: <a class="orange" href="profile.php?name='.$row_news["author"].'">'.$row_news["author"].'</a></span>';
			echo '</div>';
?>