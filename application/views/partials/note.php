<div class='note'>
	<h3><?= $title ?></h3>
	<form method='post' action='/notes/update'>
		<input type='hidden' name='id' value='<?= $id ?>'>
		<textarea name='content'></textarea>
		<input type='submit' value='Update'>
	</form>
	<p></p>
	<form method='post' action='/notes/delete'>
		<input type='hidden' name='id' value='<?= $id ?>'>
		<input type='submit' value='Delete'>
	</form>
</div>