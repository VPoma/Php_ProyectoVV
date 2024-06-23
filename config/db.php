<?Php

Class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'root', '', 'registroivv');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}

?>