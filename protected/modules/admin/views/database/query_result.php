<div class="tb_header" style="padding:10px 0; color:#993300">SQL:<?php echo $command?></div>
<table class="content_list" >
  <tr style="background:#DEEFFB; " class="tb_header">
    <?php foreach((array)$fields as $k):?>
    <th style="width:150px;border:1px solid #CCC"><?php echo $k?></th>
    <?php endforeach?>
  </tr>
  <?php foreach((array)$dataList as $row):?>
  <tr class="tb_list">
    <?php foreach((array)$fields as $d):?>
    <td style="border:1px solid #CCC"><?php echo $row[$d]?></td>
    <?php endforeach?>
  </tr>
  <?php endforeach?>
</table>
