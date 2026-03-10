<?php

//
//Cada require puxa o conteúdo de um arquivo e coloca dentro 
//da página atual, como se tudo fosse um único arquivo. 
// 
 

// LAYOUT PRINCIPAL 
require "./template_layout_principal/cabecalho.php";
require "./template_layout_principal/navegacao.php";
require "./template_layout_principal/legenda.php";
require "./template_layout_principal/hero_titulo.php";
require "./template_layout_principal/rodape.php";
require "./template_layout_principal/tabela_patrimonio.php";



require "./index_view.php";


// http://localhost:8000/pagina_principal.php

?>