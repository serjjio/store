<?php
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

?>
<div class="content-wrapper">
  
    <?= Breadcrumbs::widget([
                /*'homeLink' => [
                    'label' => 'Admin',
                    'url' => ['/admin']
                ],*/
                'homeLink' => false,
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    
    <strong>Copyright &copy; 2016</strong>
  
</footer>

<!-- Control Sidebar -->
