<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 04/07/2015
 * Time: 17:47
 */

require('../config.php');

if(excluirFornecedor($_GET['id'])){
    echo '<script>
            alert("Fornecedor excluído com sucesso");
            window.location.href = "listar_fornecedores.php";
          </script>
                ';
}else{
    echo'Erro ao excluir fornecedor';
}



function excluirFornecedor($id){
    global $db;

    return $db->query('DELETE FROM fornecedores WHERE forn_id ="'.$id.'"');

}