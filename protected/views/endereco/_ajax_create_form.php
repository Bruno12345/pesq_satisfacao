
    <div id='endereco-create-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Create endereco</h3>
    </div>
    
    <div class="modal-body">
    
    <div class="form">

   <?php
   
         $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'endereco-create-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("endereco/create"),
	'type'=>'horizontal',
	'htmlOptions'=>array(
	                        'onsubmit'=>"return false;",/* Disable normal form submit */
                            ),
          'clientOptions'=>array(
                    'validateOnType'=>true,
                    'validateOnSubmit'=>true,
                    'afterValidate'=>'js:function(form, data, hasError) {
                                     if (!hasError)
                                        {    
                                          create();
                                        }
                                     }'
                                    

            ),                  
  
)); ?>
     	<fieldset>
		<legend>
			<p class="note">Fields with <span class="required">*</span> are required.</p>
		</legend>

	<?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span12')); ?>
        		
   <div class="control-group">		
			<div class="span4">
			
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
			'type'=>'primary',
                        'icon'=>'ok white', 
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
			)
			
		);
		
		?>
              <?php
 $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
                        'icon'=>'remove',  
			'label'=>'Reset',
		)); ?>
	</div> 
   </div><!--end modal footer-->	
</fieldset>

<?php
 $this->endWidget(); ?>

</div>

</div><!--end modal-->

<script type="text/javascript">
function create()
 {
 
   var data=$("#endereco-create-form").serialize();
     


  jQuery.ajax({
   type: 'POST',
    url: '<?php
 echo Yii::app()->createAbsoluteUrl("endereco/create"); ?>',
   data:data,
success:function(data){
                //alert("succes:"+data); 
                if(data!="false")
                 {
                  $('#endereco-create-modal').modal('hide');
                  renderView(data);
                    $.fn.yiiGridView.update('endereco-grid', {
                     
                         });
                   
                 }
                 
              },
   error: function(data) { // if error occured
         alert("Error occured.please try again");
         alert(data);
    },

  dataType:'html'
  });

}

function renderCreateForm()
{
  $('#endereco-create-form').each (function(){
  this.reset();
   });

  
  $('#endereco-view-modal').modal('hide');
  
  $('#endereco-create-modal').modal({
   show:true,
   
  });
}

</script>
