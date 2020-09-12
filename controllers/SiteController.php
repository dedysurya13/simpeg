<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index'],
                'rules' => [
                    [
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionDashboard()
    {
        //query pegawai menurut TMT
        $queryPegawaiMenurutTmt = "
            SELECT YEAR(tmt) as tahun_masuk,
            (
                SELECT COUNT(s.id)
                FROM pegawai s
                WHERE YEAR(s.tmt)<=YEAR(p.tmt)
            ) as jumlah
            FROM pegawai p
            GROUP BY tahun_masuk
            ORDER BY tahun_masuk DESC LIMIT 10
        ";

        $pegawaiMenurutTmt = Yii::$app->db->createCommand($queryPegawaiMenurutTmt)->queryAll();

        //Query pegawai menurut pendidikan
        $queryPegawaiMenurutPendidikan = "SELECT m.nama, count(p.id) as jumlah FROM pegawai_pendidikan p left join master_tingkat_pendidikan m ON p.id_tingkat_pendidikan = m.id group by p.id_tingkat_pendidikan";

        $PegawaiMenurutPendidikan = Yii::$app->db->createCommand($queryPegawaiMenurutPendidikan)->queryAll();

        //Query pegawai menurut golongan
        $queryPegawaiMenurutGolongan="select m.golongan as nama, count(p.id) as jumlah from pegawai_pendidikan p left join master_pangkat_golongan m on p.id_master_pangkat_golongan = m.id group by p.id_master_pangkat_golongan";

        $queryPegawaiMenurutGolongan = Yii::$app->db->createCommand($queryPegawaiMenurutGolongan)->queryAll();
        
        return $this->render('dashboard',
            [
                'pegawaiMenurutTmt' => $pegawaiMenurutTmt,
                'pegawaiMenurutPendidikan' => $PegawaiMenurutPendidikan,
                'pegawaiMenurutGolongan' => $PegawaiMenurutGolongan
            ]
        );
    }
}
