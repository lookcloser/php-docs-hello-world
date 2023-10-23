<?php

ob_implicit_flush();

echo "<h1>Network Connection Tester!!!!!!</h1><p>";

$service_port = getenv('SAIT_PORT_NUMBER');
$server = getenv('SAIT_SERVER_NAME');

$address = gethostbyname($server);

echo "Now attempting connection to server \"$server\":<br>";

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
} else {
    echo "Created socket.<br>\n";
}

echo "Attempting to connect to '$address' on port '$service_port'...";
$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
    echo "Connected socket.<br>\n";
}

socket_close($socket);
echo "Closed socket.";

?>
