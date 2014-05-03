<h1>Subcategoria</h1>
<div>
	<div class="form" id="form-sub-categoria">
		<fieldset>
			<legend>
				<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>
			</legend>
			<?php
			foreach ($arrayCategorias as $categoriaId => $nomeCategoria):
				$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
					'id' => "sub-categoria-form-$categoriaId",
					'enableAjaxValidation' => false,
					'method' => 'post',
					'type' => 'horizontal',
					'htmlOptions' => array(
						'enctype' => 'multipart/form-data'
					)
				));
				$form instanceof TbActiveForm;
				?>

				<div id="mensagem-sub-categoria-<?php echo $categoriaId; ?>">
					<?php 
						$model instanceof SubCategoria;
						$model->categoria_id = $categoriaId;
						if(isset($validaForm) && $validaForm == 1){ $model->existeAlgumaSubCategoria(); }
						echo $form->errorSummary($model, 'Opps!!!', null, array('class' => 'alert alert-error span12')); 
					?>
				</div>

				<div id="div-blocos-categorias-<?php echo $categoriaId; ?>">
					<?php
					echo "<div id='bloco-categoria-$categoriaId'>";
					echo CHtml::tag("h3", array(), $nomeCategoria);
					echo CHtml::openTag("div", array('class' => "control-group"));
					echo CHtml::openTag("div", array('class' => "span4 row-fluid"));
					echo $form->hiddenField($model, 'categoria_id');
					echo $form->label($model, 'nome', array('class' => 'span2', 'id' => "nome-categoria-$categoriaId"));
					echo $form->textField($model, 'nome', array('class' => 'span6', 'style' => 'float:left'));
					echo CHtml::htmlButton("<i class='icon-plus'></i>", array('class' => "btn btn-success", 'id' => "adiciona-sub-categoria-$categoriaId", 'categoriaId' => "$categoriaId"));
					echo CHtml::closeTag("div");
					echo CHtml::closeTag("div");

					$oModelCorrente = new SubCategoria();
					$oModelCorrente->categoria_id = $categoriaId;

					$this->widget('bootstrap.widgets.TbGridView', array(
						'id' => "categoria-grid-$categoriaId",
						'dataProvider' => $oModelCorrente->search(),
						'type' => 'striped bordered condensed',
						'template' => '{summary}{pager}{items}{pager}',
						'columns' => array(
							'nome',
							array(
								'type' => 'raw',
								'value' => '"
									<a href=\'javascript:void(0);\' onclick=\'delete_record_sub_categoria(".$data->id.",'.$categoriaId.')\'   class=\'btn btn-small view\'  ><i class=\'icon-trash\'></i></a>
								"',
								'htmlOptions' => array('style' => 'width:50px;')
							),
						),
					));
					echo "</div>";
					?>
				</div>

				<?php
				$this->endWidget();
			endforeach;
			?>
		</fieldset>
	</div>
</div>