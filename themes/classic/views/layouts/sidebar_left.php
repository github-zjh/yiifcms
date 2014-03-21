<div class="sidebar" id="sidebar">
    <div class="mbox sideNav">
      <h2>关于</h2>
      <ul>
        <li><a href="<?php echo $this->createUrl('page/show',array('name'=>'about'))?>"<?php if($this->id == 'page' && trim($this->_gets->getParam('name') == 'about')):?> class="current"<?php endif?>>公司介绍</a></li>
        <li><a href="<?php echo $this->createUrl('page/show',array('name'=>'cultural'))?>"<?php if($this->id == 'page' && trim($this->_gets->getParam('name') == 'cultural')):?> class="current"<?php endif?>>企业文化</a></li>
        <li><a href="<?php echo $this->createUrl('page/show',array('name'=>'team'))?>"<?php if($this->id == 'page' && trim($this->_gets->getParam('name') == 'team')):?> class="current"<?php endif?>>管理团队</a></li>
        <li><a href="<?php echo $this->createUrl('page/show',array('name'=>'contact'))?>"<?php if($this->id == 'page' && trim($this->_gets->getParam('name') == 'contact')):?> class="current"<?php endif?>>联系我们</a></li>
      </ul>
    </div>
    <div class="sideBox mbox">
      <p>000-000-000</p>
    </div>
  </div>