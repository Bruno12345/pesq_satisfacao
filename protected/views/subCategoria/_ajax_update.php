<div id="sub-categoria-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#sub-categoria-update-form").serialize();

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("sub-categoria/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#sub-categoria-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('sub-categoria-grid', {
                     
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
 
   $('#sub-categoria-view-modal').modal('hide');
 var data="id="+id;

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("sub-categoria/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#sub-categoria-update-modal-container').html(data); 
                 $('#sub-categoria-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
