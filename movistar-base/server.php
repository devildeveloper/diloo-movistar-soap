<?php
//include library file :)
require_once 'nusoap/lib/nusoap.php';

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version1X ;

require __DIR__ . '/vendor/autoload.php';

//create abject from nusoap
$server= new nusoap_server();
///config WSDL file
$server->configureWSDL('new wsdl','http://40.114.93.162:3000');
//register  function and set value type
$server->register('ws_movistar',
    array('value'=>'xsd:string'),///input
    array('result'=>'xsd:string'), ///out put
    'http://40.114.93.162:3000'//name space
);
///create function

function ws_movistar($value,$data)
{
//	echo $data
//    use ElephantIO\Client as Elephant;
	$file = fopen("params.txt", "w");
	fwrite($file, $value . PHP_EOL);
	fwrite($file, $data . PHP_EOL);
	fclose($file);
    $elephant = new Client(new Version1X('http://40.114.93.162:5050'));
    $elephant->initialize();

    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "movistar";
    $port =3306;
    
    $conn = new mysqli($servername, $username, $password, $dbname,$port);
    // Check connection
    if ($conn->connect_error) {
        //die("Connection failed: " . $conn->connect_error);
        return "Connection failed: " . $conn->connect_error;
    } 
    $r = json_decode($data,true);
    
    $sql = "INSERT INTO pedidos VALUES ('".$r['id_pedido']."','".$r['id_producto']."','".$r['nombres']."','".$r['apellidos']."','".$r['email']
    ."','".$r['documento']."','".$r['nro_fijo']."','".$r['nro_celular']."','".$r['nro_cel_cambio_equipo']."','".$r['portabilidad']
    ."','".$r['operador_actual']."','".$r['nro_celular_p']."','".$r['direccion']."','".$r['departamento']."','".$r['provincia']
    ."','".$r['distrito']."','".$r['entrega']."','".$r['referencia']."','".$r['fecha_envio']."','".$r['hora_envio']."','".$r['factura_direccion']
    ."','".$r['factura_departamento']."','".$r['factura_provincia']."','".$r['factura_distrito']."','".$r['factura_referencia']."','".$r['forma_pago']
    ."','".$r['costo']."','".$r['descuento']."','".$r['total']."','".$r['fecha']."','".$r['recibo_digital']."','".$r['recibo_digital_email']
    ."','".$r['recibo']."','".$r['medio']."','".$r['utmccn']."','".$r['campana']."','".$r['nombre_producto']."','".$r['tipo_producto']
    ."','".$r['descripcion']."');";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
	$elephant->emit('new_request',['data'=>$r] );
	$elephant->close();
        return "ok";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
    
      
}
// create HTTP listener
$HTTP_RAW_POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
//$server->service($HTTP_RAW_POST_DATA);
$server->service(file_get_contents("php://input"));
exit();
?>
