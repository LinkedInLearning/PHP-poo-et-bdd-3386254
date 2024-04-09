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


}