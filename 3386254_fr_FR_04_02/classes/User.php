<?php
namespace Classes;

class user  extends ObjectModel {

    public $id;

    public $firstname;

    public $lastname;

    public $email;

    public $password;

    public $errors;
    

    protected static $table_name = 'user';
    protected static $db_columns =  ['firstname','lastname','email','password'];

    public function __construct($parameters=[])
    {
        $this->firstname = $parameters['firstname'];
        $this->lastname = $parameters['lastname'];
        $this->email = $parameters['email'];
        $this->password = $parameters['password'];
    }

    public function setPassword()
    {
        // la méthode password_hash 1) le mot de passe   2) ALGO
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function save()
    {
        $this->setPassword();
        parent::save();
    }

    public function update($id)
    {
        $this->setPassword();
        parent::update($id);
    }


    public function validation()
    {
        $this->errors = [];

        if(empty($this->firstname)){
            $this->errors[] = 'le  champ firstname est vide';
        }

        if(empty($this->lastname)){
            $this->errors[] = 'le champ lastname est vide';
        }

        if(empty($this->email))
        {
            $this->errors[] = 'le champ email est vide';
        }

        if(empty($this->passsword))
        {
            $this->errors[] = 'le champ password  est vide';
        }

        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) == false) {
            $this->errors[] = 'vérifier le champ email.';
        }

        if(strlen($this->password ) < 5)
        {
            $this->errors[] = 'le mot de passe doir contenir au minimum 5 caractères';
        }
    }

    

 }
