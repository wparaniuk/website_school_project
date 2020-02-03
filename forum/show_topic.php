<?
	$topic_id=$output['topic_id'];
	
	$query_topic="SELECT * FROM topics WHERE topic_id='$topic_id'";
	$result_topic=mysql_query($query_topic);
	
	$query_post="SELECT * FROM posts WHERE post_topic='$topic_id'";
	$result_post=mysql_query($query_post);
	
	
	
	
	if(mysql_num_rows($result_topic)>0){
		$row_topic=mysql_fetch_assoc($result_topic);
?>
<div class="topic_container">
	<?if($row['rank']>0)echo'<a class="create_forum left" href="delete_topic_form.php?site='.$output['site'].'&topic_id='.$output['topic_id'].'">Usuń Temat</a>'?>
	<?echo'<a class="create_forum right" href="create_post_form.php?site='.$output['site'].'&topic_id='.$output['topic_id'].'">Odpowiedz w Temacie</a>'?>
	<div class="posts_container">
		<span class="subject" style="display:block;"><?echo $row_topic['topic_subject'];?></span>
		<span class="gray" style="display:block;">przez: <?echo'<a class="orange" href="../profile.php?site='.$output['site'].'&name='.$row_topic['topic_by'].'">'.$row_topic['topic_by'].'</a>, '.$row_topic['topic_date'].''?></span>
	</div>
	<?if(mysql_num_rows($result_post)>0){
		while($row_post=mysql_fetch_assoc($result_post)){?>
	<div class="posts_container">
		<div class="left post_user_container" style="text-align:center;">
			<span style="font-weight:bold;font-size:20px;color:orange;display:block;"><?echo'<a class="orange" href="../profile.php?site='.$output['site'].'&name='.$row_post['post_by'].'">'.$row_post['post_by'].'</a>'?></span>
			<?	$written_by=$row_post['post_by'];
				$query_user="SELECT id,status,rank,postcount FROM users WHERE login='$written_by'";
				$result_user=mysql_query($query_user);	
				$row_user=mysql_fetch_assoc($result_user)	?>
			<a class="orange" href="../profile.php?site=<?echo $output['site'].'&name='.$row_post['post_by']?>">
			<img class="post_avatar" src="<?if($row_user['status']=='0'){echo'images/avatars/profiledefault.png';}else{echo'images/avatars/'.$row_user['id'].'-'.$row_post['post_by'].'.'.$row_user['status'].'';}?>"/></a>
			<span style="font-weight:bold;color:gray;display:block;font-style:italic;"><?if($row_user['rank']==0)echo('Użytkownik');elseif($row_user['rank']==1)echo('Moderator');elseif($row_user['rank']==2)echo('Administrator');?></span>
			<span style="font-weight:bold;color:gray;display:block;">Liczba postów: <?echo $row_user['postcount'];?></span>
		</div>
		
		<div class="post_content_container">
			<span style="font-size:15px;color:gray;display:block;">Data: <?echo $row_post['post_date'];?></span>
			<p><?echo $row_post['post_content'];?></p>
		</div>
	</div>
		<? }}} ?>	
</div>