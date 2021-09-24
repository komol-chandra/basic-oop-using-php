<?php
abstract class User
{
    protected $scores           = 0;
    protected $numberOfArticles = 0;
    // The abstract and concrete methods
    public function setNumberOfArticles($int)
    {
        $numberOfArticles       = (int) $int;
        $this->numberOfArticles = $numberOfArticles;
    }

    public function getNumberOfArticles()
    {
        return $this->numberOfArticles;
    }

    abstract public function calcScores();
}

class Author extends User
{
    public function calcScores()
    {
        $this->scores = $this->numberOfArticles * 10 + 20;

    }
}

class Editor extends User
{

    public function calcScores()
    {
        $this->scores = $this->numberOfArticles * 6 + 15;
        echo $this->scores;
    }
}
$author = new Author();
$editor = new Editor();
$editor->setNumberOfArticles(20);
$editor->calcScores();
