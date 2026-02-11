<?php
class Movie
{


    public function __construct(
        private int $id,
        private string $title,
        private string $summary,
    ) {}

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
         * Get the value of title
         */
        public function getTitle(): string
        {
                return $this->title;
        }

        /**
         * Set the value of title
         */
        public function setTitle(string $title): self
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of summary
         */
        public function getSummary(): string
        {
                return $this->summary;
        }

        /**
         * Set the value of summary
         */
        public function setSummary(string $summary): self
        {
                $this->summary = $summary;

                return $this;
        }

    public static function findAll(): array
    {
        $pdo = Database::getInstance()->getPDO();
        $query = $pdo->prepare("SELECT * FROM movie");
        $query->execute();

        $movies = $query->fetchAll(PDO::FETCH_ASSOC);
        $moviesObjects = [];

        foreach ($movies as $movie) {
            $moviesObjects[] = new Movie(
                $movie["id"],
                $movie["title"],
                $movie["summary"]
            );
        }

        return $moviesObjects;
    }
    public static function findOneById(int $id): self|bool
    {
        $pdo = Database::getInstance()->getPDO();
        $query = $pdo->prepare("SELECT * FROM movie WHERE id = :id");
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();

        $movie = $query->fetch(PDO::FETCH_ASSOC);

        if ($movie) {
            return new Movie(
                $movie["id"],
                $movie["title"],
                $movie["summary"]
            );
        }

        return false;
    }

        
}
