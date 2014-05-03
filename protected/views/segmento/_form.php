<h1>Segmento</h1>
<div>

	<div class="form" id="div-form-segmento">
		<?php
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id' => 'segmento-form',
			'enableAjaxValidation' => false,
			'method' => 'post',
			'type' => 'horizontal',
			'htmlOptions' => array(
				'enctype' => 'multipart/form-data'
			)
		));
		$form instanceof TbActiveForm;
		?>
		<fieldset id="segmento">
			<legend>
				<h4 class="note">Campos com <span class="required">*</span> são obrigatórios.</h4>
			</legend>

			<div id="mensagem-segmento">
				<?php echo $form->errorSummary($model, 'Opps!!!', null, array('class' => 'alert alert-error span3')); ?>
			</div>

			<div class="control-group">		
				<div class="span4">
<?php echo $form->hiddenField($model, 'id', array('id' => 'segmento-id')); ?>
<?php echo $form->textFieldRow($model, 'nome'); ?>

				</div>   
			</div>
		</fieldset>

<?php $this->endWidget(); ?>

	</div>
</div>