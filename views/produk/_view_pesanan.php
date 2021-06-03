<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View; */

$this->title = $model->id_pesanan;
$this->params['breadcrumbs'][] = ['label'=>'Pesanans','url'=>['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="view-pesanan">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Tutup', ['site/index'], ['class' => 'btn btn-warning']) ?>
    </p>
    <?= DetailView :: widget([
        'model' => $model,
        'attributes' => [
            'id_pesanan',
            'produk.nama_produk',
            'jumlah',
            'harga_jual',
            'harga_bayar',
            'nama_pemesan',
            'alamat_pesanan:ntext',
            'no_hp',
            //'status_bayar',
        ], 
    ]) ?>

    <p>Mohon segera lakukan pembayaran ke rekening berikut : </p>
    <p>
        No Rekening : 52150194 <br>
        A.N : Rifki Kurnia
        Bank : BCA
        Berita : <?= $model->id_pesanan ?>
    </p>
</div>