<?php

/**
 * caller script to see whos using the plugin
 */
$ip = isset( $_SERVER[ 'REMOTE_ADDR' ] ) ? $_SERVER[ 'REMOTE_ADDR' ] : null;
$time = time();
$data = array( 'ip' => $ip );
foreach( $_GET as $key => $val ) {
    $data[$key] = $val;
}
$data[ 'calls' ] = 1;
$data[ 'time' ] = $time;

$file = date('m-d-y') . '.gz';
$contents = null;
if( is_file( $file ) ) {
    $contents = gzfile( $file );
    try {
        $contents = unserialize( $contents[0] );
    } catch( Exception $e ) {
        $contents = null;
    }
}

if( !is_array( $contents ) ) {
    $contents = array();
}

$added = false;
if( isset( $contents[ $ip ] ) ) {
    $q = isset( $data['q'] ) ? $data['q'] : '--';
    $has = isset( $contents[ $ip ][ $q ] );
    if( $has ) {

        $calls = isset( $contents[ $ip ][ $q ][ 'calls' ] ) ? $contents[ $ip ][ $q ][ 'calls' ] : 0;
        $calls++;
        $contents[ $ip ][ $q ][ 'calls' ] = intval( $contents[ $ip ][ $q ][ 'calls' ] ) + 1;
        $added = true;
        $contents[$ip][$q]['time'] = is_array( $contents[ $ip ][ $q ][ 'time' ] ) ? $contents[ $ip ][ $q ][ 'time' ] : array();
        $contents[$ip][$q]['time'][] = $time;
    } else {
        $data[ 'calls' ] = 1;
        $data[ 'time '] = array( $data[ 'time' ] );
    }
}
$contents[ $ip ] = is_array( $contents[ $ip ] ) ? $contents[ $ip ] : array();

if( !$added ) {
    $contents[ $ip ][$q] = $data;
}

$contents = serialize( $contents );

$fp = gzopen( $file, 'w+9' );
if( $fp ) {
    gzwrite($fp,$contents);
    gzclose($fp);
}
echo '{"success":true}';
exit;
