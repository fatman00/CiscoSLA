<?php
# Copy pasted a bit arround from some of the original Check_MK templates from MK
#
# Author Rasmus E<fatman00>

$desc = str_replace("_", " ", $servicedesc);

$opt[1] = "-X0 --vertical-label \"Response Time (ms)\"  --title \"$hostname / $desc / RTT\" ";

$def[1] = ""
 . "DEF:var1=$RRDFILE[1]:$DS[1]:MAX "
 . "CDEF:ms=var1,1,* "
 . "AREA:ms#20dd30:\"Round Trip Time \" "
 . "LINE1:ms#000000:\"\" "
 . "GPRINT:ms:LAST:\"%3.3lg ms LAST \" "
 . "GPRINT:ms:MAX:\"%3.3lg ms MAX \" "
 . "GPRINT:ms:AVERAGE:\"%3.3lg ms AVERAGE \" ";


if (isset($RRDFILE[2]) && isset($RRDFILE[3])) {
//if ( 0 ) {


$opt[2] = "-X0 --vertical-label \"Response Time (ms)\"  --title \"$hostname / $desc / OneWay\" ";

$def[2] = "DEF:var2=$RRDFILE[2]:$DS[1]:MAX ";
$def[2] .= "CDEF:sd=var2,1,* ";
$def[2] .= "LINE1:sd#d020a0:\"Source->Destination Latency\" ";
$def[2] .= "GPRINT:sd:LAST:\"%3.3lg ms LAST \" ";
$def[2] .= "GPRINT:sd:MAX:\"%3.3lg ms MAX \" ";
$def[2] .= "GPRINT:sd:AVERAGE:\"%3.3lg ms AVERAGE \" ";


$def[2] .= "DEF:var3=$RRDFILE[3]:$DS[1]:MAX ";
$def[2] .= "CDEF:ds=var3,1,* ";
$def[2] .= "LINE1:ds#d08400:\"Destination->Source Latency\" ";
$def[2] .= "GPRINT:ds:LAST:\"%3.3lg ms LAST \" ";
$def[2] .= "GPRINT:ds:MAX:\"%3.3lg ms MAX \" ";
$def[2] .= "GPRINT:ds:AVERAGE:\"%3.3lg ms AVERAGE \" ";

}
if (isset($RRDFILE[4])) {
//if ( 0 ) {


$opt[3] = "-X0 --vertical-label \"Mean Openion Score (dMOS)\"  --title \"$hostname / $desc / MOS\" ";

$def[3] = "DEF:var3=$RRDFILE[2]:$DS[1]:MAX ";
$def[3] .= "CDEF:mos=var2,1,* ";
$def[3] .= "AREA:mos#20dd30:\"MOS in deciMOS \" "
$def[3] .= "LINE1:mos#000000:\"\" ";
$def[3] .= "GPRINT:mos:LAST:\"%3.3lg ms LAST \" ";
$def[3] .= "GPRINT:mos:MAX:\"%3.3lg ms MAX \" ";
$def[3] .= "GPRINT:mos:AVERAGE:\"%3.3lg ms AVERAGE \" ";


}

?>
