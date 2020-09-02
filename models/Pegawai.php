<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $id
 * @property string $nip
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property int $agama
 * @property int $jenis_kelamin
 * @property int $nikah
 * @property int $status_pegawai
 * @property string $alamat
 * @property string $telepon
 * @property string $email
 * @property string $salt
 * @property string $password
 * @property string $created_date
 * @property int $created_by
 * @property string|null $updated_date
 * @property int|null $updated_by
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nip', 'nama', 'tempat_lahir', 'tanggal_lahir', 'agama', 'jenis_kelamin', 'nikah', 'status_pegawai', 'alamat', 'telepon', 'email', 'salt', 'password', 'created_date', 'created_by'], 'required'],
            [['nama', 'alamat', 'salt', 'password'], 'string'],
            [['tanggal_lahir', 'created_date', 'updated_date'], 'safe'],
            [['agama', 'jenis_kelamin', 'nikah', 'status_pegawai', 'created_by', 'updated_by'], 'integer'],
            [['nip', 'tempat_lahir', 'email'], 'string', 'max' => 32],
            [['telepon'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip' => 'Nip',
            'nama' => 'Nama',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'agama' => 'Agama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'nikah' => 'Nikah',
            'status_pegawai' => 'Status Pegawai',
            'alamat' => 'Alamat',
            'telepon' => 'Telepon',
            'email' => 'Email',
            'salt' => 'Salt',
            'password' => 'Password',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
        ];
    }
}