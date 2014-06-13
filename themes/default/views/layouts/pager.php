<?php if($pagebar->pageCount>1):?>
<div id="page">
<?php
/**
 * 公共分页widget
 * 
 */

$this->widget('CLinkPager',array(
		'header'=>'',
		'pages'=>$pagebar,
		'cssFile' =>false,
		'firstPageLabel' =>Yii::t('common','First Page'),
		'lastPageLabel' => Yii::t('common','Last Page'),
		'prevPageLabel' => '<<',
		'nextPageLabel' => '>>',
		'previousPageCssClass' => 'prev_page',
		'nextPageCssClass' =>'next_page',
		'maxButtonCount'=>10,  //分页数量
));?>
</div>
<?php endif;?>