<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i>My <?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<h3>My latest comic book purchases</h3>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'book-grid',
    'dataProvider'=>$model,
    'columns'=>array(
        'id', 'title', 'issue_number', 'type_id', 'publication_date', 'value', 'price', 'signed', 'grade_id', 'bagged',
    ),
));
?>