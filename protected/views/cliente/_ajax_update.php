<div id="cliente-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#cliente-update-form").serialize();

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("cliente/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#cliente-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('cliente-grid', {
                     
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
 
   $('#cliente-view-modal').modal('hide');
 var data="id="+id;

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("cliente/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#cliente-update-modal-container').html(data); 
                 $('#cliente-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
