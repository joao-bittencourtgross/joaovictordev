jQuery(function($){
   //############################################################################################################################
   $('.box.downloads input[type=file]').change(function(){       
       var items=$(this).parent().parent().find('.items');
       var file=$(this)[0].files[0];
       $(this).val('');
       var fd=new FormData();
       fd.append('file',file);       
       var x=new XMLHttpRequest();       
       x.addEventListener('load',function(e){
           var r=$.parseJSON(e.target.responseText);           
           if(r.status=='ok'){
               var count=items.find('.item').length;
                var item='<div class="item '+r.extension+'" data-id="'+r.id+'" data-path="'+r.path+'">';
                item+='<a class="delete" href="javascript:void(0);">x</a>';
                item+='<label>'+r.name+'</label>';
                item+='<input type="text" name="data[Download]['+count+'][title]" placeholder="Digite um título para o download" />';
                item+='<input class="hidden id" type="hidden" name="data[Download]['+count+'][id]" value="'+r.id+'" />';
                item+='<input class="hidden name" type="hidden" name="data[Download]['+count+'][name]" value="'+r.name+'" />';
                item+='<input class="hidden path" type="hidden" name="data[Download]['+count+'][path]" value="'+r.path+'" />'
                item+='</div>';
                items.append(item);
           } else {
               alert("Erro ao enviar o arquivo\n".r.message);
           }           
       });       
       x.open('POST',base+'/admin/painel/uploads/file');
       x.send(fd);       
   });
   //############################################################################################################################
   $("body").on('click','.box.downloads a.delete',function(){
       var items=$(this).parent().parent();
       var id=$(this).parent().attr('data-id');
       var path=$(this).parent().attr('data-path');
       
       $.ajax({
           type:'POST',
           url:base+'/admin/painel/uploads/filedelete',
           data:{id:id,path:path}
       })
       
       $(this).parent().detach();
       
       items.find('.item').each(function(i,e){
           $(this).find('input[type=text]').attr('name','data[Download]['+i+'][title]');
           $(this).find('input.hidden.id').attr('name','data[Download]['+i+'][id]');
           $(this).find('input.hidden.name').attr('name','data[Download]['+i+'][name]');
       });
       return false;
   });
   
});