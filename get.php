<?php
$pincode = $_POST['zip'];
$data = file_get_contents('http://postalpincode.in/api/pincode/' . $pincode);
$data = json_decode($data);
if (isset($data->PostOffice['0'])) {
    $arr['city'] = $data->PostOffice['0']->Taluk;
    $arr['state'] = $data->PostOffice['0']->State;
    $arr['country'] = $data->PostOffice['0']->Country;
    echo json_encode($arr);
} else {
    echo 'no';
}
?>