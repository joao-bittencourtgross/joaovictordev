<?PHP
class KeywordsController extends SeoAppController{
    
    public function admin_add($keyword){
        $this->autoRender=false;
        if($this->SeoKeyword->save(array('keyword'=>$keyword))){
            echo json_encode(array('status'=>'ok','keyword'=>$keyword));
        } else {
            echo json_encode(array('status'=>'error','keyword'=>$keyword));
        }
    }
    
    public function admin_delete($keyword){
        $this->autoRender=false;
        if($this->SeoKeyword->deleteAll(array('keyword'=>$keyword))){
            echo json_encode(array('status'=>'ok','keyword'=>$keyword));
        } else {
            echo json_encode(array('status'=>'error','keyword'=>$keyword));
        }
    }
    
}