<?
	$forum_id=$output['forum_id'];
	
	$query_forum="SELECT * FROM forums WHERE forum_id='$forum_id'";
	$result_forum=mysql_query($query_forum);
	
	$query_cat="SELECT * FROM categories WHERE cat_forum='$forum_id'";
	$result_cat=mysql_query($query_cat);

	if(mysql_num_rows($result_forum)>0){
		$row_forum=mysql_fetch_assoc($result_forum);
?>
<div class="text">
	<?if($row['rank']>0)echo'<a class="create_forum right" href="create_topic_form.php?site='.$output['site'].'&forum_id='.$output['forum_id'].'">Stwórz Temat</a>'?>
	
	<?if($row['rank']>0)echo'<a class="create_forum right" style="margin-right:20px;" href="create_category_form.php?site='.$output['site'].'&forum_id='.$output['forum_id'].'">Stwórz Sub Forum</a>'?>
	<table class="forum" cellspacing="0" cellpadding="0">
		<tr class="forum_header">
			<th colspan="2"><?echo $row_forum['forum_name'];?></th>
		</tr>
		<?	if(mysql_num_rows($result_cat)>0){
				while($row_cat=mysql_fetch_assoc($result_cat)){
					$cat_id=$row_cat['cat_id'];
					$query_topic="SELECT * FROM topics WHERE topic_cat='$cat_id' ORDER BY topic_date DESC";
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
				echo '<tr>
						<td class="topics last_left">Brak Sub Forów</td><td class="last_right"> </td>
					<tr>';
			}
		echo '</table>
			<table class="forum" cellspacing="0" cellpadding="0">
				<tr class="forum_header">
				<th colspan="2">Tematy</th>
				</tr>';
		$query_topic="SELECT * FROM topics WHERE topic_forum='$forum_id'";
		$result_topic=mysql_query($query_topic);
		if(mysql_num_rows($result_topic)>0){
			while($row_topic=mysql_fetch_assoc($result_topic)){
				$query_post="SELECT * FROM posts WHERE post_topic='$topic_id' ORDER BY post_date DESC";
				$result_post=mysql_query($query_post);
				$row_post=mysql_fetch_assoc($result_post);?>
		<tr>
			<td class="subject w65p"><a href="show_topic.php?site=<?echo $output['site'].'&topic_id='.$row_topic['topic_id'];?>"><?echo $row_topic['topic_subject'];?></a></td>
			<td class="description">Ostatni post:</td>
		</tr>
		<tr>
			<td> </td>
			<td class="topics"><span class="gray">Temat: </span><a href="show_topic.php?site=<?echo $output['site'].'&topic_id='.$row_topic['topic_id'];?>"><?echo $row_topic['topic_subject'];?></a></td>
		</tr>
		<tr>
			<td class="last_left"> </td>
			<td class="topics last_right"><span class="gray">Przez: </span><a href="profile.php?site=<?echo $output['site'].'&name='.$row_post['post_by'];?>"><?echo $row_post['post_by'].'</a><br><span class="gray">Dnia:</span> '.$row_post['post_date'];?></td>
		</tr>
	
		<?	}
		}
		else{
			echo '<tr>
					<td class="topics last_left">Brak Tematów</td><td class="last_right"> </td>
				<tr>';}
	}
	else{
		echo '<tr>
				<td class="topics last_left">Brak Forów</td><td class="last_right"> </td>
			<tr>';
		}?>
	</table>
	<br>

</div>