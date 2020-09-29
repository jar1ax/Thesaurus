<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>

<div class="site-index">

<!--    <div class="jumbotron">-->
        <h1 align="center">Thesaurus</h1>

        <p class="lead" align="center">На сайте вы найдете коллекцию книг в жанре темного фэнтези</p>

<!--        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
<!--    </div>-->

    <div  class="body-content">

        <div    class="row">
            <div  class="col-lg-4">
                <h2><table>
                        <p><td><a class="btn btn-grad" href="http://localhost/Thesaurus/web/index.php?r=booklist">Книги &raquo;</a></td></p>
                    </table></h2>
                <br/>
<!--                --><?//=  Html::img('@web/uploads/7a18f7296afdf3aeae375b0c3046d5e4.jpg', ['alt'=>'Книги','width'=>300]);?>
                <?= Html::a(Html::img('@web/uploads/7a18f7296afdf3aeae375b0c3046d5e4.jpg', ['alt'=>'Книги','width'=>300]),
                    ['/booklist']);?>


            </div>


            <div  class="col-lg-4">
                <h2><table>

                        <td> <a class="btn btn-grad" href="http://localhost/Thesaurus/web/index.php?r=authors">Авторы &raquo;</a></td>
                    </table></h2>
                <br/>
<!--                --><?//= Html::img('@web/uploads/c17a88e2836252ec97ca9755be439845.jpg', ['alt'=>'Книги','width'=>300]); ?>
                <?= Html::a(Html::img('@web/uploads/c17a88e2836252ec97ca9755be439845.jpg', ['alt'=>'Книги','width'=>300]),
                    ['/authors']);?>


            </div>
<!--            <div class="col-lg-4">-->
<!--                <h2>Heading</h2>-->
<!---->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
<!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
<!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
<!--                    fugiat nulla pariatur.</p>-->
<!---->
<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
<!--            </div>-->
        </div>

    </div>
</div>
