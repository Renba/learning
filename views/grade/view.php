<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Grade */
?>
<div class="grade-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'subject_id',
            'student_id',
            'grade',
        ],
    ]) ?>

</div>
