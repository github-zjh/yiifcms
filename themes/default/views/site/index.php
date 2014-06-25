	<div id="intro">		
		<div class="intro_title">
			<a href="#" class="view_more">View More</a>
			<h1>Some of our top services</h1>
			<p>一段文字</p>
		</div>	
		<ul class="intro_box clear">
			<li>
				<div class="ico_one"></div>
				<h2>SUPERMAN</h2>
				<p>一段文字</p>
				<a href="#readmore">Read More</a>
			</li>
			<li>
				<div class="ico_one ico_two"></div>
				<h2>SUPERMAN</h2>
				<p>一段文字</p>
				<a href="#readmore">Read More</a>
			</li>
			<li>
				<div class="ico_one ico_three"></div>
				<h2>SUPERMAN</h2>
				<p>一段文字</p>
				<a href="#readmore">Read More</a>
			</li>
			<li class="last">
				<div class="ico_one ico_four"></div>
				<h2>SUPERMAN</h2>
				<p>一段文字</p>
				<a href="#readmore">Read More</a>
			</li>
		</ul>
	</div>
	
	<div id="section">
		<h2>why select us</h2>		
	</div>
	
	<div id="clients">
		<ul class="client_head clear">
			<li class="client_title">友情链接</li>
			<li class="client_line"><img width="1050" src="<?php echo $this->_stylePath;?>/images/grey_line_x.png" /></li>			
		</ul>
		
		<?php if($link_logos):?>
		<ul class="client_body clear">
			<?php foreach($link_logos as $lg):?>
			<li><a href="<?php echo $lg->link;?>" title="<?php echo $lg->title;?>" target="_blank"><img width="170" height="90" src="<?php echo $lg->logo;?>" /></a></li>
			<?php endforeach;?>			
		</ul>
		<?php endif;?>
		
		<?php if($link_texts):?>
		<ul class="client_foot clear">
			<?php foreach($link_texts as $lt):?>
			<li><a href="<?php echo $lt->attributes['link'];?>" title="<?php echo $lt->attributes['title'];?>" target="_blank"><?php echo $lt->title;?> </a></li>
			<?php endforeach;?>			
		</ul>
		<?php endif;?>
	</div>