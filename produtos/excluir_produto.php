<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 09/07/2015
 * Time: 01:10
 */

require('../config.php');

excluirProduto($_GET['id']);

function excluirProduto($produto_id){
    global $db;
    if($db->query('DELETE FROM produto WHERE prod_id = "'.$produto_id.'"')){
        echo '<script>
                    alert("Produto excluído com sucesso");
                    window.location.href = "listar_produtos.php";
              </script>
                ';
    }else{
        echo '<script>
                    alert("Erro ao excluir o produto");
                    window.location.href = "listar_produtos.php";
              </script>
                ';
    }
    return;
}