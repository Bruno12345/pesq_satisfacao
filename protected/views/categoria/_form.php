<h1>Categoria</h1>
<div>
	
<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'categoria-form',
	'enableAjaxValidation'=>false,
        'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
	)
)); 
$form instanceof TbActiveForm;
?>
     	<fieldset id='categoria'>
			<legend>
				<h4 class="note">Campos com <span class="required">*</span> são obrigatórios.</h4>
			</legend>

			<div id="mensagem-categoria">
				<?php echo $form->errorSummary($model, 'Opps!!!', null, array('class' => 'alert alert-error span3')); ?>
			</div>
        		
   <div class="control-group">		
			<div class="span4 row-fluid">

				<?php echo $form->label($model,'nome', array('class' => 'span2', 'id' => "nome-categoria")); ?>
				<?php echo $form->textField($model,'nome', array('class' => 'span6', 'style' => 'float:left', 'id' => 'descricao_categoria')); ?>
				<?php echo CHtml::htmlButton("<i class='icon-plus'></i>", array( 'class'=>"btn btn-success", 'id' => 'adiciona-categoria')); ?>
				<?php echo $form->hiddenField($model,'segmento_id',array('class'=>'span3', 'id' => 'segmento-id-categoria')); ?>

			</div>   
  </div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'categoria-grid',
	'dataProvider'=>$model->search(),
        'type'=>'striped bordered condensed',
        'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
				'nome',
               array(
		      'type'=>'raw',
		       'value'=>'"
					<a href=\'javascript:void(0);\' onclick=\'delete_record_categoria(".$data->id.")\'   class=\'btn btn-small view\'  ><i class=\'icon-trash\'></i></a>
				"',
				'htmlOptions'=>array('style'=>'width:50px;')  
		     ),
        
	),
)); 
?>
</fieldset>

<?php $this->endWidget(); ?>

</div>
</div>