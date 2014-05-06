
<div id='segmento-create-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<?php
    echo CHtml::openTag('div', array('class' => 'modal-header'));
    echo CHtml::tag('button', array('class' => 'close', 'data-dismiss'=>'modal', 'aria-hidden'=>'true'), 'x');
    echo CHtml::closeTag('div');
    echo CHtml::openTag('div', array('class' => 'modal-body'));
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery.steps.js', CClientScript::POS_HEAD);
?>
<div id="modalContent"></div>

<?php 
	$oSegmento = new Segmento();
	$oCategoria = new Categoria();
	$oSubCategoria = new SubCategoria();
?>

<div id="wizard">
	<?php echo $this->renderPartial("//segmento/_form", array('model' => $oSegmento)); ?>
	<?php echo $this->renderPartial("//categoria/_form", array('model' => $oCategoria)); ?>
	<?php echo $this->renderPartial("//subCategoria/_form", array('model' => $oSubCategoria, 'arrayCategorias' => array())); ?>
</div>
<?php
    echo CHtml::closeTag('div');
?>
</div><!--end modal-->

<script type="text/javascript">
function create()
 {
 
   var data=$("#segmento-create-form").serialize();
     


  jQuery.ajax({
   type: 'POST',
    url: '<?php
 echo Yii::app()->createAbsoluteUrl("segmento/create"); ?>',
   data:data,
success:function(data){
                //alert("succes:"+data); 
                if(data!="false")
                 {
                  $('#segmento-create-modal').modal('hide');
                  renderView(data);
                    $.fn.yiiGridView.update('segmento-grid', {
                     
                         });
                   
                 }
                 
              },
   error: function(data) { // if error occured
         alert("Error occured.please try again");
         alert(data);
    },

  dataType:'html'
  });

}


function renderCreateForm(id)
{
	$('.modal').css('width', '800px');
	$('.modal').css('left', '45%');
	if(id == undefined){
	  $('#segmento-view-modal').modal('hide');
	}
	$.ajax({
		type: 'POST',
		async: false,
		url: '<?php echo Yii::app()->createUrl('segmento/atualizaDadosTela'); ?>',
		data : {id:id},
		success: function(result){
			$('#div-form-segmento').html($('#div-form-segmento',result).html());
		},
		error: function(request, error) {
			console.log(error);
			sucesso= false;
		},
	});
	  
  $('#segmento-create-modal').modal({
	show:true
  });
  resizeJquerySteps();
}

$('#segmento-create-modal').on('show',function(){if($( "#wizard" ).steps('getCurrentIndex') > 0) $( "#wizard" ).steps('reset')});

passo0 = function(){
	sucesso = true;
	$.ajax({
		type: 'POST',
		async: false,
		url: '<?php echo Yii::app()->createUrl('segmento/update'); ?>',
		data : $('#segmento-form').serialize(),
		success: function(result){
			if(isNaN(result)){
				$('#mensagem-segmento').replaceWith($('#mensagem-segmento',result));
				sucesso = false;
			}else{
				$('#segmento-id').val(result);
				$('#segmento-id-categoria').val(result);
				$.fn.yiiGridView.update('categoria-grid', {
					url: '<?php echo Yii::app()->createUrl('categoria/update'); ?>',
					type: 'POST',
					data: $('#categoria-form').serialize() + '&atualizacaoGrid=1',
					async: false
				});
			}
		},
		error: function(request, error) {
			console.log(error);
			sucesso= false;
		},
	});
		
	return sucesso;
}

passo1 = function(){
	sucesso = true;
	$.ajax({
		type: 'POST',
		async: false,
		url: '<?php echo Yii::app()->createUrl('categoria/existeCategoria'); ?>',
		data : $('#categoria-form').serialize(),
		success: function(result){
			if(isNaN(result)){
				$('#mensagem-categoria').replaceWith($('#mensagem-categoria',result));
				sucesso = false;
			}
		},
		error: function(request, error) {
			console.log(error);
			sucesso= false;
		},
	});
	
	if(sucesso === false){
		return false;
	}

	sucesso = true;
	$.ajax({
		type: 'POST',
		async: false,
		url: '<?php echo Yii::app()->createUrl('subCategoria/atualizaDadosTela'); ?>',
		data : $('#segmento-form').serialize(),
		success: function(result){
			$('#form-sub-categoria').html($('#form-sub-categoria',result).html());
		},
		error: function(request, error) {
			console.log(error);
			sucesso= false;
		},
	});
	
	return true;
}

