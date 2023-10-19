<?php
require 'core/database.php';
function flour_sync($flourData)
{
    global $db;
    $flourData = json_decode($flourData);
    if (!empty($flourData)):
    foreach ($flourData as $data) {
        $user_id = isset($_SESSION['user']) ? $_SESSION['user'] : null;
        $client_name = !empty($data->client) ? $data->client : null;
        $client_input = ($data->input == 'NaN') ? null : $data->input;
        $profit = ($data->profit == 'NaN') ? null : $data->profit;
        $remaining = ($data->remaining == 'NaN') ? null : $data->remaining;
        $entry_time = $data->timestamp;

        if (!empty($user_id) && !empty($client_name) && !empty($client_input)) {
            $dbarray = array('user_id' => $user_id, 'client_name' => $client_name, 'original' => $client_input, 'profit' => $profit, 'rest' => $remaining, 'time' => $entry_time);
            $columns = implode(',', array_keys($dbarray));
            $values = "'" . implode("','", $dbarray) . "'";
            try {
                 $db->query("INSERT INTO `flour_calculator` ($columns) VALUES($values)");
            }catch (Exception $e){
                $response['msg'] = $e;
                exit(json_encode($response));
            }
        }
    }
        $response['msg'] = 'Synced Successfully';
    else:
    $response['msg'] = 'no records found to sync';
    endif;
    exit(json_encode($response));
}


if ($_POST['calculator_type'] == 'flour_calculationHistory') {
    flour_sync($_POST['data']);
}