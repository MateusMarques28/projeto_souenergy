<h1>Lista De Usuários e Informações</h1>

<?php

use core\classes\Conec;

try {

    $bd = new Conec();
} catch (PDOException $e) {
    echo "Merda" . $e->getMessage();
}

try {
    $linha = $bd->select("SELECT * FROM usuarios");

    echo "<table border='1'><tr><td>NOME</td><td>CIDADE</td><td>UF</td><td>Ações</td></tr>";

    foreach ($linha as $key => $value) {
        echo "<tr><td>" . $linha[$key]->nome . "</td> 
        <td>" . $linha[$key]->cidade . "</td> 
        <td>" . $linha[$key]->uf . "</td> 
        <td><a href ='/Editar'>Edit</a>//<a href ='/Delete'>Delet</a>//<a href ='/Detalhes'>Details</a></td> </tr>";

    }
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}
