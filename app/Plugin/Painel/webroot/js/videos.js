jQuery(function($) {

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
});