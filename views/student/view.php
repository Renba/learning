<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
?>
<div class="student-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
