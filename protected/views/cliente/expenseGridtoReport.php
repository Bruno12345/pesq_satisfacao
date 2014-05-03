<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      cnpj		</th>
 		<th width="80px">
		      razao_social		</th>
 		<th width="80px">
		      nome_fantasia		</th>
 		<th width="80px">
		      endereco_id		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->cnpj; ?>
		</td>
       		<td>
			<?php echo $row->razao_social; ?>
		</td>
       		<td>
			<?php echo $row->nome_fantasia; ?>
		</td>
       		<td>
			<?php echo $row->endereco_id; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
