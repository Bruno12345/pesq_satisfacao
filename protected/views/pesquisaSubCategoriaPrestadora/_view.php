<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_categoria_id')); ?>:</b>
	<?php echo CHtml::encode($data->sub_categoria_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pesquisa_id')); ?>:</b>
	<?php echo CHtml::encode($data->pesquisa_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prestadora_id')); ?>:</b>
	<?php echo CHtml::encode($data->prestadora_id); ?>
	<br />


</div>