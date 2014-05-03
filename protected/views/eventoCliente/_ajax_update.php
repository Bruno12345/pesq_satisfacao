<div id="evento-cliente-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#evento-cliente-update-form").serialize();

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("evento-cliente/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#evento-cliente-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('evento-cliente-grid', {
                     
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
 
   $('#evento-cliente-view-modal').modal('hide');
 var data="id="+id;

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("evento-cliente/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#evento-cliente-update-modal-container').html(data); 
                 $('#evento-cliente-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
