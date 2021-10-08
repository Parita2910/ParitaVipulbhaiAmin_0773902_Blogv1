<?php
    class Database
    {
        private connection;

        public function_construct()
        {
            $dbc = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        }

        public function_destruct()
        {
            $dbc = null;
        }

        public function sqlQuery($sql, $bindVal = null)
        {
            $statement = $this->connection->prepare($sql);
            if(is_array($bindVal))
            {
                $statement->execute($bindVal);
            }
            else
            {
                $statement->execute();
            }
        
        return $statement;
        }

        public function fetchArray($sql, $bindVal = null)
        {
            $result = $this->sqlQuery($sql, $bindVal);
            if($result->rowCount() == 0)
            {
                return false;
            }
            else
            {
                return $result->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }

    $dbc = new Database();
?>