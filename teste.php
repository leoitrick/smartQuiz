<?php



require( 'scripts/phplot.php' );




$array = array(

  array( 'a', 1 ),

  array( 'b', 3 ), 

  array( 'c', 2 ),

  array( 'd', 7 ), 

  array( 'e', 6 ), 

  array( 'f', 9 )

);



$plot = new PHPlot( 800, 600 );


//SetFileFormat("png");

$plot->SetImageBorderType( 'plain' );

$plot->SetPlotType( 'bars' );

$plot->SetDataType( 'text-data' );

$plot->SetDataValues( $array );

$plot->SetTitle( 'Posição angular vs Tempo' );

$plot->SetXTitle( 'Tempo' );

$plot->SetBackgroundColor( 'white' );

$plot->SetLegend( array( 'temp' ) );

$plot->SetXTickLabelPos( 'none' );

$plot->SetXTickPos( 'none' );



$plot->DrawGraph( );



?>