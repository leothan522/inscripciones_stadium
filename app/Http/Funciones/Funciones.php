<?php
//Funciones Personalizadas para el Proyecto

use Carbon\Carbon;

function hola(){
    return "Funciones Personalidas bien creada";
}


//Alertas de sweetAlert2
function verSweetAlert2($mensaje, $alert = null, $type = 'success', $icono = '<i class="fa fa-trash-alt"></i>', $title = '¡Éxito!')
{
    switch ($alert){
        default:
            alert()->success('¡Éxito!',$mensaje)->persistent(true,false);
            break;
        case "iconHtml":
            alert($title, $mensaje, $type)->iconHtml($icono)->persistent(true,false)->toHtml();
            break;
        case "toast":
            toast($mensaje, $type)->width('320px');
        break;
    }
    /*alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
        alert()->info('InfoAlert','Lorem ipsum dolor sit amet.');
        alert()->warning('WarningAlert','Lorem ipsum dolor sit amet.');
        alert()->error('ErrorAlert','Lorem ipsum dolor sit amet.');
        alert()->question('QuestionAlert','Lorem ipsum dolor sit amet.');
        toast('Success Toast','success');.
        // example:
        alert()->success('Post Created', '<strong>Successfully</strong>')->toHtml();
        // example:
        alert('Title','Lorem Lorem Lorem', 'success')->addImage('https://unsplash.it/400/200');
        // example:
        alert('Title','Lorem Lorem Lorem', 'success')->width('720px');
        // example:
        alert('Title','Lorem Lorem Lorem', 'success')->padding('50px');
        */
    // example:
    //alert()->success('¡Éxito!',$mensaje)->persistent(true,false);
    // example:
    //alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.')->showConfirmButton('Confirm', '#3085d6');
    // example:
    //alert()->question('Are you sure?','You won\'t be able to revert this!')->showCancelButton('Cancel', '#aaa');
    // example:
    //toast('Post Updated','success','top-right')->showCloseButton();
    // example:
    //toast('Post Updated','success','top-right')->hideCloseButton();
    // example:
    /*alert()->question('Are you sure?','You won\'t be able to revert this!')
        ->showConfirmButton('Yes! Delete it', '#3085d6')
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();*/

    // example:
    // alert()->error('Oops...', 'Something went wrong!')->footer('<a href="#">Why do I have this issue?</a>');
    // example:
    //alert()->success('Post Created', 'Successfully')->toToast();
    // example:
    //alert('Title','Lorem Lorem Lorem', 'success')->background('#2acc56');
    // example:
    //()->success('Post Created', 'Successfully')->buttonsStyling(false);
    // example:
    //alert()->success('Post Created', 'Successfully')->iconHtml('<i class="far fa-thumbs-up"></i>');
    // example:
    //alert()->question('Are you sure?','You won\'t be able to revert this!')->showCancelButton()->showConfirmButton()->focusConfirm(true);
    // example:
    //alert()->question('Are you sure?','You won\'t be able to revert this!')->showCancelButton()->showConfirmButton()->focusCancel(true);
    // example:
    //toast('Signed in successfully','success')->timerProgressBar();

}

function verImagen($path, $name)
{
    if (!is_null($path)){
        if (file_exists(public_path('storage/'.$path))){
            return asset('storage/'.$path);
        }else{
            if (config('app.type') == 'local'){
                return asset('img/user.png');
            }
            return "https://ui-avatars.com/api/?name=$name&color=7F9CF5&background=EBF4FF";
        }
    }else{
        //return 'https://ui-avatars.com/api/?name='.$name;
        if (config('app.env') == 'local'){
            return asset('img/user.png');
        }
        return "https://ui-avatars.com/api/?name=$name&color=7F9CF5&background=EBF4FF";
    }
}

function verFoto($path)
{
    if (!is_null($path)){
        if (file_exists(public_path($path))){
            return asset($path);
        }else{
            return asset('img/user.png');
        }
    }else{
        return asset('img/user.png');
    }
}

//Borrar archivos
function borrarArchivos($path, $file_path, $file_name)
{
    if (file_exists(public_path() . '' . $path . '/' . $file_path . '/' . $file_name)){
        return unlink(public_path() . '' . $path . '/' . $file_path . '/' . $file_name);
    }
}

function haceCuanto($fecha){
    $carbon = new Carbon();
    return $carbon->parse($fecha)->diffForHumans();
}

function fecha($fecha, $format = null){
    $carbon = new Carbon();
    if ($format == null){ $format = "j/m/Y"; }
    return $carbon->parse($fecha)->format($format);
}

function hora($hora){
    $carbon = Carbon::createFromTimeString($hora);
    return $carbon->isoFormat('hh:mm A');
}

function cuantosDias($fecha_inicio, $fecha_final){

    if ($fecha_inicio == null){
        return 0;
    }

    $carbon = new Carbon();
    $fechaEmision = $carbon->parse($fecha_inicio);
    $fechaExpiracion = $carbon->parse($fecha_final);
    $diasDiferencia = $fechaExpiracion->diffInDays($fechaEmision);
    return $diasDiferencia;
}

