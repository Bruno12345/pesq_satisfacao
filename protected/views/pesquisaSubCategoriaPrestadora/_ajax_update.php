<div id="pesquisa-sub-categoria-prestadora-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#pesquisa-sub-categoria-prestadora-update-form").serialize();

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("pesquisa-sub-categoria-prestadora/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#pesquisa-sub-categoria-prestadora-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('pesquisa-sub-categoria-prestadora-grid', {
                     
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
 
   $('#pesquisa-sub-categoria-prestadora-view-modal').modal('hide');
 var data="id="+id;

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("pesquisa-sub-categoria-prestadora/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#pesquisa-sub-categoria-prestadora-update-modal-container').html(data); 
                 $('#pesquisa-sub-categoria-prestadora-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
