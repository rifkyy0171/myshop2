<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property int $id_produk
 * @property int $id_kategori
 * @property string $nama_produk
 * @property string $deskripsi
 * @property float $harga_jual
 * @property string $gambar_produk
 *
 * @property Pesanan[] $pesanans
 * @property Kategori $kategori
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

     
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * {@inheritdoc}
     */
    public $image;
    public function rules()
    {
        return [
            [['id_kategori', 'nama_produk', 'deskripsi', 'harga_jual'], 'required'],
            [['id_kategori'], 'integer'],
            [['deskripsi'], 'string'],
            [['harga_jual'], 'number'],
            [['nama_produk'], 'string', 'max' => 50],
            [['gambar_produk'], 'string', 'max' => 255],
            [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['id_kategori' => 'id_kategori']],

            ['image','file','extensions'=>['jpg','png','JPEG','JPG','gif'],
                'wrongExtension' => 'Hanya format gambar {extension} yang di izinkan untuk {attribute}',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_produk' => 'Id Produk',
            'id_kategori' => 'Id Kategori',
            'nama_produk' => 'Nama Produk',
            'deskripsi' => 'Deskripsi',
            'harga_jual' => 'Harga Jual',
            'gambar_produk' => 'Gambar Produk',
            'image' => 'Upload Gambar Produk',
        ];
    }

    /**
     * Gets query for [[Pesanans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPesanans()
    {
        return $this->hasMany(Pesanan::className(), ['id_produk' => 'id_produk']);
    }

    /**
     * Gets query for [[Kategori]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['id_kategori' => 'id_kategori']);
    }
}
