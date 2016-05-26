<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'codename',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{view} {update} {delete} {predict}',
        'buttons' => [
            'view' => function ($url, $model) {
                if(Yii::$app->user->id == 1){
                    return Html::a('<span class="fa fa-search"></span>', $url,
                        [
                            'role'=>'modal-remote',
                            'title'=>'View',
                            'data-toggle'=>'tooltip'
                        ]);
                }
            },
            'update' => function ($url, $model) {
                if(Yii::$app->user->id == 1){
                    return Html::a('<span class="fa fa-pencil"></span>', $url,
                        [
                            'role'=>'modal-remote',
                            'title'=>'Update',
                            'data-toggle'=>'tooltip'
                        ]);
                }
            },
            'delete' => function ($url, $model) {
                if(Yii::$app->user->id == 1){
                    return Html::a('<span class="fa fa-trash"></span>', $url,
                        [
                            'role'=>'modal-remote',
                            'title'=>'Delete',
                            'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                            'data-request-method'=>'post',
                            'data-toggle'=>'tooltip',
                            'data-confirm-title'=>'¿Estás seguro?',
                            'data-confirm-message'=>'¿Seguro que deseas eliminar esta materia?'
                        ]);
                }
            },
            'predict'=>function($url, $model){
                $options = ['data-toggle'=>'tooltip'];
                $title = Yii::t('app', 'Predecir');
                $icon = '<span class="glyphicon glyphicon-tags"></span>';
                $label = ArrayHelper::remove($options, 'label', $icon);
                $options = ArrayHelper::merge(['title' => $title, 'data-pjax' => '0'], $options);
                $url = Url::toRoute(['predict','id'=>$model->id]);
                return Html::a($label, $url, $options);
            }
        ],
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) {
            return Url::to([$action,'id'=>$key]);
        },
        /*
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete',
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'],
        */
    ],

];   