<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Shop - Toko Pakaian dan Accesories';
?>
<div class="site-index">
    <?= Html::img(Url::base().'/'.'image/header.jpg',['width' => '100%', 'height' =>200]) ?>
    <div class="body-content">
        <div class="row">
            <div align="center">
                <?php foreach ($dataProduk as $produk) { ?>
                    <div class="col-lg-4">
                        <h2><?= $produk->nama_produk ?></h2>
                        <?= Html::img(Url::base().'/'.$produk->gambar_produk,['width'=>'200px']) ?>

                        <p><?= $produk->deskripsi ?>  </p>
                        <p>
                            <?= Html::a('Detail',['produk/view','id'=>$produk->id_produk],[
                                'class'=>'btn btn-info',
                                'data-toggle'=>'modal',
                                'data-target'=>'#myModal',
                                'data-title'=>$produk->nama_produk,
                            ]) ?>
                            <?= Html::a('Beli >>',['produk/pesan','id'=>$produk->id_produk],[
                                'class'=>'btn btn-success',
                                'data-toggle'=>'modal',
                                'data-target'=>'#myModal',
                                'data-title'=>$produk->nama_produk,
                            ]) ?>
                        </p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
Modal::begin([
    'id'=> 'myModal',
    'header'=>'<h4 class = "modal-title">...</h4>',
    'size' => 'modal=md'
]);

Modal::end();
?>

<?php
    $this->registerJs("
        $('#myModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var modal = $(this)
            var title = button.data('title')
            var href = button.attr('href')
            modal.find('.modal-title').html(title)
            modal.find('.modal-body').html('<i class=\"fa fa-spinner  fa-spin\"></i>')
            $.post(href)
                .done(function(data){
                    modal.find('.modal-body').html(data)
                });
            })
    ");

