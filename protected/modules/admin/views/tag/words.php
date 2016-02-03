
<div id="contentHeader">
	<h3><?php echo Yii::t('admin','Words Manage');?></h3>
	<div class="searchArea">
		<p style="width:500px; border-radius:3px; font-size:16px; background-color:#4D90FE; color:#FFFFFF;padding:5px 10px">本词库仅用来自动生成关键词和标签数据。</p>
	</div>
</div>

<?php $form = $this->beginWidget('CActiveForm');?>
	<table class="content_list">
		<tbody>
			<tr>
				<td>
					<div class="custom_title"><?php echo Yii::t('admin','Words List');?>：</div>
					<div class="custom_content">
						<textarea name="words" class="area" rows="30" cols="50"><?php echo $words;?></textarea>
					</div>
					<div><?php echo Yii::t('admin','Search Words Desc');?></div>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="submit" style="padding-top: 10px">
		<input type="submit" name="editsubmit" value="提交" class="button" tabindex="3" />
	</div>
</form>
<?php $this->endWidget();?>
