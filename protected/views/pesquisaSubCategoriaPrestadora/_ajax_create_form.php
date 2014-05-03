
    <div id='pesquisa-sub-categoria-prestadora-create-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Create pesquisa-sub-categoria-prestadora</h3>
    </div>
    
    <div class="modal-body">
    
    <div class="form">

   <?php
   
         $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pesquisa-sub-categoria-prestadora-create-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'method'=>'post',
        'action'=>array("pesquisa-sub-categoria-prestadora/create"),
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
					  <?php echo $form->labelEx($model,'sub_categoria_id'); ?>
					  <?php echo $form->textField($model,'sub_categoria_id'); ?>
					  <?php echo $form->error($model,'sub_categoria_id'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'pesquisa_id'); ?>
					  <?php echo $form->textField($model,'pesquisa_id'); ?>
					  <?php echo $form->error($model,'pesquisa_id'); ?>
				  </div>

			  				  <div class="row">
					  <?php echo $form->labelEx($model,'prestadora_id'); ?>
					  <?php echo $form->textField($model,'prestadora_id'); ?>
					  <?php echo $form->error($model,'prestadora_id'); ?>
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
 
   var data=$("#pesquisa-sub-categoria-prestadora-create-form").serialize();
     


  jQuery.ajax({
   type: 'POST',
    url: '<?php
 echo Yii::app()->createAbsoluteUrl("pesquisa-sub-categoria-prestadora/create"); ?>',
   data:data,
success:function(data){
                //alert("succes:"+data); 
                if(data!="false")
                 {
                  $('#pesquisa-sub-categoria-prestadora-create-modal').modal('hide');
                  renderView(data);
                    $.fn.yiiGridView.update('pesquisa-sub-categoria-prestadora-grid', {
                     
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
  $('#pesquisa-sub-categoria-prestadora-create-form').each (function(){
  this.reset();
   });

  
  $('#pesquisa-sub-categoria-prestadora-view-modal').modal('hide');
  
  $('#pesquisa-sub-categoria-prestadora-create-modal').modal({
   show:true,
   
  });
}

</script>
