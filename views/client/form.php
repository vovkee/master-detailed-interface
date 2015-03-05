<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
$this->title = 'My Mdi';
?>

<div class="site-index">
    <div class="jumbotron">
        <p class="lead">Client create</p>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

            <?php $form = ActiveForm::begin(array(
                'options' => array('class' => 'form-horizontal', 'role' => 'form'),
            )); ?>
            <div class="form-group">
                <?php echo $form->field($model, 'name')->textInput(array('class' => 'form-control')); ?>
            </div>
            <div class="form-group">
                <?php echo $form->field($model, 'note')->textArea(array('class' => 'form-control')); ?>
            </div>
            <?php echo Html::submitButton('Submit', array('class' => 'btn btn-primary pull-right')); ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
