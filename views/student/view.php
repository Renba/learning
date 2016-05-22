<?php

use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use app\models\Subject;
use yii\helpers\Html;
use app\models\Grade;


/* @var $this yii\web\View */
/* @var $model app\models\Student */
?>
<div class="student-view">


   <div>
           <div class="col-sm-6">
           <?php $form = ActiveForm::begin(['action' => "qualify"]); ?>
               <?php
               $index = 1;
               foreach($subjects as $sub){
                 ?>
               <?= $form->field($model, 'user_id')->hiddenInput(['value'=> $model->user_id])->label(false) ?>
               <label for=""><?= $sub["name"]?></label>

               <input type="hidden" id="student-grade-id" class="form-control" name="Subject[<?=$index?>][subject]" value="<?= $sub["id"] ?>">

               <select id="student-name" class="form-control" name="Subject[<?= $index ?>][grade]">
                   <option value="0">Aprobado</option>
                   <option value="1">Reprobado</option>
                   <option value="2">No cursado</option>
               </select>

               <?php
                   $index ++;
               } ?>

               <?php if (!Yii::$app->request->isAjax){ ?>
                   <div class="form-group">
                       <?= Html::submitButton('Calificar',
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
</div>
