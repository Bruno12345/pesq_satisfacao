<div id="resultado-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#resultado-update-form").serialize();

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("resultado/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#resultado-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('resultado-grid', {
                     
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
 
   $('#resultado-view-modal').modal('hide');
 var data="id="+id;

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("resultado/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#resultado-update-modal-container').html(data); 
                 $('#resultado-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
