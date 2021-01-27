<?php
class Article
{
    private $_id;
    private $_article;
    private $_idUtilisateur;
    private $_idCategorie;
    private $_date;

    //Constructeur
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    //Hydratation
    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);//setId; setArticle..

            if(method_exists($this, $method))
            {
                $this->$method($value); 
            }               
        }
    }

    //SETTERS
    public function setId($id)
    {
        $id = (int) $id;

        if($id > 0){
            $this->_id = $id;
        }
    }

    public function setContent($article)
    {
       if(is_string($article)){
            $this->_article = $article;
        }
    }

    public function setUserId($userId)
    {
        $userId = (int) $userId;

        if($userId > 0){
            $this->_idUtilisateur = $userId;
        }
    }

    public function setCategorieUser()
    {
        $idCategorie = (int) $idCategorie;

        if($idCategorie > 0){
            $this->_idCategorie = $idCategorie;
        }
    }

    public function setDate($date)
    {
        $this->_date = $date;
    }

    

    //GETTERS
    public function id()
    {
        return $this->_id;
    }

    public function article()
    {
        return $this->_article;
    }

    public function idUtilisateur()
    {
        return $this->_idUtilisateur;
    }

    public function idCategorie()
    {
        return $this->_idCategorie;
    }

    public function date()
    {
        return $this->_date;
    }
}

?>