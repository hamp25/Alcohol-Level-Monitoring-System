<?php
$consola = "";
shell_exec("mode com3: BAUD=9600 PARITY=n DATA=8 STOP=1 to=off dtr=off rts=off");
echo $consola;
$fp = fopen ("com3", "w");
If (! $fp) {
$status = "Not on";
echo $status;
} else {
$status = "connected";
echo $status;
fwrite($fp, "Hola Arduino");
}


?>