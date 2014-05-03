<div id="segmento-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#segmento-update-form").serialize();

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("segmento/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#segmento-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('segmento-grid', {
                     
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
 
   $('#segmento-view-modal').modal('hide');
 var data="id="+id;

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("segmento/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#segmento-update-modal-container').html(data); 
                 $('#segmento-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
