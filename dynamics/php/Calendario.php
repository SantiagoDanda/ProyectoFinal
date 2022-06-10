<?php
    header("Content-Type: application/json");
    date_default_timezone_set("America/Mexico_City");
    $hoy= time();
    $string=date("d,n,Y,H,i,s", $hoy);
    $fecha=array_map('intval', explode(',', $string));
    $dia1=mktime($fecha[3],$fecha[4],$fecha[5], ($fecha[1]+$_GET["mesinfo"]), 1, $fecha[2]);
    $mes=date("n,Y", $dia1);
    $mes=array_map('intval', explode(',', $mes));
    $diasMes=cal_days_in_month(CAL_GREGORIAN, $mes[0], $mes[1]);
    for($i=0; $i<$diasMes; $i++){
        $dia=$dia1+((3600*24)*$i);
        $dias[$i]["DiaNombre"]=date("D", $dia);
        $dias[$i]["DiaNumero"]=date("d", $dia);
        $dias[$i]["Mes"]=date("M", $dia);
        $dias[$i]["year"]=date("Y", $dia);
    }
    $send=json_encode($dias);
    $send=str_replace("Jan", "Enero", $send);
    $send=str_replace("Feb", "Febrero", $send);
    $send=str_replace("Mar", "Marzo", $send);
    $send=str_replace("Apr", "Abril", $send);
    $send=str_replace("May", "Mayo", $send);
    $send=str_replace("Jun", "Junio", $send);
    $send=str_replace("Jul", "Julio", $send);
    $send=str_replace("Aug", "Agosto", $send);
    $send=str_replace("Sep", "Septiembre", $send);
    $send=str_replace("Oct", "Octubre", $send);
    $send=str_replace("Nov", "Noviembre", $send);
    $send=str_replace("Dec", "Diciembre", $send);
    $send=str_replace("Mon", "Lunes", $send);
    $send=str_replace("Tue", "Martes", $send);
    $send=str_replace("Wed", "Miercoles", $send);
    $send=str_replace("Thu", "Jueves", $send);
    $send=str_replace("Fri", "Viernes", $send);
    $send=str_replace("Sat", "Sabado", $send);
    $send=str_replace("Sun", "Domingo", $send);
    echo $send;
?>