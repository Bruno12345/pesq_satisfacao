<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      descricao		</th>
 		<th width="80px">
		      tag		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->descricao; ?>
		</td>
       		<td>
			<?php echo $row->tag; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
