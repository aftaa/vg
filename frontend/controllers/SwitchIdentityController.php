<?php

namespace frontend\controllers;

use common\models\User;
use yii\db\Query;
use yii\web\Controller;

class SwitchIdentityController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex(): string
    {
        $letters = (new Query)
            ->select('SUBSTRING(username FROM 1 FOR 1) AS letter, COUNT(username) AS count')
            ->from(User::tableName())
            ->groupBy('letter')
            ->orderBy('letter')
            ->all();

        return $this->render('index', [
            'letters' => $letters,
        ]);
    }

    /**
     * @param string $letter
     * @return string
     */
    public function actionByFirstLetter(string $letter): string
    {
        return $this->render('by-first-letter', []);
    }
}
