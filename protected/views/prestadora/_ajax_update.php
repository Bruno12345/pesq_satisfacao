<div id="prestadora-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#prestadora-update-form").serialize();

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("prestadora/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#prestadora-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('prestadora-grid', {
                     
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
 
   $('#prestadora-view-modal').modal('hide');
 var data="id="+id;

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("prestadora/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#prestadora-update-modal-container').html(data); 
                 $('#prestadora-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
