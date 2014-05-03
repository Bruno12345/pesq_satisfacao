<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      data_inicial		</th>
 		<th width="80px">
		      data_final		</th>
 		<th width="80px">
		      email		</th>
 		<th width="80px">
		      evento_id		</th>
 		<th width="80px">
		      pesquisa_id		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->data_inicial; ?>
		</td>
       		<td>
			<?php echo $row->data_final; ?>
		</td>
       		<td>
			<?php echo $row->email; ?>
		</td>
       		<td>
			<?php echo $row->evento_id; ?>
		</td>
       		<td>
			<?php echo $row->pesquisa_id; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
