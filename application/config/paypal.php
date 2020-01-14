<?php
/** set your paypal credential **/

$config['client_id'] = 'AejgevoPQCsbFJGRF4gsHkxxyU0S-8gIBkj_YHdLYESiStu6X-cuvsl1LrGjv-MfDntSCEoaqdNIEDqW';
$config['secret'] = 'EJ7TNE1F_cc4fFJ2nWtBpXfHN5l7fqBYhRqtQafRkjC2EConlW_N9BpZiibWiF1XOPgq1AVyUMkQ5m9E';

/**
 * SDK configuration
 */
/**
 * Available option 'sandbox' or 'live'
 */
$config['settings'] = array(

    'mode' => 'sandbox',
    /**
     * Specify the max request time in seconds
     */
    'http.ConnectionTimeOut' => 1000,
    /**
     * Whether want to log to a file
     */
    'log.LogEnabled' => true,
    /**
     * Specify the file that want to write on
     */
    'log.FileName' => 'application/logs/paypal.log',
    /**
     * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
     *
     * Logging is most verbose in the 'FINE' level and decreases as you
     * proceed towards ERROR
     */
    'log.LogLevel' => 'FINE'
);