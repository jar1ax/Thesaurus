<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>

<div class="site-index">


        <h1 align="center">Thesaurus</h1>

        <p class="lead" align="center">На сайте вы найдете коллекцию книг в жанре темного фэнтези</p>



    <div  class="body-content">

        <div    class="row">
            <div  class="col-lg-4">
                <h2><table>
                        <p><td><a class="btn btn-grad" href="http://localhost/Thesaurus/web/index.php?r=booklist">Книги &raquo;</a></td></p>
                    </table></h2>
                <br/>

                <?= Html::a(Html::img('@web/uploads/7a18f7296afdf3aeae375b0c3046d5e4.jpg', ['alt'=>'Книги','width'=>300]),
                    ['/booklist']);?>


            </div>


            <div  class="col-lg-4">
                <h2><table>

                        <td> <a class="btn btn-grad" href="http://localhost/Thesaurus/web/index.php?r=authors">Авторы &raquo;</a></td>
                    </table></h2>
                <br/>

                <?= Html::a(Html::img('@web/uploads/c17a88e2836252ec97ca9755be439845.jpg', ['alt'=>'Книги','width'=>300]),
                    ['/authors']);?>


            </div>

        </div>

    </div>
</div>
