    <div id='endereco-update-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
   
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Update endereco #<?php echo $model->id; ?></h3>
    </div>
    
    <div class="modal-body">
 
    
    
    <div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'endereco-update-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("endereco/update"),
	'type'=>'horizontal',
	'htmlOptions'=>array(
                               'onsubmit'=>"return false;",/* Disable normal form submit */
                               'onkeypress'=>" if(event.keyCode == 13){ update(); } " /* Do ajax call when user presses enter key */
                            ),               
	
)); ?>
     	<fieldset>
		<legend>
			<p class="note">Fields with <span class="required">*</span> are required.</p>
		</legend>

	<?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span12')); ?>
        		
   <div class="control-group">		
			<div class="span4">
			
			<?php echo $form->hiddenField($model,'id',array()); ?>
			
	               				  <div class="row">
					  <?php echo $form->labelEx($model,'logradouro'); ?>
					  <?php echo $form->textField($model,'logradouro'); ?>
					  <?php echo $form->error($model,'logradouro'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'bairro'); ?>
					  <?php echo $form->textField($model,'bairro'); ?>
					  <?php echo $form->error($model,'bairro'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'uf'); ?>
					  <?php echo $form->textField($model,'uf',array('size'=>2,'maxlength'=>2)); ?>
					  <?php echo $form->error($model,'uf'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'cep'); ?>
					  <?php echo $form->textField($model,'cep'); ?>
					  <?php echo $form->error($model,'cep'); ?>
				  </div>

			  
                        </div>   
  </div>

  </div><!--end modal body-->
  
  <div class="modal-footer">
	<div class="form-actions">

	                
		<?php		
		 $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			//'id'=>'sub2',
			'type'=>'primary',
                        'icon'=>'ok white', 
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			'htmlOptions'=>array('onclick'=>'update();'),
		));
		
		?>
             
	</div> 
   </div><!--end modal footer-->	
</fieldset>

<?php $this->endWidget(); ?>

</div>


</div><!--end modal-->



