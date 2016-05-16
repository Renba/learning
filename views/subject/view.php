<?php

use yii\widgets\DetailView;

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

</div>
