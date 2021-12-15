<?php 

namespace App\Entidy;

use \App\Db\Database;

use \PDO;

class Avaliacao{
    

    public $id;
    public $titulo;
    
    public function cadastar(){


        $obdataBase = new Database('avaliacao');  
        
        $this->id = $obdataBase->insert([
          
           
            'titulo'                  => $this->titulo
          
        ]);

        return true;

    }

    public static function getList($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('avaliacao'))->select($fields, $table, $where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }



    public static function getQtd($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('avaliacao'))->select('COUNT(*) as qtd', 'avaliacao', null, null)
            ->fetchObject()
            ->qtd;
    }


    public static function getID($fields, $table, $where, $order, $limit)
    {
        return (new Database('avaliacao'))->select($fields, $table, 'id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }

public function atualizar(){
    return (new Database ('avaliacao'))->update('id = ' .$this-> id, [

        'titulo'              => $this->titulo
    ]);
  
}

public function excluir(){
    return (new Database ('avaliacao'))->delete('id = ' .$this->id);
  
}


public static function getUsuarioPorEmail($email){

    return (new Database ('avaliacao'))->select('email = "'.$email.'"')-> fetchObject(self::class);

}



}