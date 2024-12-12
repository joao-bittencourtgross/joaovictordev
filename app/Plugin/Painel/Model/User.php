<?PHP

class User extends PainelAppModel {

    public $recursive = 3;
    
    public $hasOne = array('Painel.Activate');    
    
    public $validate=array(
        'password'=>array(
            array('rule'=>array('minLength',6),'message'=>'Mínimo de seis caracteres','on'=>'create'),
            //array('rule'=>'/^[a-zA-Z0-9#-_]{5,12}$/','message'=>'Caracteres inválidos (Somente alfanumérico e os caracteres #, - e _)','on'=>'create'),
        ),
        'email'=>array(
            array('rule'=>'notBlank','message'=>'Preencha o campo e-mail'),
            array('rule'=>'email','message'=>'Não é um e-mail válido'),
        ),
        'name'=>array(
            array('rule'=>'notBlank','message'=>'Preencha o nome'),
        )
    );
    
    public $actsAs = array(
        'Painel.Gallery',
        'Painel.Videos',
        'Painel.Password'=>array(
            'field'=>'password',
            'retype'=>'password_retype',
            'new'=>'password_new',
        ),
    );
    
    public function afterSave($created, $options = array()) {
        parent::afterSave($created);
        if($created){
            $id=$this->id;
            $this->Activate->save(array(
                'user_id'=>$this->id,
                'hash'=>md5($this->id),
                'deadline'=>date('Y-m-d H:i:s',  strtotime('+2 days')),
            ));
        }
    }
    
}