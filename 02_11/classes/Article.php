<?php
namespace Classes;

class Article {

    private $id;

    private $title;

    private $content;

    private $image;

    private $date;



    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $thid->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $thid->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $thid->content = $content;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $thid->image = $image;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $thid->date = $date;
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


}