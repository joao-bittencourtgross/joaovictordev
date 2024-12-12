<?PHP
class SiteController extends SeoAppController{
    
    public function admin_index(){
        if($this->request->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->SeoConfig->save($this->request->data)){
                $this->set('message','Dados salvos com sucesso');
            } else {
                $this->set('message','Dados não puderam ser salvos');
            }
        } else {
            $this->data=$this->SeoConfig->find('first');
        }
        $this->set('keywords',$this->SeoKeyword->find('list'));
    }
    
}