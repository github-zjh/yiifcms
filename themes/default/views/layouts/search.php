<?php $form = $this->beginWidget('CActiveForm', array('method' => 'get', 'action' => $this->createUrl($controller.'/index'), 'htmlOptions' => array('class' => 'search_form clear'))); ?>
<fieldset class="category">
    <legend>分类搜索</legend>
    <dl>
        <dt>当前选择"<?php echo $search_cats; ?>"</dt>
        <dd>
            <select class="cat_select">
                <option value='0'>==所有==</option>
                <?php foreach ((array) $this->_catalog as $cate): ?>
                    <option value="<?php echo $cate->id; ?>"><?php echo $cate->catalog_name; ?></option>		
                <?php endforeach; ?>
            </select>                    
            <input type="hidden" id="catalogId" name="catalog_id" value="<?php echo Yii::app()->request->getParam('catalogId') ?>"/>
            <input type="hidden" name="order" value="<?php echo $order; ?>"/>
            <span class="loading" style="display:none;">loading...</span>
            <input type="submit" name="submit" class="search_btn" value="搜索"/>
        </dd>        
    </dl>     
</fieldset>
           
<div class="order_box">
    <a <?php if ($order == 'view_count'): ?>class="current" <?php endif; ?> href="<?php echo $this->createUrl($controller.'/index', array('order' => 'view_count', 'catalog_id' => $catalog ? $catalog->id : 0)); ?>">热度排行</a> 
    <a <?php if ($order == 'id'): ?>class="current" <?php endif; ?> href="<?php echo $this->createUrl($controller.'/index', array('order' => 'id', 'catalog_id' => $catalog ? $catalog->id : 0)); ?>">最新发表</a>                 
</div>
<?php $this->endWidget();
