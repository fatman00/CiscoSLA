<?php
# Copy pasted a bit arround from some of the original Check_MK templates from MK
#
# Author Rasmus E<fatman00>

$desc = str_replace("_", " ", $servicedesc);

$opt[1] = "-X0 --vertical-label \"Response Time (ms)\"  --title \"$hostname / $desc\" ";

$def[1] = ""
 . "DEF:var1=$RRDFILE[1]:$DS[1]:MAX "
 . "CDEF:ms=var1,1,* "
 . "AREA:ms#20dd30:\"Round Trip Time \" "
 . "LINE1:ms#000000:\"\" "
 . "GPRINT:ms:LAST:\"%3.3lg ms LAST \" "
 . "GPRINT:ms:MAX:\"%3.3lg ms MAX \" "
 . "GPRINT:ms:AVERAGE:\"%3.3lg ms AVERAGE \" "
?>
