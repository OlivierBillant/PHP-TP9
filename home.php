<?php

if (file_exists('test.xml')) {
    $xml = simplexml_load_file('test.xml');
    try{

        $hote=$xml->host;
        $username=$xml->username;
        $pwd = $xml->password;
        $dbname=$xml->dbname;
        $db = new PDO("mysql:host=$hote;dbname=$dbname",$username,$pwd);// Admin

 //Requete de selectAll
 $sql = "SELECT * FROM article";
 $stmt = $db->query($sql);
 $arr = $stmt->fetchAll(PDO::FETCH_ASSOC); // tableau
 var_dump($arr);

}catch(PDOException $e ){
    echo "Not Connected";
}    
} else {
exit('Echec lors de l\'ouverture du fichier test.xml.');
}