<?php 
namespace App\Entity;
use \App\Db\Conexao;
require_once ('../Vendedor/App/Db/Conexao.class.php');
use PDO;
class Cliente{


public $cnpj;
public $nome;
public $qtd_maq;
public $cnpj_vend;

public function cadastrar(){

$obConexao = new Conexao('cliente');
$obConexao->insere([
    'cnpj_cli'=>$this->cnpj,
    'nome'=>$this->nome,
    'qtd_maq'=>$this->qtd_maq,
    'cnpj_vend'=>$this->cnpj_vend
]);
return true;
}


public static function getClientes($where=null,$order=null,$limit=null,$fields='*'){
return (new Conexao('cliente'))->select($where,$order,$limit,$fields)
                                ->fetchAll(PDO::FETCH_CLASS,self::class);

}


public function atualizar(){

    $where= "cnpj_cli='".$this->cnpj."'";
    return (new Conexao('cliente'))->update($where,['cnpj_cli'=>$this->cnpj,
                                            'nome'=>$this->nome,
                                            'qtd_maq'=>$this->qtd_maq,
                                            'cnpj_vend'=>$this->cnpj_vend
                                        ]);
}

public static function getCliente($cnpj){
    return (new Conexao('cliente'))->select("cnpj_cli ='".$cnpj."'")
                                    ->fetchObject(self::class);
}

public function excluir(){ 

    return (new Conexao('cliente'))->delete("cnpj_cli ='".$this->cnpj_cli."'" );
}


}



?>