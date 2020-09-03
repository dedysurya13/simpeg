<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = 'Update Pegawai: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Pegawai', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pegawai-update">
    <div class="box box-success">
        <div>
            <h3 class="box-title"><?=Html::encode($this->title)?></h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', ['model'=>$model])?>
        </div>
    </div>
</div>
