
<div id='pesquisa-create-modal' class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<?php
    echo CHtml::openTag('div', array('class' => 'modal-header'));
    echo CHtml::tag('button', array('class' => 'close', 'data-dismiss'=>'modal', 'aria-hidden'=>'true'), 'x');
    echo CHtml::closeTag('div');
    echo CHtml::openTag('div', array('class' => 'modal-body'));
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery.steps.js', CClientScript::POS_HEAD);
?>

<div id="wizard">
    <?php echo $this->renderPartial("_form", array('model' => $oPesquisaForCreate)); ?>
    <?php echo $this->renderPartial("//cliente/_paraPesquisa", array('listaCliente' => $listaCliente)); ?>
    <?php echo $this->renderPartial("_montaPesquisa", array('model' => new PesquisaSubCategoriaPrestadora(), 'aSegmento'=> Segmento::model()->findAll())); ?>
</div>
<?php
    echo CHtml::closeTag('div');
?>
</div><!--end modal-->

<script type="text/javascript">

function renderCreateForm()
{
  $('#pesquisa-create-form').each (function(){
  this.reset();
   });

  $('.modal').css('width', '967px');
  $('.modal').css('left', '33%');

  $('#pesquisa-view-modal').modal('hide');
  $('#pesquisa-create-modal').modal({
   show:true
 });
}

passo0 = function(){
	sucesso = true;
	$.ajax({
		type: 'POST',
		async: false,
		url: '<?php echo Yii::app()->createUrl('pesquisa/update'); ?>',
		data : $('#pesquisa-form').serialize(),
		success: function(result){
			if(isNaN(result)){
				$('#mensagem-pesquisa').replaceWith($('#mensagem-pesquisa',result));
				sucesso = false;
			}else{
				$('#pesquisa-id').val(result);
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
    return !(jQuery('#cliente-id').val() == '');
}

finalizando = function(){
	sucesso = true;
    if ($('#pergunta-form').serialize() == '') {
        return false;
    }
	$.ajax({
		type: 'POST',
		async: false,
		url: '<?php echo Yii::app()->createUrl('pesquisaSubCategoriaPrestadora/adicionaPergunta'); ?>',
		data : $('#pergunta-form').serialize(),
		success: function(result){
			if(isNaN(result)){
				$('#mensagem-pesquisa').replaceWith($('#mensagem-pesquisa',result));
				sucesso = false;
			}
		},
		error: function(request, error) {
			console.log(error);
			sucesso= false;
		},
	});
		
	return sucesso;
}

jQuery("#wizard").steps({
	stepsOrientation: "vertical",
	transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex) { 
						switch(currentIndex){
							case 0:
								return passo0();
							break;
							case 1:
								return passo1();
							break;
						}
					},
    onFinishing: function (event, currentIndex) {
                    finalizando();
                    return false;
                },

    labels: {
        current: "Passo atual:",
        pagination: "Paginação",
        finish: "Finalizar",
        next: "Próximo",
        previous: "Voltar",
        loading: "Carregando ..."
    }
});

function adicionaPerguntas(idSegmento, botaoAtivo) {
    var pergunta = '{"Pesquisa": "' + jQuery('#pesquisa-id').val() + '","Cliente": "' + jQuery('#cliente-id').val() + '","Segmento": "' + idSegmento + '"}';
    if (!botaoAtivo) {
        jQuery('#' + idSegmento).show('slow', function(){resizeJquerySteps();});
        jQuery('#' + idSegmento + '_hidden').val(pergunta);
    } else {
        jQuery('#' + idSegmento).hide('slow', function(){resizeJquerySteps();});
        jQuery('#' + idSegmento + '_hidden').val('false');
    }
}

function resizeJquerySteps() {
	$('.wizard .content').animate({ height: $('.body.current').outerHeight() }, "slow");
}
</script>
