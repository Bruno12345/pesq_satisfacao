<div id="pesquisa-update-modal-container" >

</div>

<script type="text/javascript">
function update()
 {
  
   var data=$("#pesquisa-update-form").serialize();

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("pesquisa/update"); ?>',
   data:data,
success:function(data){
                if(data!="false")
                 {
                  $('#pesquisa-update-modal').modal('hide');
                  renderView(data);
                  $.fn.yiiGridView.update('pesquisa-grid', {
                     
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
 
   $('#pesquisa-view-modal').modal('hide');
 var data="id="+id;

  jQuery.ajax({
   type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("pesquisa/update"); ?>',
   data:data,
success:function(data){
                 // alert("succes:"+data); 
                 $('#pesquisa-update-modal-container').html(data); 
                 $('#pesquisa-update-modal').modal('show');
              },
   error: function(data) { // if error occured
           alert(JSON.stringify(data)); 
         alert("Error occured.please try again");
    },

  dataType:'html'
  });

}
</script>
