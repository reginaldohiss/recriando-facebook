<h1>Busca</h1>
<?php foreach($resultado as $pessoa): ?>
<div class="sugestaoitem">
	<strong><?php echo $pessoa['nome']; ?></strong>
	<button class="btn btn-default pull-right" onclick="addFriend('<?php echo $pessoa['id']; ?>', this)">+</button>
</div>
<?php endforeach; ?>