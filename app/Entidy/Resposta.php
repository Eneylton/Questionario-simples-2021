<?php 

namespace App\Entidy;

use \App\Db\Database;

use \PDO;

class Resposta{
    

    public $id;
    public $resp;
    public $questao_id;
    
    public function cadastar(){


        $obdataBase = new Database('respostas');  
        
        $this->id = $obdataBase->insert([
          
           
            'resp'                  => $this->resp,
            'questao_id'            => $this->questao_id
          
        ]);

        return true;

    }

    public function atualizar(){
        return (new Database ('respostas'))->update('id = ' .$this-> id, [
    
            'resp'                  => $this->resp,
            'questao_id'            => $this->questao_id
        ]);
      
    }

    public static function getList($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('respostas'))->select($fields, $table, $where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }



    public static function getQtd($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('respostas'))->select('COUNT(*) as qtd', 'respostas', null, null)
            ->fetchObject()
            ->qtd;
    }


    public static function getID($fields, $table, $where, $order, $limit)
    {
        return (new Database('respostas'))->select($fields, $table, 'id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }



public function excluir(){
    return (new Database ('respostas'))->delete('id = ' .$this->id);
  
}


public static function getUsuarioPorEmail($email){

    return (new Database ('respostas'))->select('email = "'.$email.'"')-> fetchObject(self::class);

}



}