<?php
$this->breadcrumbs=array(
	'Configs'=>array('index'),
	$model->variable,
);

$this->menu=array(
	array('label'=>'List config', 'url'=>array('index')),
	array('label'=>'Create config', 'url'=>array('create')),
	array('label'=>'Update config', 'url'=>array('update', 'id'=>$model->variable)),
	array('label'=>'Delete config', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->variable),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage config', 'url'=>array('admin')),
);
?>

<h1>View config #<?php echo $model->variable; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'scope',
		'variable',
		'value',
		'description',
	),
)); ?>
