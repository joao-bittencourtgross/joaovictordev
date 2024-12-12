jQuery(function($) {
//    $('#load-image-single').hide();
//    $('#load-image-single').html('<img src="../../../img/painel/ajax-loader.gif"> Aguarde...');
    $(".box.image input[type=file]").change(function() {
        $('#load-image-single').html('<img src="../../../img/painel/ajax-loader.gif"> Aguarde...');
        var container = $(this).parent().parent();
//        var progressBox = $('#progress');
//        var progressBar = $('.loading');
//        progressBar.css({'width':'0'});
        var hidden = container.find('input[type=hidden]');
        var file = $(this)[0].files[0];
        var reduce = $(this).attr('reduce');
        var fd = new FormData();
        fd.append('path', hidden.val());
        fd.append('file', file);
        var x = new XMLHttpRequest();
//        x.upload.addEventListener('progress', function(e) {
//            if (e.lengthComputable) {
//                var loaded = Math.ceil((e.loaded/e.total)*100);
//                progressBar.css({
//                    'width':loaded+"%",
//                }).html(loaded+"%");
//            }
//        });
        x.addEventListener('load', function(e) {
            var json = $.parseJSON(e.target.responseText);
            if (json.status == 'ok') {
                hidden.val(json.path);
                container.find('img').attr('src', base + '/media/crop/100x100/' + json.path);
                $('#load-image-single').html('');
            }
        });
        x.open('POST', base + '/admin/painel/uploads/single/' + reduce);
        x.send(fd);
    });

    //UPLOAD DO XML
    $(".box.xml input[type=file]").change(function() {
        var container = $(this).parent().parent();
        var progressBox = $('#progress');
        var progressBar = $('.loading');
        progressBar.css({'width':'0'});
        var hidden = container.find('input[type=hidden]');
        var file = $(this)[0].files[0];
        var fd = new FormData();
        fd.append('path', hidden.val());
        fd.append('file', file);
        var x = new XMLHttpRequest();
        x.upload.addEventListener('progress', function(e) {
            if (e.lengthComputable) {
                var loaded = Math.ceil((e.loaded/e.total)*100);
                progressBar.css({
                    'width':loaded+"%",
                }).html(loaded+"%");
            }
        });
        x.addEventListener('load', function(e) {
//            console.log(e);
            var json = jQuery.parseJSON(e.target.responseText);
//            console.log(json);
            if(json.status=='hit'){
                hidden.val(json.path);
                container.find('img').attr('src',base+'/painel/img/file.png');
            }
        });
        x.open('POST', base + '/admin/painel/uploads/xml');
        x.send(fd);
    });

    //MULTIUPLOAD
    var _uploading = 0;
    $(".box.images input[type=file]").change(function() {
        var files = $(this)[0].files;
        var container = $(this).parent().parent();
        var images = $(this).parent().parent().find('div.items');
        var gallery = container.attr('data-gallery');
        for (var i = 0; i < files.length; i++) {
            var f = new FormData();
            f.append('gallery', gallery);
            f.append('upload_id', _uploadID);
            f.append('file', files[i]);
            var x = new XMLHttpRequest();
            x.upload.addEventListener('progress', function(e) {
            });
            x.addEventListener('load', function(e) {
                var response = $.parseJSON(e.target.responseText);
                if (response.status == 'ok') {
                    var container = images.find('div[data-upload-id=' + response.upload_id + ']');
                    container.removeClass('loading');
                    container.append('<a href="javascript:void(0);" class="delete">x</a>');
                    container.append('<img src="' + base + '/media/crop/100x100/' + response.path + '" alt="" />');
                    container.append('<input type="hidden" name="data[Gallery][' + response.upload_id + '][id]" value="' + response.id + '" />');
                    container.append('<input type="hidden" name="data[Gallery][' + response.upload_id + '][fullPath]" value="' + response.fullPath + '" />');
                    container.append('<input type="hidden" name="data[Gallery][' + response.upload_id + '][gallery]" value="' + response.gallery + '" />');
                }
                _uploading--;
                if (_uploading <= 0)
                    window.onbeforeunload = null;
            });
            images.append('<div class="item loading" data-upload-id="' + _uploadID + '" />');
            window.onbeforeunload = function() {
                return 'Ainda há uploads ativos, se continuar poderá perder estes uploads';
            }
            x.open('POST', base + '/admin/painel/uploads/multiple');
            x.send(f);
            _uploadID++;
            _uploading++;
        }
    });

    $(document).on('click',".box.images .items .item a.delete",function(){
        var item=$(this).parent();
        var hidden=item.find('input[type=hidden]');
        var id=hidden.attr('value');
        $.getJSON(base+'/admin/painel/uploads/delete/'+id,function(data){
            if(data.status=='ok') item.detach();
        });
        return false;
    });
    
    $(document).on('click','.photoLegenda',function(){
        var box = $(this);
        var id = box.attr('id');
        var legenda=box.attr('title');
        if(title=prompt('Digite a legenda da imagem',legenda)){
            $.ajax({
                url:base+'/painel/uploads/title?id='+id+'&title='+title,
                data:{id:id,title:title},
                success:function(data){
                    if(data=='hit'){
                        box.addClass('active').attr('title',title).parent().children('.fancybox').attr('title',title).children('img').attr('alt',title);
                    }else{
                        alert('Erro ao enviar a legenda.');
                    }
                }
            });
        }
        return false;
    });
    
    $(".box.images .items").sortable({
        stop:function(){
            var items=$(this).parent().find('.item');
            var order={};
            items.each(function(i,e){
                var id=$(e).find('input[type=hidden]').attr('value');
                $.ajax({
                    type:'post',
                    url:base+'/admin/painel/uploads/order',
                    data:{id:id,index:i},
                });
            });            
        }
    });
    
});