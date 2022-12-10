<h1><?php echo $info['titulo']; ?> (<?php echo $qt_membros; ?> membro<?php echo ($qt_membros=='1')?'':'s'; ?>)</h1>
<?php if($is_membro): ?>

<div class="post_area">
	<form method="POST" enctype="multipart/form-data">
		<h4>O que você está pensando?</h4>
		<textarea name="post" class="form-control"></textarea><br/>
		<input type="file" name="foto" /><br/>
		<input type="submit" value="Enviar" class="btn btn-default" />
	</form>
</div>
<div class="feed">
	<?php
	foreach($feed as $postitem) {
		$this->loadView('postitem', $postitem);
	}
	?>
</div>

<?php else: ?>

<h3>Você não é membro deste grupo.</h3>
<a href="<?php echo BASE; ?>grupos/entrar/<?php echo $id_grupo; ?>" class="btn btn-default">Entrar no Grupo</a>

<?php endif;?>