finalizando = function(){
	sucesso = true;
	$.ajax({
		type: 'POST',
		async: false,
		url: '<?php echo Yii::app()->createUrl('subCategoria/existeSubCategoriaNaoCadastrada'); ?>',
		data : $('#segmento-form').serialize(),
		success: function(result){
			if(parseInt(result) === 1){
				sucesso = false;
			}
		},
		error: function(request, error) {
			console.log(error);
			sucesso= false;
		},
	});

	if(sucesso === true){
		return true;
	}

	$.ajax({
		type: 'POST',
		async: false,
		url: '<?php echo Yii::app()->createUrl('subCategoria/atualizaDadosTela'); ?>',
		data : $('#segmento-form').serialize() + "&validaForm=1",
		success: function(result){
			$('#form-sub-categoria').html($('#form-sub-categoria',result).html());
		},
		error: function(request, error) {
			console.log(error);
			sucesso= false;
		},
	});
	resizeJquerySteps();
	return sucesso;
}

$(document).on("click", "[id^='adiciona-sub-categoria-']", function(){
	categoriaId = $('#'+this.id).attr('categoriaId');
	form = "sub-categoria-form-"+categoriaId;
	
	$.ajax({
		type: 'POST',
		async: false,
		url: '<?php echo Yii::app()->createUrl('subCategoria/update'); ?>',
		data : $('#'+form+', #segmento-form').serialize(),
		success: function(result){
			$('#mensagem-sub-categoria-'+categoriaId).replaceWith($('#mensagem-sub-categoria-'+categoriaId,result));
			$('#categoria-grid-'+categoriaId).replaceWith($('#categoria-grid-'+categoriaId,result));
			$('#descricao-sub-categoria-'+categoriaId).val("");
		},
		error: function(request, error) {
			console.log(error);
			sucesso= false;
		},
	});
	resizeJquerySteps();
	return true;
});

$(document).on("click", "#adiciona-categoria", function(){
	sucesso = true;
	$.ajax({
		type: 'POST',
		async: false,
		url: '<?php echo Yii::app()->createUrl('categoria/update'); ?>',
		data : $('#categoria-form').serialize(),
		success: function(result){
			if(isNaN(result)){
				$('#mensagem-categoria').replaceWith($('#mensagem-categoria',result));
				sucesso = false;
			}else{
				$('#mensagem-categoria').hide("200");
				$('#mensagem-categoria').html("");
				$("#descricao_categoria").val("");
				$.fn.yiiGridView.update('categoria-grid', {
					url: '<?php echo Yii::app()->createUrl('categoria/update'); ?>',
					type: 'POST',
					data: $('#categoria-form').serialize() + '&atualizacaoGrid=1'
				});	
			}
		},
		error: function(request, error) {
			console.log(error);
			sucesso= false;
		},
	});
	resizeJquerySteps();
	return sucesso;
});


//renderCreateModalForm();
jQuery("#wizard").steps({
	stepsOrientation: "vertical",
	transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex) { 
						if(currentIndex > newIndex) return true;
						switch(currentIndex){
							case 0:
								return passo0();
							break;
							case 1:
								return passo1();
							break;
						}
						return true;
					},
	onFinishing: function (event, currentIndex) { if(!finalizando()){return false} window.location.reload(true);},
	onStepChanged: function (event, currentIndex, priorIndex) {
						resizeJquerySteps();
	},
    labels: {
        current: "Passo atual:",
        pagination: "Paginação",
        finish: "Finalizar",
        next: "Próximo",
        previous: "Voltar",
        loading: "Carregando ..."
    }
	,
});

function resizeJquerySteps() {
	$('.wizard .content').animate({ height: $('.body.current').outerHeight() }, "slow");
}
</script>
