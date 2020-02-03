<?
	$cat_id=$output['cat_id'];
	
	$query_cat="SELECT * FROM categories WHERE cat_id='$cat_id'";
	$result_cat=mysql_query($query_cat);
	$row_cat=mysql_fetch_assoc($result_cat);
	
	$query_topic="SELECT * FROM topics WHERE topic_cat='$cat_id'";
	$result_topic=mysql_query($query_topic);
?>
<div class="text">
	<?	echo'<a class="create_forum right" href="create_topic_form.php?site='.$output['site'].'&cat_id='.$output['cat_id'].'">Stwórz Temat</a>';
		echo'<table class="forum" cellspacing="0" cellpadding="0">
		<tr class="forum_header">
			<th colspan="2">'.$row_cat['cat_name'].'</th>
		</tr>';
		if(mysql_num_rows($result_topic)==0){
			echo '<tr>
					<td class="topics last_left">Brak Tematów</td><td class="last_right"> </td>
				</tr>';}
		else{
			while($row_topic=mysql_fetch_assoc($result_topic)){ ?>
		<tr>
			<td class="subject w65p"><a href="show_topic.php?site=<?echo $output['site'].'&topic_id='.$row_topic['topic_id'];?>"><?echo $row_topic['topic_subject'];?></a></td><td class="description">Ostatni post:</td>
		</tr>
		<tr>
			<td class="description"><?	$topic_id=$row_topic['topic_id'];
										$query_post="SELECT * FROM posts WHERE post_topic='$topic_id'";
										$result_post=mysql_query($query_post);	
										$row_post=mysql_fetch_assoc($result_post);
										echo substr($row_post['post_content'],0,70).'...';?>
			</td><td class="topics">aaa last posta</td>
		</tr>
		<tr>
			<td class="topics last_left"></td><td class="topics last_right">Data aaa autor</td>
		</tr>
	<?	}} ?>
	</table>
	<br>
</div>