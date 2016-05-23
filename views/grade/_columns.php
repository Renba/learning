<?php
use yii\helpers\Url;

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
        'attribute'=>'subject_id',
        'label' => 'Materia',
        'value' => 'subject.name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'student_id',
        'label' => 'Estudiante',
        'value' => 'student.name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'grade',
        'label' => 'Calificación',
        'value' => function($dataProvider){
            if($dataProvider['grade'] == '0') return 'Aprobado';
            if($dataProvider['grade'] == '1') return 'Reprobado';
            if($dataProvider['grade'] == '2') return 'No cursado';
        }
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   