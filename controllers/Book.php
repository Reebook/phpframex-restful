<?php
class Book extends Model {
    public $title;
    public $copyright;
    public $edition;
    public $pages;
    public $language;
    public $publisher;

    static $books = [
        ['id'=>1,'title'=>'Operating System Concepts','edition'=>'9th',
         'copyright'=>2012,'pages'=>976, 'language'=>'English','publisher'=>'John Wiley & Sons'], 
        ['id'=>2,'title'=>'Database System Concepts','edition'=>'6th',
         'copyright'=>2010,'pages'=>1376, 'language'=>'English','publisher'=>'John Wiley & Sons'],
        ['id'=>3,'title'=>'Computer Networks','edition'=>'5th',
         'copyright'=>2010,'pages'=>960, 'language'=>'English','publisher'=>'Pearson Education'],
        ['id'=>4,'title'=>'Modern Operating Systems','edition'=>'4th',
         'copyright'=>2014,'pages'=>1136, 'language'=>'English','publisher'=>'Pearson Education']
      ];

    public static function all() { 
        return self::$books; 
    }

    public static function find($id) {
        foreach (self::$books as $key => $book)
          if ($book['id'] == $id) return $book;
        return [];
      }
    
}
?>