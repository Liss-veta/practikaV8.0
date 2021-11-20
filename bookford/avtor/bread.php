<?php

class Database {
    private $link;

    public function __construct () {
        $this->connect();
    }

    private function connect() {
        $dsn = "mysql:host=localhost;dbname=bookford1;charset=utf8";
        $this->link = new PDO($dsn, 'root', 'root');
        return $this;
    }

    public function execute($sql) {
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    public function query($sql) {
        $sth = $this->link->prepare($sql);
        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if($result === false) {
            return [];
        }
        return $result;
    }

}