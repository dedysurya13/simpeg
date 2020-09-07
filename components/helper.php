<?php
namespace app\components;

use Yii;
use yii\base\Component;

class helper extends Component{
    private $agama = [
        '1' => 'Islam',
        '2' => 'Kristen Protestan',
        '3' => 'Kristen Katolik',
        '4' => 'Hindu',
        '5' => 'Budha',
        '6' => 'Konghucu'
    ];
    private $jenisKelamin = [
        '1' => 'Laki-Laki',
        '2' => 'Perempuan'
    ];
    private $statusPegawai = [
        '1' => 'PNS',
        '2' => 'Kontrak'
    ];
    private $statusNikah = [
        '1' => 'Belum Menikah',
        '2' => 'Menikah',
        '3' => 'Cerai Hidup',
        '4' => 'Cerai Mati'
    ];
    private $pangkatGolonganArray = [
        '1' => 'IVe',
        '2' => 'IVd',
        '3' => 'IVc',
        '4' => 'IVb',
        '5' => 'IVa',
        '6' => 'IIId',
        '7' => 'IIIc',
        '8' => 'IIIb',
        '9' => 'IIIa',
        '10' => 'IId',
        '11' => 'IIc',
        '12' => 'IIb',
        '13' => 'IIa',
        '14' => 'Id',
        '15' => 'Ic',
        '16' => 'Ib',
        '17' => 'Ia',
    ];
    public function listAgama()
    {
        return $this->agama;
    }
    public function listJenisKelamin()
    {
        return $this->jenisKelamin;
    }
    public function listStatusPegawai()
    {
        return $this->statusPegawai;
    }
    public function listStatusNikah()
    {
        return $this->statusNikah;
    }


    public function getAgama($id)
    {
        return $this->agama[$id];
    }

    public function getJenisKelamin($id)
    {
        return $this->jenisKelamin[$id];
    }

    public function getStatusPegawai($id)
    {
        return $this->statusPegawai[$id];
    }

    public function getStatusNikah($id)
    {
        return $this->statusNikah[$id];
    }

}