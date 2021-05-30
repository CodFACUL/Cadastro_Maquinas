<?php 
namespace App\Entity;
use \App\Db\Conexao;
require_once ('../Vendedor/App/Db/Conexao.class.php');
use PDO;
class Lamina{


public $cod_lamina;
public $afiacao;
public $diam_externo;
public $diam_interno;
public $cod_maq;

public function cadastrar(){

$obConexao = new Conexao('lamina');
$obConexao->insere([
    'cod_lamina'=>$this->cod_lamina,
    'afiacao'=>$this->afiacao,
    'diam_externo'=>$this->diam_externo,
    'diam_interno'=>$this->diam_interno,
    'cod_maq'=>$this->cod_maq

    ]);
return true;
}


public static function getLaminas($where=null,$order=null,$limit=null,$fields='*'){
return (new Conexao('lamina'))->select($where,$order,$limit,$fields)
                                ->fetchAll(PDO::FETCH_CLASS,self::class);

}


public function atualizar(){

    $where= "cod_lamina='".$this->cod_lamina."'";
    return (new Conexao('lamina'))->update($where,['cod_lamina'=>$this->cod_lamina,
                                            'afiacao'=>$this->afiacao,
                                            'diam_externo'=>$this->diam_externo,
                                            'diam_interno'=>$this->diam_interno,
                                            'cod_maq'=>$this->cod_maq

                                            ]);
}

public static function getLamina($cod_lamina){
    return (new Conexao('lamina'))->select("cod_lamina ='".$cod_lamina."'")
                                    ->fetchObject(self::class);
}

public function excluir(){ 

    return (new Conexao('lamina'))->delete("cod_lamina ='".$this->cod_lamina."'" );
}


}



?>