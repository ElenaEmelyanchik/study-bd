<?php

// Create connection to Oracle
$conn = oci_connect("jacek_gwiazdowski", "jacek1049094", '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=212.33.90.213)(PORT=1521))(CONNECT_DATA=(SERVICE_NAME=xe)))');
 
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
else {
   print "Connected to Oracle!";

$sql = 'BEGIN sayHello(:name, :message); END;';

$stmt = oci_parse($conn,$sql);

//  Bind the input parameter
oci_bind_by_name($stmt,':name',$name,32);

// Bind the output parameter
oci_bind_by_name($stmt,':message',$message,32);

// Assign a value to the input 
$name = 'Harry';

oci_execute($stmt);

// $message is now populated with the output value
print "$message\n";  
}

// Close the Oracle connection
oci_close($conn);

?>
