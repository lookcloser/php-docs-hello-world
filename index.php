<?php

ob_implicit_flush();

echo "Hello Worlds!<p>";

echo "Now attempting connection to LDAP server:<br>";

$service_port = 636;
$address = gethostbyname('registry.northwestern.edu');

/* Create a TCP/IP socket. */
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
