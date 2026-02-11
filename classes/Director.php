<?php
class Director{
    public function __construct(
        private int $id,
        private string $first_name,
        private string $last_name,
    )
    {
       
    }
    

        /**
         * Get the value of id
         */
        public function getId(): int
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId(int $id): self
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of first_name
         */
        public function getFirstName(): string
        {
                return $this->first_name;
        }

        /**
         * Set the value of first_name
         */
        public function setFirstName(string $first_name): self
        {
                $this->first_name = $first_name;

                return $this;
        }

        /**
         * Get the value of last_name
         */
        public function getLastName(): string
        {
                return $this->last_name;
        }

        /**
         * Set the value of last_name
         */
        public function setLastName(string $last_name): self
        {
                $this->last_name = $last_name;

                return $this;
        }
         public static function findAll(): array
    {
        $pdo = Database::getInstance()->getPDO();
        $query = $pdo->prepare("SELECT * FROM director");
        $query->execute();

        $directors = $query->fetchAll(PDO::FETCH_ASSOC);
        $directorObjects = [];

        foreach ($directors as $director) {
            $directorObjects[] = new Director(
                $director["id"],
                $director["first_name"],
                $director["last_name"]
            );
        }

        return $directorObjects;
    }

    public static function findOneById(int $id): self|bool
    {
        $pdo = Database::getInstance()->getPDO();
        $query = $pdo->prepare("SELECT * FROM director WHERE id = :id");
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();

        $director = $query->fetch(PDO::FETCH_ASSOC);

        if ($director) {
            return new Director(
                $director["id"],
                $director["first_name"],
                $director["last_name"]
            );
        }

        return false;
    }
}
?>