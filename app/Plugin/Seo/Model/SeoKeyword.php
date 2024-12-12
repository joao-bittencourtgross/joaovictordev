<?PHP
class SeoKeyword extends SeoAppModel{
    
    public $displayField='keyword';
    
    public function glue($glue=', '){
        $kws=$this->find('list');
        return implode($glue,$kws);
    }
    
}