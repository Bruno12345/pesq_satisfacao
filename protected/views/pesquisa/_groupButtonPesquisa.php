<?php

$this->widget(
    'bootstrap.widgets.TbButtonGroup',
    array(
        'toggle' => 'radio',
        'type' => 'info',
        'size' => 'mini',
        'htmlOptions' => array(
            'id' => $idButtonGroup,
        ),
        'buttons' => array(
            array(
                'label' => '1',
                'htmlOptions' => array(
                    'data-value' => '1',
                    'onclick' => 'js:jQuery("#' . $idButtonGroup . '").val(jQuery(this).data("value"));'
                )
            ),
            array(
                'label' => '2',
                'htmlOptions' => array(
                    'data-value' => '2',
                    'onclick' => 'js:jQuery("#' . $idButtonGroup . '").val(jQuery(this).data("value"));'
                )
            ),
            array(
                'label' => '3',
                'htmlOptions' => array(
                    'data-value' => '3',
                    'onclick' => 'js:jQuery("#' . $idButtonGroup . '").val(jQuery(this).data("value"));'
                )
            ),
            array(
                'label' => '4',
                'htmlOptions' => array(
                    'data-value' => '4',
                    'onclick' => 'js:jQuery("#' . $idButtonGroup . '").val(jQuery(this).data("value"));'
                )
            ),
            array(
                'label' => '5',
                'htmlOptions' => array(
                    'data-value' => '5',
                    'onclick' => 'js:jQuery("#' . $idButtonGroup . '").val(jQuery(this).data("value"));'
                )
            ),
        ),
    )
);
?>
