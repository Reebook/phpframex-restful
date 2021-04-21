<?php
class Publisher extends Model {
    public $name;
    public $country;
    public $founded;
    public $genere;

    static $publishers = [
        ['id'=>1,'name'=>'John Wiley & Sons','country'=>'United States',
         'founded'=>1807,'genere'=>'Academic'], 
        ['id'=>2,'name'=>'Pearson Education','country'=>'United Kingdom',
         'founded'=>1844,'genere'=>'Education']
      ];

    public static function all() { 
        return self::$publishers; 
    }

    public static function find($id) {
        foreach (self::$publishers as $key => $publisher)
          if ($publisher['id'] == $id) return $publisher;
        return [];
    }
    
}

    
?>