
//footer.js

$(function(){		
		//导航菜单
		$("#menu li a").mouseover(function(){
			$(this).next().next("div.child_box").show();
		});
		$("#menu li").mouseleave(function(){
			$(this).children("div.child_box").hide();
		});		
		
		//执行代码高亮
		try{
			if (typeof(eval(SyntaxHighlighter)) == "function") {			
				SyntaxHighlighter.all(); 	
			}
		}catch(e){}	
			
		
		//返回顶部
		$(window).scroll(function(){				
			var scrollt = $(this).scrollTop(); //获取滚动后的高度 
			if(scrollt > 200){
				$("#back_top").fadeIn(200);					
			}else{		
				$("#back_top").fadeOut(200);					
			}
		});		
		$("#back_top").click(function(){						
			$("html,body").animate({scrollTop:"0px"},200);
		});
		
		//iframe自适应高度
		$("iframe").load(function() {
		      $( this).height($(this).contents().height());			      
		});	
		
		//友情链接滑动				
		var li_len = $(".client_body li").width();		
		var move_len = 3*(li_len+30);	
		var client_len = $(".client_body li").length;
		var max_len = (client_len-1)*li_len;	
		$("#client_left").val(0);
		$(".crt_btn").click(function(){				
			//向左滑动		
			var cur_left = parseFloat($("#client_left").val());			
			var move_left = cur_left - move_len;
			if(client_len <= 6 || Math.abs(move_left) > max_len){
				return;
			}else{			
				$("#client_left").val(move_left);
				$(".client_body").animate({left: move_left+'px'}, "slow");
			}
		});
		$(".clf_btn").click(function(){
			//向右滑动			
			var cur_left = parseFloat($("#client_left").val());					
			var move_left = cur_left + move_len;			
			if(client_len <= 6 || cur_left >= 0 ){
				return;
			}else{		
				$("#client_left").val(move_left);
				$(".client_body").animate({left: move_left+'px'}, "slow");
			}
		});
		//登录状态
		$("#logout").mouseover(function(){
			$(".show_drop").addClass("show_drop_hover");
			$("#drop_down_user").show();
		});
		$("#logout").mouseout(function(){
			$(".show_drop").removeClass("show_drop_hover");
			$("#drop_down_user").hide();
		});
		
		//刷新验证码
		$("#yw0").ready(function(){
		     $('#yw0').trigger('click');
		});	
		
		//代码着色
		try{
			if (typeof(eval(prettyPrint)) == "function") {			
				prettyPrint();
			}
		}catch(e){}	
		
	});
	
	// JavaScript Document
	function checkAll(form, name) {
		for(var i = 0; i < form.elements.length; i++) {
			var e = form.elements[i];
			if(e.name.match(name)) {
				e.checked = form.elements['chkall'].checked;
			}
		}
	}

    //简单弹窗
    //实例：<a href="javascript:;" data-url="www.example.com/post" class="ajax_dialog">点击弹窗</a>
	jQuery('body').on('click','.ajax_dialog',function(){
		var url = $(this).attr('data-url');		
		jQuery.ajax({'onclick':'$(\"#ajaxDialog\").dialog(\"open\");',
			'url':url,
			'cache':false,
			'success':function(html){
				jQuery("#ajaxDialog").html(html)
			}
		});
		return false;
		}
	);		
