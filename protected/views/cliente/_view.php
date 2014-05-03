<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cnpj')); ?>:</b>
	<?php echo CHtml::encode($data->cnpj); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('razao_social')); ?>:</b>
	<?php echo CHtml::encode($data->razao_social); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome_fantasia')); ?>:</b>
	<?php echo CHtml::encode($data->nome_fantasia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endereco_id')); ?>:</b>
	<?php echo CHtml::encode($data->endereco_id); ?>
	<br />


</div>