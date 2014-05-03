<div id="endereco-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#endereco-update-form").serialize();

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("endereco/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#endereco-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('endereco-grid', {
                     
                         });
                 }
                 
              },
   error: function(data) { // if error occured
          alert(JSON.stringify(data)); 

    },

  dataType:'html'
  });

}

function renderUpdateForm(id)
{
 
   $('#endereco-view-modal').modal('hide');
 var data="id="+id;

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("endereco/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#endereco-update-modal-container').html(data); 
                 $('#endereco-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
