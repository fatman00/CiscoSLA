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

if (isset($RRDFILE[4]) && isset($RRDFILE[5])) {

$opt[3] = "-X0 --vertical-label \"Jitter Time (ms)\"  --title \"$hostname / $desc / OneWay\" ";

$def[3] = "DEF:var4=$RRDFILE[4]:$DS[1]:MAX ";
$def[3] .= "CDEF:jitsd=var4,1,* ";
$def[3] .= "LINE1:jitsd#d020a0:\"Source->Destination Jitter\" ";
$def[3] .= "GPRINT:jitsd:LAST:\"%3.3lg ms LAST \" ";
$def[3] .= "GPRINT:jitsd:MAX:\"%3.3lg ms MAX \" ";
$def[3] .= "GPRINT:jitsd:AVERAGE:\"%3.3lg ms AVERAGE \" ";


$def[3] .= "DEF:var5=$RRDFILE[5]:$DS[1]:MAX ";
$def[3] .= "CDEF:jitds=var5,1,* ";
$def[3] .= "LINE1:jitds#d08400:\"Destination->Source Jitter\" ";
$def[3] .= "GPRINT:jitds:LAST:\"%3.3lg ms LAST \" ";
$def[3] .= "GPRINT:jitds:MAX:\"%3.3lg ms MAX \" ";
$def[3] .= "GPRINT:jitds:AVERAGE:\"%3.3lg ms AVERAGE \" ";

}


if (isset($RRDFILE[6])) {
//if ( 0 ) {


$opt[4] = "-X0 --vertical-label \"deciMOS\"  --title \"$hostname / $desc / Mean Openion Score\" ";

$def[4] = "DEF:var6=$RRDFILE[6]:$DS[1]:MAX ";
$def[4] .= "CDEF:mos=var6,1,* ";
$def[4] .= "AREA:mos#20dd30:\"MOS in deciMOS \" ";
$def[4] .= "LINE1:mos#000000:\"\" ";
$def[4] .= "GPRINT:mos:LAST:\"%3.3lg ms LAST \" ";
$def[4] .= "GPRINT:mos:MIN:\"%3.3lg ms MIN \" ";
$def[4] .= "GPRINT:mos:MAX:\"%3.3lg ms MAX \" ";
$def[4] .= "GPRINT:mos:AVERAGE:\"%3.3lg ms AVERAGE \" ";


}

?>
