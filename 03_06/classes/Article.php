<?php
namespace Classes;

class Article {

    private $id;

    private $title;

    private $content;

    private $image;

    private $date;

    protected static $db_columns =  ['title','content','date'];
    

    public function __construct($parameters=[])
    {
        $this->setTitle($parameters['title']);
        $this->setContent($parameters['content']);
        $this->setDate($parameters['date']);
    }



    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public static function findAll()
    {
        $requete = Db::connect()->query('SELECT * FROM article');
        $articles = $requete->fetchAll(\PDO::FETCH_OBJ);

        return $articles;
    }

    public static function find_by_id($id)
    {
        $requete = Db::connect()->prepare("SELECT * FROM article WHERE id = ?");
       
       
        $requete->execute([$id]);
        $article = $requete->fetch(\PDO::FETCH_OBJ);

        return $article;
    }

    public function save()
    {
        $attributes = $this->attributes();
        // INSERT INTO article (colonnes) VALUES (VALEURS)
        $sql = "INSERT INTO article (";
        $sql .= join(',', self::$db_columns);
        $sql .= ") VALUES (";
        $sql .= join(",", array_values($attributes));
        $sql .=")";


        $connexion = Db::connect()->query($sql);
        $connexion->fetch();

    }

    public function attributes()
    {
        $attributes = [];

        foreach(self::$db_columns as $column)
        {
            $attributes[$column] =  Db::connect()->quote($this->$column);
        }

        return $attributes;
    }

    public function delete($id)
    {
        Db::connect()->prepare('DELETE FROM article WHERE id = ?')->execute([$id]);
        header('Location: show.php');
    }



}