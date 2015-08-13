/** 
  * 断点续传支持
  * Resumable.js  
  */
$(function(){    
    var r = new Resumable({
       target:resumable_upload_url,
       chunkSize:resumable_chunk_size,
       simultaneousUploads:simultaneousUploads,
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
    }
});
