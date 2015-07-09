<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 09/07/2015
 * Time: 00:40
 */

require('../config.php');
echo '<!DOCTYPE html>
            <html>
                    <head>
                    <title>Lista de Produtos</title>
                    <meta charset="UTF-8">
                    </head>
                <body>
                <h1>Produtos cadastrados</h1>
                    <table id="tb_fornecedores">
                      <tr>
                        <th>ID</th>
                        <th>Nome</td>
                        <th>Desc</td>
                        <th>Valor</td>
                        <th>Estoque</td>
                        <th>Ações</td>
                      </tr>
                      '.gerarTabelaProdutos(getProdutos()).'
                    </table>
                    <br><br><br>
                    <button type="button" onclick="window.location=\'cadastro_produtos.php\';">Novo produto</button>
                    <button type="button" onclick="window.location=\'../index.html\';">Início</button>
                </body>
            </html>
    ';




function getProdutos(){
    global $db;
    return $db->query('SELECT * FROM produto')->fetch_all();
}

function gerarTabelaProdutos($produtos){
    $html ='';
    foreach($produtos as $prod ){
        $html.= '<tr>
                    <td>'.$prod[0].'</td>
                    <td>'.$prod[2].'</td>
                    <td>'.$prod[4].'</td>
                    <td>R$ '.number_format($prod[6], 2, ',', '.').'</td>
                    <td>'.$prod[8].'</td>
                    <td><a href="editar_produto.php?id='.$prod[0].'">Editar</a>
                        <a href="excluir_produto.php?id='.$prod[0].'">Excluir</a>
                    </td>
                 </tr>';
    }

    return $html;
}