<?PHP
class Banner extends BannersAppModel{

    public $virtualFields=array(
        'cdate'=>"DATE_FORMAT(Banner.created,'%d/%m/%Y')",
        'mdate'=>"DATE_FORMAT(Banner.modified,'%d/%m/%Y')",
    );

}