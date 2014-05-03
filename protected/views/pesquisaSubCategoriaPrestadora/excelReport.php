<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      sub_categoria_id		</th>
 		<th width="80px">
		      pesquisa_id		</th>
 		<th width="80px">
		      prestadora_id		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->sub_categoria_id; ?>
		</td>
       		<td>
			<?php echo $row->pesquisa_id; ?>
		</td>
       		<td>
			<?php echo $row->prestadora_id; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
