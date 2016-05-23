<?php
namespace app\controllers;
use app\models\Subject;
use app\models\Student;
use app\models\Grade;
use app\models\ReportForm;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ReportController extends Controller{
	public function actionIndex(){	
		$model = new ReportForm();
	    if($model->load(Yii::$app->request->post()) && $model) {
	    	$titulo = $model->titulo;
	      	header('Content-Type: text; charset=utf-8');
	      	header('Content-Disposition: attachment; filename='.$titulo.'.arff');
	      	$output = fopen('php://output', 'w');
	      
	      	$textoInicio = "@relation datos\n\n";
	      	fwrite($output, $textoInicio);

		    $rows = Subject::find()->all();
		    foreach ($rows as $row) {
			  	$Subject = $this->findSubject($row->getAttribute('id'));
			  	$materia = $row->getAttribute('codename');
			  	$materiaA = $materia."-a"; // aprobada
			  	$materiaR = $materia."-r"; // reprobada
			  	$materiaN = $materia."-n"; // no cursada
		      	$atributosMateria = "@attribute ".$materia." {'".$materiaA."', '".$materiaR."', '".$materiaN."'}\n";
		      	fwrite($output, $atributosMateria);
		    }
		    fwrite($output, "\n@data\n");

		    $estudiantes = Student::find()->all();
		    foreach ($estudiantes as $estudiante) {
			    $materias = Subject::find()->all();
			    $i = 0;
			    $numeroDeMaterias = count($materias);

			    foreach ($materias as $materia) {
			  		$nombreMateria = $materia->getAttribute('codename');

			  		// linea mágica que hace todo
			    	$grade = $this->findGrade($estudiante->getAttribute('user_id'), $materia->getAttribute('id'))->grade;
			    	if($grade == 0){
			    		$nombreMateria = $nombreMateria."-a";
			    	}
			    	if($grade == 1){
			    		$nombreMateria = $nombreMateria."-r";
			    	}
			    	if($grade == 2){
			    		$nombreMateria = $nombreMateria."-n";
			    	}

			    	if($i < $numeroDeMaterias - 1){
				    	fwrite($output, $nombreMateria.",");
			    	} else {
			    		fwrite($output, $nombreMateria);
			    	}
			    	$i++;
			    }
		    	fwrite($output, "\n");
		    }

		    fclose($output);
	    } else {        	
	    	return $this->render('index', ['model' => $model]);
	    }
	}

	protected function findSubject($id)
	{
	    if (($model = Subject::findOne($id)) !== null) {
	        return $model;
	    } else {
	        throw new NotFoundHttpException('The requested page does not exist.');
	    }
	}
	
	protected function findGrade($student_id, $subject_id)
	{
	    if (($model = Grade::findOne(['student_id' => $student_id, 'subject_id' => $subject_id])) !== null) {
	        return $model;
	    } else {
	    	throw new NotFoundHttpException('The requested page does not exist.');
	    }
	}
}