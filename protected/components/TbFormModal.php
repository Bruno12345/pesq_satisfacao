<?php

class TbFormModal extends TbForm {

	/**
	 * Renders the body content of this form.
	 * This method mainly renders {@link elements} and {@link buttons}.
	 * If {@link title} or {@link description} is specified, they will be rendered as well.
	 * And if the associated model contains error, the error summary may also be displayed.
	 * The form tag will not be rendered. Please call {@link renderBegin} and {@link renderEnd}
	 * to render the open and close tags of the form.
	 * You may override this method to customize the rendering of the form.
	 * @return string the rendering result
	 */
	public function renderBody()
	{
		$output='';
		if($this->title!==null)
		{
			if($this->getParent() instanceof self)
			{
				$attributes=$this->attributes;
				unset($attributes['name'],$attributes['type']);
				$output=CHtml::openTag('fieldset', $attributes)."<legend>".$this->title."</legend>\n";
			}
			else
				$output="<fieldset>\n<legend>".$this->title."</legend>\n";
		}

		if($this->description!==null)
			$output.="<div class=\"description\">\n".$this->description."</div>\n";

		if($this->showErrorSummary && ($model=$this->getModel(false))!==null)
			$output.=$this->getActiveFormWidget()->errorSummary($model)."\n";

		$output.=CHtml::openTag('div', array('id' => 'formMain')) .
                CHtml::openTag('div', array('class' => 'well')) .
                CHtml::tag('button', array('class' => 'close', 'aria-hidden'=>'true', 'onClick' =>'js:jQuery(this).parent().remove()'), 'x') .
                $this->renderElements() .
                CHtml::htmlButton(
                    '<i class="icon-plus"></i> ',
                    array(
                        'class' => 'btn btn-success',
                        'onClick' =>'js:jQuery(this).parent().clone().appendTo("#formMain");',
                    )
                ) . 
                CHtml::closeTag('div') .
                CHtml::closeTag('div') .
                "\n".$this->renderButtons()."\n";

		if($this->title!==null)
			$output.="</fieldset>\n";

		return $output;
	}
}