function diaEspanol($fecha){
    $diaSemana = date("w",strtotime($fecha));
    $diasEspanol = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
    $dia = $diasEspanol[$diaSemana];
    return $dia;
}

function mesEspanol($numMes){
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $mes = $meses[$numMes - 1];
    return $mes;
}

function paises()
{
    $paises = ["AFG" => "Afganistán", "ALB" => "Albania", "DEU" => "Alemania", "AND" => "Andorra", "AGO" => "Angola", "ATG" => "Antigua y Barbuda", "SAU" => "Arabia Saudita", "DZA" => "Argelia", "ARG" => "Argentina", "ARM" => "Armenia", "AUS" => "Australia", "AUT" => "Austria", "AZE" => "Azerbaiyán", "BHS" => "Bahamas", "BGD" => "Bangladés", "BRB" => "Barbados", "BHR" => "Baréin", "BEL" => "Bélgica", "BLZ" => "Belice", "BEN" => "Benín", "BLR" => "Bielorrusia", "MMR" => "Birmania", "BOL" => "Bolivia", "BIH" => "Bosnia y Herzegovina", "BWA" => "Botsuana", "BRA" => "Brasil", "BRN" => "Brunéi", "BGR" => "Bulgaria", "BFA" => "Burkina Faso", "BDI" => "Burundi", "BTN" => "Bután", "CPV" => "Cabo Verde", "KHM" => "Camboya", "CMR" => "Camerún", "CAN" => "Canadá", "QAT" => "Catar", "TCD" => "Chad", "CHL" => "Chile", "CHN" => "China", "CYP" => "Chipre", "VAT" => "Ciudad del Vaticano", "COL" => "Colombia", "COM" => "Comoras", "PRK" => "Corea del Norte", "KOR" => "Corea del Sur", "CIV" => "Costa de Marfil", "CRI" => "Costa Rica", "HRV" => "Croacia", "CUB" => "Cuba", "DNK" => "Dinamarca", "DMA" => "Dominica", "ECU" => "Ecuador", "EGY" => "Egipto", "SLV" => "El Salvador", "ARE" => "Emiratos Árabes Unidos", "ERI" => "Eritrea", "SVK" => "Eslovaquia", "SVN" => "Eslovenia", "ESP" => "España", "USA" => "Estados Unidos", "EST" => "Estonia", "ETH" => "Etiopía", "PHL" => "Filipinas", "FIN" => "Finlandia", "FJI" => "Fiyi", "FRA" => "Francia", "GAB" => "Gabón", "GMB" => "Gambia", "GEO" => "Georgia", "GHA" => "Ghana", "GRD" => "Granada", "GRC" => "Grecia", "GTM" => "Guatemala", "GUY" => "Guyana", "GIN" => "Guinea", "GNQ" => "Guinea Ecuatorial", "GNB" => "Guinea-Bisáu", "HTI" => "Haití", "HND" => "Honduras", "HUN" => "Hungría", "IND" => "India", "IDN" => "Indonesia", "IRQ" => "Irak", "IRN" => "Irán", "IRL" => "Irlanda", "ISL" => "Islandia", "MHL" => "Islas Marshall", "SLB" => "Islas Salomón", "ISR" => "Israel", "ITA" => "Italia", "JAM" => "Jamaica", "JPN" => "Japón", "JOR" => "Jordania", "KAZ" => "Kazajistán", "KEN" => "Kenia", "KGZ" => "Kirguistán", "KIR" => "Kiribati", "KWT" => "Kuwait", "LAO" => "Laos", "LSO" => "Lesoto", "LVA" => "Letonia", "LBN" => "Líbano", "LBR" => "Liberia", "LBY" => "Libia", "LIE" => "Liechtenstein", "LTU" => "Lituania", "LUX" => "Luxemburgo", "MDG" => "Madagascar", "MYS" => "Malasia", "MWI" => "Malaui", "MDV" => "Maldivas", "MLI" => "Malí", "MLT" => "Malta", "MAR" => "Marruecos", "MUS" => "Mauricio", "MRT" => "Mauritania", "MEX" => "México", "FSM" => "Micronesia", "MDA" => "Moldavia", "MCO" => "Mónaco", "MNG" => "Mongolia", "MNE" => "Montenegro", "MOZ" => "Mozambique", "NAM" => "Namibia", "NRU" => "Nauru", "NPL" => "Nepal", "NIC" => "Nicaragua", "NER" => "Níger", "NGA" => "Nigeria", "NOR" => "Noruega", "NZL" => "Nueva Zelanda", "OMN" => "Omán", "NLD" => "Países Bajos", "PAK" => "Pakistán", "PLW" => "Palaos", "PSE" => "Palestina", "PAN" => "Panamá", "PNG" => "Papúa Nueva Guinea", "PRY" => "Paraguay", "PER" => "Perú", "POL" => "Polonia", "PRT" => "Portugal", "GBR" => "Reino Unido", "CAF" => "República Centroafricana", "CZE" => "República Checa", "MKD" => "República de Macedonia", "COG" => "República del Congo", "COD" => "República Democrática del Congo", "DOM" => "República Dominicana", "ZAF" => "República Sudafricana", "RWA" => "Ruanda", "ROU" => "Rumanía", "RUS" => "Rusia", "WSM" => "Samoa", "KNA" => "San Cristóbal y Nieves", "SMR" => "San Marino", "VCT" => "San Vicente y las Granadinas", "LCA" => "Santa Lucía", "STP" => "Santo Tomé y Príncipe", "SEN" => "Senegal", "SRB" => "Serbia", "SYC" => "Seychelles", "SLE" => "Sierra Leona", "SGP" => "Singapur", "SYR" => "Siria", "SOM" => "Somalia", "LKA" => "Sri Lanka", "SWZ" => "Suazilandia", "SDN" => "Sudán", "SSD" => "Sudán del Sur", "SWE" => "Suecia", "CHE" => "Suiza", "SUR" => "Surinam", "THA" => "Tailandia", "TZA" => "Tanzania", "TJK" => "Tayikistán", "TLS" => "Timor Oriental", "TGO" => "Togo", "TON" => "Tonga", "TTO" => "Trinidad y Tobago", "TUN" => "Túnez", "TKM" => "Turkmenistán", "TUR" => "Turquía", "TUV" => "Tuvalu", "UKR" => "Ucrania", "UGA" => "Uganda", "URY" => "Uruguay", "UZB" => "Uzbekistán", "VUT" => "Vanuatu", "VEN" => "Venezuela", "VNM" => "Vietnam", "YEM" => "Yemen", "DJI" => "Yibuti", "ZMB" => "Zambia", "ZWE" => "Zimbabue"];
    return $paises;
}

