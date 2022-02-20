<?php

namespace App\Entidy;

use \App\Db\Database;

use \PDO;

class QuestaoResp
{

    public $id;
    public $status;
    public $escrita;
    public $respostas_id;
    public $avaliacao_id;
    public $usuarios_id;

    public function cadastar()
    {


        $obdataBase = new Database('questao_respostas');

        $this->id = $obdataBase->insert([

            'status'                    => $this->status,
            'escrita'                   => $this->escrita,
            'avaliacao_id'              => $this->avaliacao_id,
            'usuarios_id'               => $this->usuarios_id,
            'respostas_id'              => $this->respostas_id

        ]);

        return true;
    }



    public function atualizar()
    {
        return (new Database('questao_respostas'))->update('id = ' . $this->id, [

            'status'                    => $this->status,
            'escrita'                   => $this->escrita,
            'avaliacao_id'              => $this->avaliacao_id,
            'usuarios_id'               => $this->usuarios_id,
            'respostas_id'              => $this->respostas_id
        ]);
    }


    public static function getList($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('questao_respostas'))->select($fields, $table, $where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }



    public static function getQtd($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('questao_respostas'))->select('COUNT(*) as qtd', 'questao_respostas', null, null)
            ->fetchObject()
            ->qtd;
    }


    public static function getID($fields, $table, $where, $order, $limit)
    {
        return (new Database('questao_respostas'))->select($fields, $table, 'id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }

  

    public function excluir()
    {
        return (new Database('questao_respostas'))->delete('id = ' . $this->id);
    }


    public static function getUsuarioPorEmail($email)
    {

        return (new Database('questao_respostas'))->select('email = "' . $email . '"')->fetchObject(self::class);
    }
}
