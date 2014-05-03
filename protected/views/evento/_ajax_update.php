<div id="evento-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#evento-update-form").serialize();

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("evento/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#evento-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('evento-grid', {
                     
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
 
   $('#evento-view-modal').modal('hide');
 var data="id="+id;

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("evento/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#evento-update-modal-container').html(data); 
                 $('#evento-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
