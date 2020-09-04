<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PegawaiPangkatGolongan */

$this->title = 'Create Pegawai Pangkat Golongan';
$this->params['breadcrumbs'][] = ['label' => 'Pegawai Pangkat Golongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-pangkat-golongan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
