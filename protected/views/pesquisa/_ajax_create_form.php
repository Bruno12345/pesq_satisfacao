
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

function adicionaPerguntas(idSegmento, nome, botaoAtivo) {
    var idPergunta = "Pesquisa_Pergunta_"+ jQuery('#pesquisa-id').val() +"_"+ jQuery('#cliente-id').val() +"_"+ idSegmento;
    var buttoGroup = "<input name='Pesquisa[Pergunta_"+ jQuery('#pesquisa-id').val() +"_"+ jQuery('#cliente-id').val() +"_"+ idSegmento +"]' type='hidden' id='" + idPergunta + "_hidden'>";
        buttoGroup +="<div style='display: none;' class=\"span12\" id='" + idPergunta + "'>"+ nome +" &nbsp;";
        buttoGroup +="    <div class='btn-group'>";
        buttoGroup +="        <a class='btn btn-info btn-mini'>1</a>";
        buttoGroup +="        <a class='btn btn-info btn-mini'>2</a>";
        buttoGroup +="        <a class='btn btn-info btn-mini'>3</a>";
        buttoGroup +="        <a class='btn btn-info btn-mini'>4</a>";
        buttoGroup +="        <a class='btn btn-info btn-mini'>5</a>";
        buttoGroup +="    </div>";
        buttoGroup +="</div>";
    if (!botaoAtivo) {
        jQuery("#bodyContentQuestion").append(buttoGroup);
        jQuery('#' + idPergunta).show('slow');
    } else {
        jQuery('#' + idPergunta).remove();
        jQuery('#' + idPergunta + '_hidden').remove();
    }
}
</script>
