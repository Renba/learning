<?php

use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subject */
?>
<div class="subject-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'codename',
        ],
    ]) ?>

    <div class="col-sm-12">
        <h2>Agregar Análisis de Weka</h2>
        <?php $form = ActiveForm::begin(['action' => "set-tree"]); ?>

        <?= $form->field($model, 'id')->hiddenInput(['value'=> $model->id])->label(false) ?>

        <label for="">Instancias correctamente clasificadas</label>
        <input  id="result-result" class="form-control" name="Result[result]" value="80" type="number" required="true">

        <div class="form-group field-subject-name required">
            <label class="control-label" for="subject-name">Weka Result Tree</label>
            <textarea id="subject-name" class="form-control" name="Result[tree]" rows="12">Algebra Superior 1</textarea>
            <div class="help-block"></div>
        </div>

        <?php if (!Yii::$app->request->isAjax){ ?>
                <div class="form-group">
                    <?= Html::submitButton('Registrar reglas del arbol de decision',
                        [
                            'class' => 'btn btn-success',
                            'data-confirm' => 'Estás seguro que quiere calendarizar está solicitud?',
                        ]) ?>
                </div>
                <?php
            } ?>

            <?php ActiveForm::end(); ?>


    </div>
</div>
