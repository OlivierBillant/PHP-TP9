<?php 

if (file_exists('test.xml')) {
    $xml = simplexml_load_file('test.xml');
    try{

        $hote=$xml->host;
        $username=$xml->username;
        $pwd = $xml->password;
        $dbname=$xml->dbname;
        $db = new PDO("mysql:host=$hote;dbname=$dbname",$username,$pwd);// Admin
    

        // Requete d'insertion
        // $sql = "INSERT INTO article (titre, description, prix) VALUES (?, ?, ?) ";
        // $stmt = $db->prepare($sql);
        // $stmt->bindValue(1,"SamesungS22");
        // $stmt->bindValue(2,"La concurrene");
        // $stmt->bindValue(3,"1200");
        // $stmt->execute();

        // Requete de supprimer
        // $sql = "DELETE FROM article WHERE id = ? ";
        // $stmt = $db->prepare($sql);
        // $stmt->bindValue(1,1);
        // $stmt->execute();

        // Requete de mise à jour
        $sql = "UPDATE  article SET prix = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1,50);
        $stmt->bindValue(2,3);
        $stmt->execute();

        
        //Requete de selectAll
        $sql = "SELECT * FROM article";
        $stmt = $db->query($sql);
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC); // tableau
        var_dump($arr);

        // Requete de selecBy
        // $sql = "SELECT * FROM article WHERE id = ? ";
        // $stmt = $db->prepare($sql);
        // $stmt->bindValue(1,4);
        // $stmt->execute();
        // $one = $stmt->fetch(PDO::FETCH_ASSOC);
        // var_dump($one);


    }catch(PDOException $e ){
        echo "Not Connected";
    }    
} else {
    exit('Echec lors de l\'ouverture du fichier test.xml.');
}