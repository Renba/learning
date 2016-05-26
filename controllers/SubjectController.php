<?php

namespace app\controllers;

use app\models\Result;
use Yii;
use app\models\Subject;
use app\models\Node;
use app\models\Grade;
use app\models\SubjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use \yii\web\Response;
use yii\helpers\Html;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use yii\data\SqlDataProvider;


/**
 * SubjectController implements the CRUD actions for Subject model.
 */
class SubjectController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['view','update','create','delete'],
                'rules' =>[
                    [
                        'allow'=>true,
                        'actions'=>['view','update','create','delete'],
                        'matchCallback'=> function($rule,$action){
                            return Yii::$app->user->id==1;
                        }
                    ]
                ]
            ],
        ];
    }

    /**
     * Lists all Subject models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new SubjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Subject model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Subject #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Subject model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Subject();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Subject",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new Subject",
                    'content'=>'<span class="text-success">Create Subject success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new Subject",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Subject model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Subject #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Subject #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Subject #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     *
     * @param $id
     */
    public function actionSetTree()
    {
        $request = Yii::$app->request;
        $id = $request->post()['Subject']['id'];
        $result = $request->post()['Result']['result'];
        $tree = $request->post()['Result']['tree'];
        $tree1  = preg_replace('/\s+/', '', $tree);
        Result::deleteAll(['subject_id'=>$id]);
        $Result= new Result();
        $Result->subject_id = $id;
        $Result->result = $result;
        $Result->save();
        $lines=explode(",",$tree1);
        Node::deleteAll(['subject_id'=>$id]);
        $initNode= new Node();
        $initNode->subject_id = $id;
        $initNode->parent_id = $id;
        $initNode->grade = 0;
        $initNode->child_id = $this->getSubject($lines[0]);
        $initNode->results = "init";
        $initNode->save();

        for ($i = 0; $i<= count($lines)-1; $i++) {
            $node = $this->processLine($lines[$i]);
            $Node = new Node();
            $Node->subject_id = $id;
            $Node->parent_id = $node["parent"];
            $Node->grade = $node["grade"];
            $Node->results= $node["result"];

            if($i == count($lines)-1){
                $Node->child_id = $id;
            }else{
                $nodeNext=$this->processLine($lines[$i+1]);
                $Node->child_id = $nodeNext["parent"];

            }
            $Node->save();
        }

        return $this->redirect(['index']);
    }


    private function processLine($line){

        if($line != ''){
            $treeNode["level"] = $this->getLevel($line);
            $treeNode['parent'] = $this->getSubject($line);
            $treeNode['grade'] = $this->getGrade($line);
            $treeNode['result'] = $this->getResult($line);
        return $treeNode;
        }

    }

    private function getLevel($node){
        $nivel = 0;
        $subject_code = preg_replace('/\s+/', '', $node);
        $nivel = substr_count($node,"|");
    return $nivel;
    }

    private function getSubject($node){
        $subject_code = str_replace('|','',$node);
        $subject_code = preg_replace('/\s+/', '', $subject_code);
        $subject_code = explode('=',$subject_code);
        $subject_codename = $subject_code[0];
        $Subject= Subject::findOne(['codename'=>$subject_codename]);
    return $Subject->id;

    }

    private function getGrade($node){
        $subject_code = str_replace('|','',$node);
        $subject_code = preg_replace('/\s+/', '', $subject_code);
        $subject_code = explode('=',$subject_code);
        $subject_codename = $subject_code[1];
        $subject_grade= explode(':',$subject_codename);
        $subject_part =$subject_grade[0];
        $grade= $subject_part[strlen($subject_part)-1];

        switch($grade){
            case "a":
                return 0;
                break;
            case "r":
                return 1;
                break;
            case "n":
                return 2;
                break;
        }
    }

    private function getResult($node){
        $subject_code = str_replace('|','',$node);
        $subject_code = preg_replace('/\s+/', '', $subject_code);
        $subject_code = explode('=',$subject_code);
        $subject_codename = $subject_code[1];
       if(substr_count($node,":")>0){
            $subject_res = explode(':',$subject_codename);
           return $subject_res[1];
       }else{
           return "null";
       }
    }

    /**
     * Delete an existing Subject model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }

    }



     /**
     * Delete multiple existing Subject model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    public function actionPredict($id){
        $user_id= Yii::$app->user->id;

        $grades = $this->getGrades($user_id);
        $nodes = $this->getNodes($id);
        $mensaje="";
        $result="";
        $resulNumber="";
        if(count($grades) == 17){
            if(count($nodes)>0){
                $result1=$this->runTree($user_id,$id);
                $result=$this->parseGrade($result1);
                $mensaje="2";
                $resultNumber=$this->parseSolution($result1);
            }else{
                $mensaje= "1";
                $result="";
                $resultNumber="";
            }
        }else{
            $mensaje= "0";
            $result="";
            $resultNumber="";
        }

        return $this->render('predict', [
            'model' => $this->findModel($id),
            'mensaje'=> $mensaje,
            'result'=>$result,
            'resultNumber'=>$resultNumber
        ]);

    }

    private function getGrades($user_id){
        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT * FROM grades where student_id ='.$user_id,
        ]);

        $grades = $dataProvider->getModels();
        return $grades;
    }

    private function getNodes($subject_id){
        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT * FROM nodes where subject_id ='.$subject_id,
        ]);

        $grades = $dataProvider->getModels();
        return $grades;
    }
    private function runTree($student_id, $subject_id){
        $node=Node::find()->where(['subject_id' => $subject_id , 'parent_id'=> $subject_id])->one();
        $result="";

        while(($node->results == 'null' || $node->results =='init')){
            $nodeFather=$node;
            $grade= $this->getGradeFromStudent($nodeFather->child_id,$student_id);
            $nodeActual=Node::find()->where(['subject_id' => $subject_id , 'parent_id'=> $nodeFather->child_id,'grade'=> $grade])->one();
            $result=$nodeActual->results;
            $node=$nodeActual;

        }
        return $result;
    }

    private function getGradeFromStudent($subject_id,$student_id){
            $Grade= Grade::find()->where(['subject_id' => $subject_id , 'student_id'=> $student_id])->one();
            return $Grade->grade;
    }
    private function parseGrade($string){
        $result = preg_replace('/\s+/', '', $string);
        $result = explode('(',$string);
        $gradeResult= $result[0];
        $resultGrade=$gradeResult[strlen($gradeResult)-1];

        return $resultGrade;
    }

    private function parseSolution($string){
        $result = preg_replace('/\s+/', '', $string);
        $result = explode('(',$string);
        $gradeResult= $result[1];
        $resultNumber = str_replace(')','',$gradeResult);
        return $resultNumber;
    }


    /**
     * Finds the Subject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Subject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subject::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
