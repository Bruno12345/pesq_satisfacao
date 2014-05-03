<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class WizardController extends Controller
{

    public function wizardStart($event) {
        $event->handled = true;
    }

    public function registrationWizardProcessStep($event) {
        $modelName = ucfirst($event->step);
        $model = new $modelName();
        $model->attributes = $event->data;
        $model->attributes = $event->sender->read();
        $form = $model->getForm();

        // Note that we also allow sumission via the Save button
        if (($form->submitted() || $form->submitted('save_draft')) && $form->validate()) {
            $event->sender->save($model->attributes);
            $event->handled = true;
        } else
            $this->render('/compartilhada/form', compact('event', 'form'));
    }

    public function wizardFinished($event) {
        if ($event->step === true)
            $this->render('/compartilhada/completed', compact('event'));
        else
            $this->render('/compartilhada/finished', compact('event'));

        $event->sender->reset();
        Yii::app()->end();
    }

    public function wizardInvalidStep($event) {
        Yii::app()->getUser()->setFlash('notice', $event->step . " não é uma etapa válida neste 'wizard'");
    }

}