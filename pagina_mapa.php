<?php

//
//Cada require puxa o conteúdo de um arquivo e coloca dentro 
//da página atual, como se tudo fosse um único arquivo. 
// 


//--------- LAYOUT PRINCIPAL ---------------------------

require "./template_layout_mapa/cabecalho.php";
require "./template_layout_mapa/menu-botoes.php";
require "./template_layout_mapa/rodape.php";
require "./template_layout_mapa/tabela.php";

//------------------------------------------------------------


require "./mapaADM.php";


// http://localhost:8000/pagina_principal.php

?>