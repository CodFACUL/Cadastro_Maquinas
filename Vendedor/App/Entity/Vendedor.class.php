<?php 
namespace App\Entity;
use \App\Db\Conexao;
require ('../Vendedor/App/Db/Conexao.class.php');
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




}



?>