<?php
# +------------------------------------------------------------------+
# |             ____ _               _        __  __ _  __           |
# |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# |                                                                  |
# | Copyright Mathias Kettner 2014             mk@mathias-kettner.de |
# +------------------------------------------------------------------+
#
# This file is part of Check_MK.
# The official homepage is at http://mathias-kettner.de/check_mk.
#
# check_mk is free software;  you can redistribute it and/or modify it
# under the  terms of the  GNU General Public License  as published by
# the Free Software Foundation in version 2.  check_mk is  distributed
# in the hope that it will be useful, but WITHOUT ANY WARRANTY;  with-
# out even the implied warranty of  MERCHANTABILITY  or  FITNESS FOR A
# PARTICULAR PURPOSE. See the  GNU General Public License for more de-
# tails. You should have  received  a copy of the  GNU  General Public
# License along with GNU Make; see the file  COPYING.  If  not,  write
# to the Free Software Foundation, Inc., 51 Franklin St,  Fifth Floor,
# Boston, MA 02110-1301 USA.

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
?>