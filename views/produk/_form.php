<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Kategori;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $queryKategori = Kategori::find()->orderBy(['nama_kategori'=>SORT_ASC])->all();
        $dataKategori = Arrayhelper::map($queryKategori, 'id_kategori','nama_kategori');

        echo $form->field($model,'id_kategori')->dropDownList($dataKategori, [
            'prompt'=>'--Pilih Kategori'
        ])
    ?>
    <?= $form->field($model, 'nama_produk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'harga_jual')->textInput() ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
