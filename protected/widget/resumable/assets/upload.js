/** 
  * 断点续传交互
  * upload.js  
  */
(function(){    
    var r = new Resumable({
       target:resumable_upload_url,
       chunkSize:resumable_chunk_size,
       simultaneousUploads:4,
       testChunks: true,
       throttleProgressCallbacks:1
    });
    //如果不支持 则给予提示
    if(!r.support) {
        $('.resumable-error').show();
    } else {
        //显示一块可以拖拽文件和选择文件的区域
        $('.resumable-drop').show();
        r.assignDrop($('.resumable-drop')[0]);
        r.assignBrowse($('.resumable-browse')[0]);

        // 处理上传文件
        r.on('fileAdded', function(file){
            // 显示进度条
            $('.resumable-progress, .resumable-list').show();
            // 显示暂停、开始按钮
            $('.resumable-progress .progress-resume-link').hide();
            $('.resumable-progress .progress-pause-link').show();
            // 显示上传文件队列
            $('.resumable-list').append('<li class="resumable-file-'+file.uniqueIdentifier+'">上传文件... <span class="resumable-file-name"></span> <span class="resumable-file-progress"></span>');
            $('.resumable-file-'+file.uniqueIdentifier+' .resumable-file-name').html(file.fileName);
            // 开始上传
            r.upload();            
        });
        // 暂停上传
        r.on('pause', function(){
            //显示暂停按钮 隐藏开始按钮
            $('.resumable-progress .progress-resume-link').show();
            $('.resumable-progress .progress-pause-link').hide();
          });
        // 全部上传完成
        r.on('complete', function(){
            // 隐藏暂停和开始按钮
            $('.resumable-progress .progress-resume-link, .resumable-progress .progress-pause-link').hide();
        });
        // 单个上传完成
        r.on('fileSuccess', function(file, message){      
            $('.resumable-file-'+file.uniqueIdentifier+' .resumable-file-progress').html('(<span style="color:green">上传完成</span>)');            
            if(r.responseData){                                   
                var data =  r.responseData;
                if(data.file_ext.match(/(jpg|jpeg|gif|png|bmp)/i)) {   //图片
                    var li = '<li>'                           
                           + '<img src="'+data.file_path+'" width="100px" height="100px" />'
                           + '<input type="hidden" value="'+data.file_path+'" name="imagelist[]" />'
                           + '<div class="clear"><a href="'+data.file_path+'" class="left" target="_blank">[查看]</a><a href="javascript:;" class="right" onclick="deleteFile(this)">[删除]</a></span></div>'
                           + '</li>';
                } else {                                               //其他附件
                    var li = '<li>'
                           + '<span style="color:green">[已上传]'+data.file_name+'</span>' 
                           + '<input type="hidden" value="'+data.file_path+'" name="filelist[]" />'
                           + '<div class="clear"><a href="'+data.file_path+'" class="left" target="_blank">[查看]</a><a href="javascript:;" class="right" onclick="deleteFile(this)">[删除]</a></span></div>'
                           + '</li>';
                }
                $('.resumable-files').append(li);
            }       
        });
        // 上传出错
        r.on('fileError', function(file, message){            
            $('.resumable-file-'+file.uniqueIdentifier+' .resumable-file-progress').html('(<span style="color:red">上传失败: '+message+'</span>)');
        });
        // 进度条变化
        r.on('fileProgress', function(file){            
            $('.resumable-file-'+file.uniqueIdentifier+' .resumable-file-progress').html(Math.floor(file.progress()*100) + '%');
            $('.progress-bar').css({width:Math.floor(r.progress()*100) + '%'});
        });
        //点击继续
        $('#resume-start').click(function(){
            r.upload();
        });
        //点击暂停
        $('#resume-pause').click(function(){
            r.pause();
        });
    }
})();
