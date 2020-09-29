<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\bootstrap\Modal;
use yii\helpers\Url;
$this->title = 'Thesaurus CRUD ';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><?php
