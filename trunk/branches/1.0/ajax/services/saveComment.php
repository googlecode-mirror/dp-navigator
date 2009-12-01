<?php
function saveComment($comment){
	
$dpComment = new Comment();
$dpComment->setDp($comment['dp']);	
$dpComment->setComment($comment['comment']);	
$dpComment->setAutor($comment['autor']);
$dpComment->setDate(time());	
$commentId = $dpComment->saveDpComment();
return $commentId;
}
?>