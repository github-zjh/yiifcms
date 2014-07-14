//jQuery cookie
jQuery.cookie=function(name,value,options){if(typeof value!='undefined'){options=options||{};if(value===null){value='';options.expires=-1}var expires='';if(options.expires&&(typeof options.expires=='number'||options.expires.toUTCString)){var date;if(typeof options.expires=='number'){date=new Date();date.setTime(date.getTime()+(options.expires*24*60*60*1000))}else{date=options.expires}expires='; expires='+date.toUTCString()}var path=options.path?'; path='+(options.path):'';var domain=options.domain?'; domain='+(options.domain):'';var secure=options.secure?'; secure':'';document.cookie=[name,'=',encodeURIComponent(value),expires,path,domain,secure].join('')}else{var cookieValue=null;if(document.cookie&&document.cookie!=''){var cookies=document.cookie.split(';');for(var i=0;i<cookies.length;i++){var cookie=jQuery.trim(cookies[i]);if(cookie.substring(0,name.length+1)==(name+'=')){cookieValue=decodeURIComponent(cookie.substring(name.length+1));break}}}return cookieValue}};

(function($){

star.score = {
	texts:['超酷','好看','一般','无聊','差劲'],
	data:{},
	get:function(){
		$.getJSON(score_url+"&d="+new Date(), {g:1,id:star.vid,s:0}, function(ret){star.score.data=ret;star.score.format();});
	},
	send:function(s){
		$.get(score_url+"&d="+new Date(),{g:0,id:star.vid,s:s},function(msg){if(msg==1){setCookie1("voted",star.vid,24);alert('评分已提交，非常感谢您的参与！');}else{alert('非常抱歉，评分失败,请稍候重试！');}});
	},
	hasSend:function(){
		var voted = $.cookie('voted');
		if(voted==null||voted=='')
			return false;
		else{
			return (','+voted+',').indexOf(','+star.vid+',')==-1?false:true;
		}
	},
	format:function(){
		var data = this.data;
		var t = data.t;
		var ret = [];
		var _max = Math.max.apply(Math,data.s);
		var _len = 60;	
		var _avg = data.t>0?((data.s[0]+2*data.s[1]+3*data.s[2]+4*data.s[3]+5*data.s[4])/t*2).toFixed(1):'0.0';		
		_avg = _avg.substring(0,3);
		var reg=/^\.|\.$/gi;  //去除前后多余的点号
		_avg=_avg.replace(reg,""); 
		
		ret.push('<div class="score_avg"><span><em>' + _avg + '</em><i>' + _avg + '</i></span></div>');
		ret.push('<div class="score_total">共 <span>'+data.t+'</span> 人<br />参与评分</div>');
		ret.push('<ul class="score_list">');	
		for(var i=0;i<=4;i++){
			var len = _max>0?(_len*data.s[4-i]/_max).toFixed(0):0;
			ret.push('<li><span>'+star.score.texts[i]+'</span><i style="width:'+len+'px"></i> <em>'+data.s[4-i]+'人</em></li>');
		}
		ret.push('</ul>');
		$('#score_content').html(ret.join(''));
	},
	init:function(){
		this.get();
		var star_width = 26;
		$('#star_current_rating').css('width',0);
		$('#starlist > li').click(function(){
			if(!star.score.hasSend()){
				var i = $(this).attr('i');
				star.score.send(i);
				$('#star_current_rating').css({'width':star_width*i});
				star.score.data.t++;
				star.score.data.s[i-1]++;
				star.score.format();
				$('#starlist').html('');
				$('#star_desc').html('评分已提交，' + i + '星，' + star.score.texts[5-i]);
			}else{
				alert('囧,-_-|||，您已经评过分了哦？明天再来吧……');
			}
		});
		$('#starlist > li').hover(function(){
		   var i = $(this).attr('i');
		   $('#star_tip').show();
		   $('#star_tip_arrow').css('left',star_width*i-20 + 'px');
		   $('#star_desc').html(i + '星，' + star.score.texts[5-i]);
		   },function(){
			   $('#star_tip').hide();
		   }
		);
	}
};

star.score.init();

})(jQuery)

function setCookie1(name, value, ihour) {
	if(!star.score.hasSend())
	{
		var iH = ihour || 1;
		var exp = new Date;
		exp.setTime(exp.getTime() + iH * 60 * 60 * 1000);
		document.cookie = name + ("=" + escape(getCookie1(name)+","+value) + ";expires=" + exp.toGMTString() + ";path=/;");
	}
}

function getCookie1(name) {
	var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
	if (arr != null) {
		return unescape(arr[2]);
	}
	return null;
}