//Leer JSON
function leerJson($json, $key)
{
    if ($json == null) {
        return null;
    } else {
        $json = $json;
        $json = json_decode($json, true);
        if (array_key_exists($key, $json)) {
            return $json[$key];
        } else {
            return null;
        }
    }
}

//funcion formato millares
function formatoMillares($cantidad, $decimal = 2)
{
    return number_format($cantidad, $decimal, ',', '.');
}

//Ceros a la izquierda
function cerosIzquierda($cantidad, $cantCeros = 2)
{
    if ($cantidad == 0) {
        return 0;
    }
    return str_pad($cantidad, $cantCeros, "0", STR_PAD_LEFT);
}

//calculo de porcentaje
function obtenerPorcentaje($cantidad, $total)
{
    if ($total != 0) {
        $porcentaje = ((float)$cantidad * 100) / $total; // Regla de tres
        $porcentaje = round($porcentaje, 2);  // Quitar los decimales
        return $porcentaje;
    }
    return 0;
}

//Función comprueba una hora entre un rango
function hourIsBetween($from, $to, $input) {
    $dateFrom = DateTime::createFromFormat('!H:i', $from);
    $dateTo = DateTime::createFromFormat('!H:i', $to);
    $dateInput = DateTime::createFromFormat('!H:i', $input);
    if ($dateFrom > $dateTo) $dateTo->modify('+1 day');
    return ($dateFrom <= $dateInput && $dateInput <= $dateTo) || ($dateFrom <= $dateInput->modify('+1 day') && $dateInput <= $dateTo);
    /*En la función lo que haremos será pasarle, el desde y el hasta del rango de horas que queremos que se encuentre y el datetime con la hora que nos llega.
Comprobaremos si la segunda hora que le pasamos es inferior a la primera, con lo cual entenderemos que es para el día siguiente.
Y al final devolveremos true o false dependiendo si el valor introducido se encuentra entre lo que le hemos pasado.*/
}


function role($i = null){

    $roles = \App\Models\Parametro::where('tabla_id', '-1')->where('id', $i)->first();
    if ($roles){
        return ucwords($roles->nombre);
    }

    $status = [
        '0'     => 'Estandar',
        '1'     => 'Administrador',
        '100'   => 'Root'
    ];
    if (is_null($i)){
        unset($status["100"]);
        return $status;
    }else{
        return $status[$i];
    }
}


function estatusUsuario($i, $icon = null){
    if (is_null($icon)){
        $suspendido = "Suspendido";
        $activado = "Activo";
    }else{
        $suspendido = '<i class="fa fa-user-slash"></i>';
        $activado = '<i class="fa fa-user-check"></i>';
    }

    $status = [
        '0' => '<span class="text-danger">'.$suspendido.'</span>',
        '1' => '<span class="text-success">'.$activado.'</span>'/*,
        '2' => '<span class="text-success">Confirmado</span>'*/
    ];
    return $status[$i];
}

function iconoPlataforma($plataforma)
{
    if ($plataforma == 0) {
        return '<i class="fas fa-desktop"></i>';
    } else {
        return '<i class="fas fa-mobile"></i>';
    }
}

