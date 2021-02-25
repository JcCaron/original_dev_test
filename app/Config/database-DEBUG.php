<?php DECLARE(STRICT_TYPES=1); 
error_reporting(-1);
ini_set('display_errors', 'true');
ini_set('log_errors', 'true');


/////////////////////////////////////////
//////////// Your configs ///////////////   
/////////////////////////////////////////

$DATABASE     = 'yourdatabasename';
$USERNAME     = 'yourusername';
$PASSWORD     = 'yourpassword';

$use_MYSQLI = TRUE;
$use_PDO = FALSE;

///////////////////////////////////////////
//////////// end of configs ///////////////
///////////////////////////////////////////



$INFO = "
    https://phpdelusions.net/articles/error_reporting
    https://phpdelusions.net/pdo#dsn
";
 
echo '<h4>file: ' .__FILE__ .'</h4>';

// EXACT COPY OF Database.php prameters
$default = [
        'DSN'      => '',
        'hostname' => '127.0.0.1',
        'username' => $USERNAME,
        'password' => $PASSWORD,
        'database' => $DATABASE,
        'DBDriver' => 'MySQLi', # GOOD
    #    'DBDriver' => 'SQLite3',
    #    'DBDriver' => 'Postgre',         
    #    'DBDriver' => 'PDO',         
    #    'DBDriver' => 'pgsql:host=localhost;port=5432;dbname=ci4',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => (ENVIRONMENT !== 'production'),
        'cacheOn'  => false,
        'cacheDir' => '',
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306,
    ];
    if(0) : echo '$defaults[] ==> ';print_r($default); endif;



//=========================================================
    if(isset($use_MYSQLI) && $use_MYSQLI) :
        $style = 'width:88%; margin:0 auto; background-color: #cfc ; color: RED';
        echo "<pre style='$style'>";

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $db = new mysqli
            (
                $default['hostname'], 
                $default['username'], 
                $default['password']
            );
        $DB = $db;
        echo '<h1> MYSQLI - Connected </h1>';    
        echo 'Database: $DB ==> '; print_r($DB);
        echo '</pre>';
        echo '<hr>Line: '.__line__ .'<hr><br><br><br>';
    endif;
//=========================================================


//=========================================================
    if( isset($use_PDO) && $use_PDO ) :
        $style = 'width:88%; margin:0 auto; background-color: #ccf ; color: RED';
        echo "<pre style='$style'>";

        $dbasename     = $default['database'];
        $host             = $default['hostname']; // '127.0.0.1';
        $user             = $default['username'];
        $pass             = $default['password'];
        $charset         = 'utf8mb4';

        $dsn = "mysql: 
            host=$host; 
            dbname=$dbasename; 
            charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
             $pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
             throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        echo '<h1> PDO - Connected to database: '. $DATABASE .'</h1>';    
        $DB = $pdo;
        echo 'Database: $DB ==> '; print_r($DB);
        echo '</pre>';
        echo '<hr>Line: '.__line__ .'<hr><br><br><br>';
endif;
//=========================================================


//=========================================================
if(10 || isset($PDO) ) :
        $style = 'width:88%; margin:0 auto; background-color: #fcc ; color: RED';
        echo "<pre style='$style'>";

    $INFO = "
        https://phpdelusions.net/pdo#dsn
        
        Note that it's important to follow the proper format - 
        no spaces or quotes or other decorations have to be used in DSN, 
        but only parameters, values and delimiters, 
        as shown in the manual.
    ";

    # $db = "mysql:host=$host;dbname=$db;charset=$charset";
    $dbname     =    $default['database'];
    $hostname = $default['hostname'];
    $charset    = 'utf8mb4';
    $dsn             = "mysql:host=$hostname;dbname=$dbname;charset=$charset";
    $options     = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
         $pdo = new PDO
         (
             $dsn, 
             $default['username'], 
             $default['password'], 
             $options
         );
    } catch (\PDOException $e) {
        print_r($e); die;
       throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    $DB = $pdo;
    echo '<h1> PDO - Connected to database: '. $default['database'] .'</h1>';    
    echo 'Database: $DB ==> '; print_r($DB);
    echo '</pre>';
    echo '<hr>Line: '.__line__ .'<hr><br><br><br>';
endif;
//========================================================= 