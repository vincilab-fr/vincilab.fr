<?php class Database { 
        private static ?PDO $instance = null;

        private function __construct() {}
        public static function getInstance(): PDO {
            if (self::$instance === null) {
                 $config = require __DIR__ . '/../config/config.php';
        
                $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
                
                try {
                    self::$instance = new PDO(
                        $dsn,
                        $config['user'],
                        $config['password'],
                        [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                        ]
                    );
                } catch (PDOException $e) {
                    throw new Exception("Echec de connexion à la base de données: " . $e->getMessage());
                }
            }
            return self::$instance;
    }
    
} 

