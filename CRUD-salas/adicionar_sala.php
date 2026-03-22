<?php


$sql = "

SELECT salas.id, salas.nome, salas.bloco pcs.id
FROM salas
JOIN pcs ON salas.id = pcs.id_pc

";


?>


