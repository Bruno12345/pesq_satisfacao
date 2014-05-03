<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      voto		</th>
 		<th width="80px">
		      cliente_id		</th>
 		<th width="80px">
		      pesquisa_sub_categoria_prestadora_id		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->voto; ?>
		</td>
       		<td>
			<?php echo $row->cliente_id; ?>
		</td>
       		<td>
			<?php echo $row->pesquisa_sub_categoria_prestadora_id; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
