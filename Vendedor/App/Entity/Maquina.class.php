<?php 
namespace App\Entity;
use \App\Db\Conexao;
require_once ('../Vendedor/App/Db/Conexao.class.php');
use PDO;
class Maquina{


public $cod_maq;
public $modelo;
public $fases;
public $voltagem;
public $amperagem;
public $peso;
public $maq;
public $cnpj_cli;


public function cadastrar(){

$obConexao = new Conexao('maquina');
$obConexao->insere([
    'cod_maq'=>$this->cod_maq,
    'modelo'=>$this->modelo,
    'fases'=>$this->fases,
    'voltagem'=>$this->voltagem,
    'amperagem'=>$this->amperagem,
    'peso'=>$this->peso,
    'maq'=>$this->maq,
    'cnpj_cli'=>$this->cnpj_cli

    ]);
return true;
}


public static function getMaquinas($where=null,$order=null,$limit=null,$fields='*'){
return (new Conexao('maquina'))->select($where,$order,$limit,$fields)
                                ->fetchAll(PDO::FETCH_CLASS,self::class);

}


public function atualizar(){

    $where= "cod_maq='".$this->cod_maq."'";
    return (new Conexao('maquina'))->update($where,['cod_maq'=>$this->cod_maq,
                                                    'modelo'=>$this->modelo,
                                                    'fases'=>$this->fases,
                                                    'voltagem'=>$this->voltagem,
                                                    'amperagem'=>$this->amperagem,
                                                    'peso'=>$this->peso,
                                                    'maq'=>$this->maq,
                                                    'cnpj_cli'=>$this->cnpj_cli

                                            ]);
}

public static function getMaquina($cod_maq){
    return (new Conexao('maquina'))->select("cod_maq ='".$cod_maq."'")
                                    ->fetchObject(self::class);
}

public function excluir(){ 

    return (new Conexao('maquina'))->delete("cod_maq ='".$this->cod_maq."'" );
}


}



?>