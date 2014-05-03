<div id="periodo-evento-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#periodo-evento-update-form").serialize();

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("periodo-evento/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#periodo-evento-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('periodo-evento-grid', {
                     
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
 
   $('#periodo-evento-view-modal').modal('hide');
 var data="id="+id;

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("periodo-evento/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#periodo-evento-update-modal-container').html(data); 
                 $('#periodo-evento-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
