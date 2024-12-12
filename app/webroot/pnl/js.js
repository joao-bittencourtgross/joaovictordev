$(document).ready(function(){
    
    $('.vertical-nav-menu').metisMenu({
        toggle: false 
    });

    $('.close-sidebar-btn').click(function(){
        $('.app-container').toggleClass('closed-sidebar');
        $('.hamburger').toggleClass('is-active');
    });
    
    $('.mobile-toggle-nav').click(function(){
        $('.app-container').toggleClass('sidebar-mobile-open');
        $('.mobile-toggle-nav').toggleClass('is-active');
    });
    
    $('#btn_ar').click(function(){
        $('.dropdown-menu-right').slideToggle();
    });
      
    $(".sortable").sortable();
    
    $('[data-delay-hide]').each(function(){
        var delay = $(this).attr('data-delay-hide')*1000;
        $(this).delay(delay).fadeOut();
    });
    
    $(".out-upload-image input[type=file]").change(function() {
        $('.bgloader').css('display','block');
        
        var name_id = this.id;
        var container = $(this).parent().parent();
        var hidden = container.find('input[type=hidden]');
        var file = $(this)[0].files[0];
        var reduce = $(this).attr('reduce');
        var fd = new FormData();
        var input = this;
        
        fd.append('path', hidden.val());
        fd.append('file', file);
        var x = new XMLHttpRequest();
        x.addEventListener('load', function(e) {
            var json = $.parseJSON(e.target.responseText);
            if (json.status == 'ok') {
                $('.bgloader').css('display','none');
                
                hidden.val(json.path);
                
                var reader = new FileReader();
                reader.onload = function(e) {
//                    $('.image-upload-wrap').hide();
//                    $('.file-upload-image').attr('src', e.target.result);
//                    $('.file-upload-content').show();
//                    $('.image-title').html(input.files[0].name);

                    $('#image-upload-wrap_'+name_id).hide();
                    $('#file-upload-image_'+name_id).attr('src', e.target.result);
                    $('#file-upload-content_'+name_id).show();
                    $('#image-title_'+name_id).html(input.files[0].name);
                };
                reader.readAsDataURL(input.files[0]);
                
            }else{
                $('.bgloader').css('display','none');
                alert('Ocorreu algum erro');
            }
        });
        x.open('POST', base + '/admin/painel/uploads/single/' + reduce);
        x.send(fd);
    });
    
    $(".image-title-wrap button").click(function() {
        var name_id = this.id;
//        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
//        $('.file-upload-content').hide();
//        $('.image-upload-wrap').show();
        $('#file-upload-input_'+name_id).replaceWith($('.file-upload-input').clone());
        $('#file-upload-content_'+name_id).hide();
        $('#image-upload-wrap_'+name_id).show();
        
        // ------------ mesma função de cima de subir a imagem ------------
        $(".out-upload-image input[type=file]").change(function() {
            $('.bgloader').css('display','block');
            var name_id = this.id;
            var container = $(this).parent().parent();
            var hidden = container.find('input[type=hidden]');
            var file = $(this)[0].files[0];
            var reduce = $(this).attr('reduce');
            var fd = new FormData();
            var input = this;
            fd.append('path', hidden.val());
            fd.append('file', file);
            var x = new XMLHttpRequest();
            x.addEventListener('load', function(e) {
                var json = $.parseJSON(e.target.responseText);
                if (json.status == 'ok') {
                    $('.bgloader').css('display','none');

                    hidden.val(json.path);

                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image-upload-wrap_'+name_id).hide();
                        $('#file-upload-image_'+name_id).attr('src', e.target.result);
                        $('#file-upload-content_'+name_id).show();
                        $('#image-title_'+name_id).html(input.files[0].name);
                    };
                    reader.readAsDataURL(input.files[0]);
                }else{
                    $('.bgloader').css('display','none');
                    alert('Ocorreu algum erro');
                }
            });
            x.open('POST', base + '/admin/painel/uploads/single/' + reduce);
            x.send(fd);
        });
    });
    
    //MULTIUPLOAD
    var _uploading = 0;
    $("#box-image input[type=file]").change(function() {
        $('.bgloader').css('display','block');
        
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
                if (_uploading <= 0){
                    window.onbeforeunload = null;
                    $('.bgloader').css('display','none');
                }
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
    
    $(".box.videos .selector").click(function(){
        var container=$(this).parent().parent();
        var items=container.find('.items');        
        var url = prompt('Digite a url do vídeo do YOUTUBE');
        
        if(url){
            var reg=new RegExp(/(&|\?|\/)v(=|\/)([\w\d-_]+)/ig);
            var res;
            
            if(res=reg.exec(url)){
                
                var yid=res[3];
                var count=items.find('.item').length;
                var item='';
                item+='<div class="item" id="itemv">';
                item+='<a class="remove" href="javascript:void(0);">x</a>';
                item+='<img src="//i4.ytimg.com/vi/'+yid+'/hqdefault.jpg" height="100" />';
//                item+='<input type="text" name="data[Video]['+count+'][title]" placeholder="Título do vídeo">';
                item+='<input type="hidden" name="data[Video]['+count+'][yid]" value="'+yid+'" />';
                item+='</div>';
                
                items.append(item);
                
            } else {
                alert("Link inválido\nPoste um link válido do youtube");
                return false;
            }
        }
        return false;
    });
    
    $("body").on('click','.box.videos .items .item a.remove',function(){
        $(this).parent().slideUp(null,function(){
            var $this=$(this).parent();
            $(this).detach();
            $this.find('.item').each(function(i,e){
                $(this).find('input[type=text]').attr('name','data[Video]['+i+'][title]');
                $(this).find('input[type=hidden]').attr('name','data[Video]['+i+'][yid]');
            });
        });
        
        return false;
    });
    
    $(".box.videos .items").sortable();
    
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


//function readURL(input) {
//    
//  
//    
//    var container = $(this).parent().parent();
//    var hidden = container.find('input[type=hidden]');
//    var file = $(this)[0].files[0];
//    var reduce = $(this).attr('reduce');
//    var fd = new FormData();
//    fd.append('path', hidden.val());
//    fd.append('file', file);
//    var x = new XMLHttpRequest();
//    x.addEventListener('load', function(e) {
//        var json = $.parseJSON(e.target.responseText);
//        if (json.status == 'ok') {
//            alert('foi');
//        }else{
//            alert('aeerooooo');
//        }
//    });
//    x.open('POST', base + '/admin/painel/uploads/single/' + reduce);
//    x.send(fd);
//    
//      alert('yball');
//      
//  if (input.files && input.files[0]) {
//
//
//
//    
//    
//    
//
////    var reader = new FileReader();
////
////    reader.onload = function(e) {
////        $('.image-upload-wrap').hide();
////
////        $('.file-upload-image').attr('src', e.target.result);
////        $('.file-upload-content').show();
////
////         $('.image-title').html(input.files[0].name);
////    };
////
////    reader.readAsDataURL(input.files[0]);
//
//  } else {
//    removeUpload();
//  }
//}

//function removeUpload() {
//    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
//    $('.file-upload-content').hide();
//    $('.image-upload-wrap').show();
//}

//$('.image-upload-wrap').bind('dragover', function () {
//    $('.image-upload-wrap').addClass('image-dropping');
//});
//
//$('.image-upload-wrap').bind('dragleave', function () {
//    $('.image-upload-wrap').removeClass('image-dropping');
//});
