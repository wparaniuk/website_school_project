<?
	$topic_id=$output['topic_id'];
	
	$query_topic="SELECT * FROM topics WHERE topic_id='$topic_id'";
	$result_topic=mysql_query($query_topic);
	
?>