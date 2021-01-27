<?php

class Article
{

    private $_id;
    private $_article;
    private $_id_utilisateur;
    private $_id_categorie;
    private $_date;

    public function __construct(array $data){
        $this->hydrate($data);

    }
    // Pour chaque élément data

    //$data = ['id' = 1,
    // 'title' = dave,
    //'content' = 'programmer',
    //'date' = '26 01 2021']
    public function hydrate(array $data){
        foreach($data as $key => $value){ // Pour chaque élément dans notre tableau $data
            $method = 'set'.ucfirst($key); // Donnera setId setTitle setContent etc..
            if(method_exists($this,$method)){
                $this->$method($value);  
            }
        }
    }

    //setters

    public function setId($id){
        $id = (int) $id;
        if($id > 0){
            $this->_id = $id;
        }
    }

    public function setArticle($article){
        if(is_string($article)){
            $this->_article = $article;
        }
    }

    public function setId_utilisateur($utilisateur){
        $utilisateur = (int) $utilisateur;
        if($utilisateur > 0){
            $this->_id_utilisateur = $utilisateur;
        }
    }

    public function setId_categorie($categorie){
        $categorie = (int) $categorie;
        if($categorie > 0){
            $this->_id_categorie = $categorie;
        }
    }

    public function setDate($date){
        $this->_date = $date;
    }

    //getters

    public function _id(){
        return $this->_id;
    }

    public function article(){
        return $this->_article;
    }

    public function _id_utilisateur(){
        return $this->_id_utilisateur;
    }

    public function _id_categorie(){
        return $this->_id_categorie;
    }

    public function _date(){
        return $this->_date;
    }

}


?>