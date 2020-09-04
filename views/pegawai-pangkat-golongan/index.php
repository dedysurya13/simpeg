<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PegawaiPangkatGolonganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pegawai Pangkat Golongans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-pangkat-golongan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pegawai Pangkat Golongan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_master_pangkat_golongan',
            'id_pegawai',
            'tanggal_sk',
            'no_sk',
            //'scan:ntext',
            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
