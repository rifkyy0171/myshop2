<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesanan".
 *
 * @property string $id_pesanan
 * @property int $id_produk
 * @property int $jumlah
 * @property float $harga_jual
 * @property float $harga_bayar
 * @property string $nama_pemesan
 * @property string $alamat_pesanan
 * @property string $no_hp
 * @property int $status_bayar
 *
 * @property Produk $produk
 */
class Pesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pesanan', 'id_produk', 'jumlah', 'harga_jual', 'harga_bayar', 'nama_pemesan', 'alamat_pesanan', 'no_hp'], 'required'],
            [['harga_jual', 'harga_bayar'], 'number'],
            [['alamat_pesanan'], 'string'],
            [['id_pesanan'], 'string', 'max' => 15],
            [['nama_pemesan'], 'string', 'max' => 30],
            [['no_hp'], 'string', 'max' => 15],
            [['status_bayar'], 'string', 'max' => 4],
            [['id_pesanan'], 'unique'],
            [['id_produk'], 'exist', 'skipOnError' => true, 'targetClass' => Produk::class, 'targetAttribute' => ['id_produk' => 'id_produk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pesanan' => 'Id Pesanan',
            'id_produk' => 'Id Produk',
            'jumlah' => 'Jumlah',
            'harga_jual' => 'Harga Jual',
            'harga_bayar' => 'Harga Bayar',
            'nama_pemesan' => 'Nama Pemesan',
            'alamat_pesanan' => 'Alamat Pesanan',
            'no_hp' => 'No Hp',
            'status_bayar' => 'Status Bayar',
        ];
    }

    /**
     * Gets query for [[Produk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasOne(Produk::class, ['id_produk' => 'id_produk']);
    }
}
