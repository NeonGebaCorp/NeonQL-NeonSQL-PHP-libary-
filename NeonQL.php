<?php

class NeonQL {
    private $base_url;
    private $password;

    public function __construct($base_url, $password) {
        $this->base_url = $base_url;
        $this->password = $password;
    }

    public function get($dataname) {
        $url = $this->base_url . "/GET.php";
        $data = array(
            'password' => $this->password,
            'dataname' => $dataname,
        );

        $response = $this->sendRequest($url, $data);

        return $response;
    }

    public function put($dataname, $data) {
        $url = $this->base_url . "/PUT.php";
        $data = array(
            'password' => $this->password,
            'dataname' => $dataname,
            'data' => $data,
        );

        $response = $this->sendRequest($url, $data);

        return $response;
    }

    public function delete($dataname) {
        $url = $this->base_url . "/DELETE.php";
        $data = array(
            'password' => $this->password,
            'dataname' => $dataname,
        );

        $response = $this->sendRequest($url, $data);

        return $response;
    }

    public function testAuth() {
        $url = $this->base_url . "/TESTAUTH.php";
        $data = array(
            'password' => $this->password,
        );

        $response = $this->sendRequest($url, $data);

        return $response;
    }

    private function sendRequest($url, $data) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}

// Example usage:
$base_url = 'http://your_neonql_server_url';
$password = 'your_password';
$neonQL = new NeonQL($base_url, $password);

// Perform GET, PUT, DELETE, and TESTAUTH operations
$getResponse = $neonQL->get('your_dataname');
$putResponse = $neonQL->put('your_dataname', 'your_data_to_store');
$deleteResponse = $neonQL->delete('your_dataname');
$testAuthResponse = $neonQL->testAuth();