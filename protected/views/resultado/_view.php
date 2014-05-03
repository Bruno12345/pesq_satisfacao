<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voto')); ?>:</b>
	<?php echo CHtml::encode($data->voto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cliente_id')); ?>:</b>
	<?php echo CHtml::encode($data->cliente_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pesquisa_sub_categoria_prestadora_id')); ?>:</b>
	<?php echo CHtml::encode($data->pesquisa_sub_categoria_prestadora_id); ?>
	<br />


</div>