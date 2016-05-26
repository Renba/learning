<?php
use kartik\grid\GridView;
use kartik\helpers\Html;
?>

<div class="col-sm-12">

        <?php if($mensaje=="2"){?>
                <?php if($result=="r"){?>
                        <h1 style="font-size:1550%"><span class="label label-danger">Reprobaras</span></h1>
                        <p style="margin-top: 5em">
                            <div class="panel panel-info">
                              <div class="panel-heading">Información</div>
                              <div class="panel-body">
                                <?php echo 'La historia dice que ' . $resultNumber . ' han reprobado'?>
                              </div>
                            </div>
                        </p>
                <?php }?>
                <?php if($result=="a"){?>
                        <h1 style="font-size:1700%"><span class="label label-success">Aprobaras</span></h1>
                        <p style="margin-top: 5em">
                            <div class="panel panel-info">
                              <div class="panel-heading ">Información</div>
                              <div class="panel-body">
                                <?php echo 'La historia dice que ' . $resultNumber . ' han aprobado'?>
                              </div>
                            </div>
                        </p>
                <?php }?>
                <?php if($result=="n"){?>
                        <h1 style="font-size:700%"><span class="label label-default">No hay información suficiente</span></h1>
                <?php }?>
        <?php }else{?>
                <h1 style="font-size:700%"><span class="label label-default">No hay información suficiente</span></h1>
        <?php } ?>
</div>


