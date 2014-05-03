<div id="categoria-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#categoria-update-form").serialize();

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("categoria/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#categoria-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('categoria-grid', {
                     
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
 
   $('#categoria-view-modal').modal('hide');
 var data="id="+id;

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("categoria/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#categoria-update-modal-container').html(data); 
                 $('#categoria-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
