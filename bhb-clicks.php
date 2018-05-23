<?php



$obj = '{"1": {"timestamp": 1527081399.0, "campaign_id": 513650, "email": "davidfernandeziraola@hotmail.com", "link": "https://www.hypestation.es/politica-de-privacidad/", "list_id": 184489, "event": "clicks"}}';

$data = json_decode($obj, true);

$datos['Email'] = $data['1']['email'];
$datos['Link'] = $data['1']['link'];
$datos['Event'] = $data['1']['event'];
$datos['Campaing'] = $data['1']['campaign_id'];
$datos['Lista_id'] = $data['1']['list_id'];
$str='';


foreach ($datos as $key => $valor){
    $str = $str."<br>".$key.' : '.$valor;
}
echo $str;
?>

