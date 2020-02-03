<?
	$query_news="SELECT * FROM (select * from articles ORDER BY date DESC LIMIT 3) as foo ORDER BY foo.date DESC;";
	$result_news=mysql_query($query_news);
	if(mysql_num_rows($result_news)!==0){
		$row_news=mysql_fetch_assoc($result_news);
				echo '<div class="profile">';
					echo '<h2 class="newsheader">Ostatnie Wpisy</h2>';
				echo '</div>';
				
				echo '<div class="profile">';
				echo '<a class="orange" style="font-weight:bold;" href="showarticle.php?site='.$site.'&postid='.$row_news["id"].'">'.$row_news["title"].'</a>';
				echo '</div>';
			
		while($row_news = mysql_fetch_assoc($result_news)){
				echo '<div class="profile">';
				echo '<a class="orange" style="font-weight:bold;" href="showarticle.php?site='.$site.'&postid='.$row_news["id"].'">'.$row_news["title"].'</a>';
				echo '</div>';}
		}
	else{
			echo '<div class="text">';
				echo '<div class="post">';
					echo "Nie ma żadnych nowości.";
				echo '</div>';
			echo '</div>';}
?>