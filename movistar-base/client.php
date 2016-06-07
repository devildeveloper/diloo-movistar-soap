<?php
require('nusoap/lib/nusoap.php');
$client=new nusoap_client('http://localhost:3000/server.php?wsdl',false);

$client->soap_defencoding = 'UTF-8';

//~ Formato debera contener el nombre del campo y el valor. => Ejemplo: {"campo1":"valor", "campo2":"valor2", "campoN":"valorN"}

$json = '{'

                               .'"id_pedido":"9999", "id_producto":"145-22-2-96", "nombres":"Prueba", "apellidos":"Prueba", "email":"lgarcia@attachmedia.com", '

                               .'"documento":"111101111", "nro_fijo":"(1)-2222222", "nro_celular":"999999999", "nro_cel_cambio_equipo":"", "portabilidad":"-", "operador_actual":"-", '

                               .'"nro_celular_p":"-", "direccion":"", "departamento":"LIMA", "provincia":"LIMA", "distrito":"LIMA", "entrega":"-", '

                               .'"referencia":"", "fecha_envio":"", "hora_envio":"00:00:00", "factura_direccion":"", "factura_departamento":"", '

                               .'"factura_provincia":"", "factura_distrito":"", "factura_referencia":"", "forma_pago":"-", "costo":"299.00", "descuento":"00.00", "total":"299.00", '

                               .'"fecha":"2014-04-28 14:54:19", "recibo_digital":"NO", "recibo_digital_email":"", "medio":"", '

                               .'"utmccn":"", "campana":"CAEQ masivo", "nombre_producto":"LG Optimus L9 P768 - Vuela S.99.90 (a 18 Meses)", '

                               .'"tipo_producto":"Mu00f3vil", "descripcion":"Con Plan Vuela de S.99.90 - Contrato a 18 meses", "comentarios":"CAEQ" '

                               .'}';

 

//~ Funcion de la Web Services

$result = $client->call('ws_movistar', array('user' => "m0v1st4r", 'Datos' => $json));
//$result=$client->call('myFunction',array('value'=>'adffbc'));
//~ Print del Resultado

//~ 0 or Vacio = Error

//~ 1 = Correcto

//echo $result[ws_movistarResult];

echo $result;
?>
