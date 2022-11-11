
function up(){
    upload($(this).parent(),$(this).prev("input[mode=upload]"));
}
function upload(form,show){
	$.ajax({
            url:'/webajax.php?mod=upload',
            data: new FormData($(form)[0]),
            type: 'POST',    
            async: true,    
            cache: false,    
            contentType: false,    
            processData: false,
            dataType: 'json',
            success: function (ret) {
            	show.val(ret);
            },
            beforeSend:function(){
                show.val('正在上传,请稍后...');
            },
            error: function (ret) {  
                show.val('上传错误');
            }
        });
}

