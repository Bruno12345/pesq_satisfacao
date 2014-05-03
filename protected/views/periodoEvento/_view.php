<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_inicial')); ?>:</b>
	<?php echo CHtml::encode($data->data_inicial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_final')); ?>:</b>
	<?php echo CHtml::encode($data->data_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evento_id')); ?>:</b>
	<?php echo CHtml::encode($data->evento_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pesquisa_id')); ?>:</b>
	<?php echo CHtml::encode($data->pesquisa_id); ?>
	<br />


</div>