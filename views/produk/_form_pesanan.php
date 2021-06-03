<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="pesanan-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id_pesanan')->textInput(['readonly'=>true]) ?>
    <?= $form->field($model, 'id_produk')->hiddenInput()->label(false) ?>
    <?= $form->field($produk, 'nama_produk')->textInput(['readonly'=>true]) ?>
    <?= $form->field($model, 'jumlah')->textInput(['readonly'=>true]) ?>
    <?= $form->field($model, 'harga_jual')->textInput(['readonly'=>true]) ?>
    <?= $form->field($model, 'harga_bayar')->textInput(['readonly'=>true]) ?>
    <?= $form->field($model, 'nama_pemesan')->textInput(['maxlength'=>true]) ?>
    <?= $form->field($model, 'alamat_pesanan')->textarea(['rows'=> 6]) ?>
    <?= $form->field($model, 'no_hp')->textInput(['maxlength'=> true]) ?>

    <div class="form_group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>