<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      logradouro		</th>
 		<th width="80px">
		      bairro		</th>
 		<th width="80px">
		      uf		</th>
 		<th width="80px">
		      cep		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->logradouro; ?>
		</td>
       		<td>
			<?php echo $row->bairro; ?>
		</td>
       		<td>
			<?php echo $row->uf; ?>
		</td>
       		<td>
			<?php echo $row->cep; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
