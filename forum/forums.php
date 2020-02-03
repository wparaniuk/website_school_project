<?
	$query_forum="SELECT * FROM forums";
	$result_forum=mysql_query($query_forum);
	echo '<div class="text">';
	if(mysql_num_rows($result_forum)>0){
		if($row['rank']>0){
			echo'<a class="create_forum right" href="create_forum_form.php?site='.$output['site'].'">Stwórz Forum</a>'; 
		}
		while($row_forum=mysql_fetch_assoc($result_forum)){
		?>
	<table class="forum" cellspacing="0" cellpadding="0" style="margin-bottom:20px;">
		<tr class="forum_header">
			<th colspan="2"><a href="show_forum.php?site=<?echo $output['site'].'&forum_id='.$row_forum['forum_id'];?>"><?echo $row_forum['forum_name'];?></a></th>
		</tr>
		<?	$forum_id=$row_forum['forum_id'];
			$query_cat="SELECT * FROM categories WHERE cat_forum='$forum_id'";
			$result_cat=mysql_query($query_cat);
			if(mysql_num_rows($result_cat)>0){
				while($row_cat=mysql_fetch_assoc($result_cat)){
					$cat_id=$row_cat['cat_id'];
					$query_topic="SELECT * FROM topics WHERE topic_cat='$cat_id' OR topic_forum='$forum_id' ORDER BY topic_date DESC";
					$result_topic=mysql_query($query_topic);
					$row_topic=mysql_fetch_assoc($result_topic);
					$topic_id=$row_topic['topic_id'];
					
					$query_post="SELECT * FROM posts WHERE post_topic='$topic_id' ORDER BY post_date DESC";
					$result_post=mysql_query($query_post);
					$row_post=mysql_fetch_assoc($result_post);?>
		<tr>
			<td class="subject w65p"><a href="show_cat.php?site=<?echo $output['site'].'&cat_id='.$row_cat['cat_id'];?>"><?echo $row_cat['cat_name'];?></a></td>
			<td class="description">Ostatni post:</td>
		</tr>
		<tr>
			<td class="description"><?echo $row_cat['cat_description'];?></td>
			<td class="topics"><span class="gray">Temat: </span><a href="show_topic.php?site=<?echo $output['site'].'&topic_id='.$row_topic['topic_id'];?>"><?echo $row_topic['topic_subject'];?></a></td>
		</tr>
		<tr>
			<td class="last_left"> </td>
			<td class="topics last_right"><span class="gray">Przez: </span><a href="profile.php?site=<?echo $output['site'].'&name='.$row_post['post_by'];?>"><?echo $row_post['post_by'].'</a><br><span class="gray">Dnia:</span> '.$row_post['post_date'];?></td>
		</tr>
	
			<?	}
			}
			else{
				echo'<tr>
						<td class="topics" style="padding:10px;">Brak Sub Forów</td>
					</tr>';
				}
		echo'</table>';
		}
	}
	else{
			if($row['rank']>0){
				echo'<a class="create_forum right" href="create_forum_form.php?site='.$output['site'].'">Stwórz Forum</a>'; 
			}
			echo '<table class="forum" cellspacing="0" cellpadding="0" style="margin-bottom:20px;">
					<tr>
						<td class="topics" style="padding:10px;">Brak Forów</td>
					</tr>
				</table>';
	}?>	
</div>
