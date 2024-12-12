<?PHP
class PasswordBehavior extends ModelBehavior{
    
    public $config=array(
        'field'=>'password',
        'retype'=>'password_retype',
        'new'=>'password_new',
    );
    
    public function setup(Model $model, $config = array()){
        parent::setup($model, $config);
        $this->config=$config;
    }
    
    public function beforeValidate(Model $model, $options = array()){
        
        parent::beforeValidate($model);
        $params=$this->config;
        $data=&$model->data[$model->alias];
        
        if(isset($data[$params['field']]) && isset($data[$params['retype']])){
            if($data[$params['field']] != $data[$params['retype']]){
                $model->invalidate($params['field'], 'Senha e senha redigitada não conferem');
            }
        }
    }
    
    public function beforeSave(Model $model, $options = array()) {
        parent::beforeSave($model);
        $params=$this->config;
        $data=&$model->data[$model->alias];
        if(isset($data[$params['field']])){
            $data[$params['field']]=  LockerComponent::password($data[$params['field']]);
        }
    }
    
    public function change_password(Model $model,$request_data,$logout=false){
        $error=false;
        $user=LockerComponent::user('username');
        $data=$request_data[$model->alias];
        foreach($data as $k=>$v){ $data[$k]=  LockerComponent::password($v); }
        $password=$data[$this->config['field']];    
        $find=$model->find('first',array('conditions'=>array('username'=>$user,'password'=>$password)));
        
        if(!isset($request_data[$model->alias]['password']) || !isset($request_data[$model->alias]['password_retype']) || !isset($request_data[$model->alias]['password_new'])){
            exit(__('Está faltando senha, nova senha ou redigitação da nova senha, entre em contato com o administrador'));
        }
        
        if(count($find)<=0){
            $error=true;
            $model->invalidate($this->config['field'],__('Sua senha está incorreta'));
        }
        
        if(strlen($request_data[$model->alias][$this->config['new']])<=5){
            $error=true;
            $model->invalidate($this->config['password_new'],__('A nova senha deve possuir ao menos seis caracteres'));
        }
        
        if($data[$this->config['new']] != $data[$this->config['retype']]){
            $error=true;
            $model->invalidate($this->config['password_retype'],__('Senha e a confirmação não conferem'));
        }
        
        if(!$error){
            $model->validate=array();
            $id=LockerComponent::user('id');
            return $model->save(array(
                'id'=>$id,
                $this->config['field']=>$request_data[$model->alias]['password_retype'],
            ));
        }
    }
}