<?php 
namespace App\Entity;
use \App\Db\Conexao;
require_once ('../Vendedor/App/Db/Conexao.class.php');
use PDO;
class Vendedor{


public $cnpj;
public $vendedor;


public function cadastrar(){

$obConexao = new Conexao('vendedor');
$obConexao->insere([
    'cnpj_vend'=>$this->cnpj,
    'nome'=>$this->vendedor
]);
return true;
}


public static function getVendedores($where=null,$order=null,$limit=null,$fields='*'){
return (new Conexao('vendedor'))->select($where,$order,$limit,$fields)
                                ->fetchAll(PDO::FETCH_CLASS,self::class);

}


public function atualizar($where){

    $where= "cnpj_vend='".$where."'";
    return (new Conexao('vendedor'))->update($where,['cnpj_vend'=>$this->cnpj,
                                            'nome'=>$this->vendedor
                                        ]);
}

public static function getVendedor($cnpj){
    return (new Conexao('vendedor'))->select("cnpj_vend ='".$cnpj."'")
                                    ->fetchObject(self::class);
}

public function excluir(){ 

    return (new Conexao('vendedor'))->delete("cnpj_vend ='".$this->cnpj_vend."'" );
}


}



?>