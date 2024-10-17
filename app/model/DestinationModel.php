<?php

class DestinationModel{

    function getConnection(){
        $db= new PDO('mysql:host=localhost; dbname=sistemadereservas; charser= utf8', 'root','');
        return $db;

    }
    
    public function getDestinations(){
        $db = $this->getConnection();
        $query = $db->prepare('SELECT * FROM destination');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertDestination($name, $description, $attractions, $season){
        $db = $this->getConnection();
        $query = $this->$db->prepare('INSERT INTO destination(name, description, attractions, season');
        return $query->execute([$name, $description, $attractions, $season]);
    }

    public function deleteDestination($ID_DESTINATION){
        $db = $this->getConnection();
        $query = $this->$db->prepare('DELETE FROM destination WHERE ID_DESTINATION = ?');
        return $query->execute([$ID_DESTINATION]);
    }

    public function updateDestination($name, $description, $attractions, $season){
        $db = $this->getConnection();
        $query = $this->$db->prepare('UPDATE destination SET name = ?, description = ?, attractions = ?, season = ? ');
        return $query->execute([$name, $description, $attractions, $season]);
    }
}