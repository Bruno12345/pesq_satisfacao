 <div id='endereco-view-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
  
    
    
    <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
 
	  <div id="endereco-view-modal-container">
	  </div>


    </div>
	


</div><!--end modal--> 
<script>
function renderView(id)
{
 
 var data="id="+id;

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("endereco/view"); ?>',
   data:data,
success:function(data){
                 $('#endereco-view-modal-container').html(data); 
                 $('#endereco-view-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>