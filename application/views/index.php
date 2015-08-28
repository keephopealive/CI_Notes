<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<style type="text/css">
		div.note{
			width: 250px;
			height: 150px;
			border: 1px solid black;
			padding: 5px;
			display: inline-block;
		}
	</style>
	<script type="text/javascript" src="/assets/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('submit', 'form', function(){
				var that = this;
				$.post(
					$(this).attr('action'),
					$(this).serialize(),
					function(response){
						console.log("RESPONDED: ", response);
						if(response.type == 'create')
							$('div.notes').append(response.note);
						else if(response.type == 'delete')
							$(that).parent().remove();
					},
					"json"
				);
				return false;
			})
		});
	</script>
</head>
<body>
	<h1>New Note</h1>
	<form id='newNote' method='post' action='/notes/create'>
		<input type="text" name='title'>
		<input type="submit" >
	</form>
	<div class='notes'>
		<h1>Notes</h1>
<?php 	foreach($notes as $note){ ?>
			<div class='note'>
				<h3><?= $note['title'] ?></h3>
				<form method='post' action='/notes/update'>
					<input type="hidden" name='id' value='<?= $note['id']; ?>'>
					<textarea name='content'><?= $note['content'] ?></textarea>
					<input type="submit" value="Update">
				</form>
				<form method="post" action="/notes/delete">
					<input type="hidden" name='id' value='<?= $note['id']; ?>'>
					<input type="submit" value="Delete">
				</form>
			</div>
<?php 	} ?>
	</div>
</body>
</html>