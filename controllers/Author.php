<?php
class Author extends Model {
    public $name;
    public $nationality;
    public $birth;
    public $fields;

    static $authors = [
        ['id'=>1,'name'=>'Abraham Silberschatz','nationality'=>'Israelis / American',
         'fields'=>'Database Systems, Operating Systems','birth'=>1952], 
        ['id'=>2,'name'=>'Andrew S. Tanenbaum','nationality'=>'Dutch / American',
         'fields'=>'Distributed computing, Operating Systems','birth'=>1944]       
      ];
    
      
    public static function all() { 
        return self::$authors; 
    }

    public static function find($id) {
        foreach (self::$authors as $key => $author)
          if ($author['id'] == $id) return $author;
        return [];
    }
    
}
?>