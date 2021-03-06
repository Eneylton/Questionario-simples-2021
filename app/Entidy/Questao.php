<?php

namespace App\Entidy;

use \App\Db\Database;

use \PDO;

class Questao
{


    public $id;
    public $descricao;
    public $avaliacao_id;

    public function cadastar()
    {


        $obdataBase = new Database('questao');

        $this->id = $obdataBase->insert([


            'descricao'                     => $this->descricao,
            'avaliacao_id'                  => $this->avaliacao_id

        ]);

        return true;
    }

    public function atualizar()
    {
        return (new Database('questao'))->update('id = ' . $this->id, [
            'descricao'                  => $this->descricao,
            'avaliacao_id'                  => $this->avaliacao_id
        ]);
    }

    public static function getList($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('questao'))->select($fields, $table, $where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }



    public static function getQtd($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('questao'))->select('COUNT(*) as qtd', 'questao', null, null)
            ->fetchObject()
            ->qtd;
    }


    public static function getID($fields, $table, $where, $order, $limit)
    {
        return (new Database('questao'))->select($fields, $table, 'id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }



    public function excluir()
    {
        return (new Database('questao'))->delete('id = ' . $this->id);
    }


    public static function getUsuarioPorEmail($email)
    {

        return (new Database('questao'))->select('email = "' . $email . '"')->fetchObject(self::class);
    }
}
