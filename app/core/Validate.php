<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 07/03/16
 * Time: 18:21
 */
class Validate extends DB
{

    public $postArray;


    public function __construct()
    {
        // Get DB Connection
        $this->_DB = $this->getInstance();

        // grab GET global data
        $this->setPostArray();
    }


    // Setters
    public function setPostArray()
    {


        $sainitizedArray = array();

        foreach($_POST as $post)
        {
            $postSanitize = s($post);

            array_push($sainitizedArray,$postSanitize);
        }

        $this->postArray = $sainitizedArray;
    }


    // Getters

    public function getPostArray()
    {
        return $this->postArray;
    }


    // Class Methods
    public function authenticate($username, $password)
    {

        $hashed = md5($password);


            try {
                $sql = "SELECT * FROM user WHERE username = :user AND password = :password";

                $prepared = $this->_DB->_pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));


                if ($prepared->execute(array(':user' => $username, ':password' => $hashed))) {
                    $result = $prepared->fetchAll(PDO::FETCH_ASSOC);

                    if ($result) {
                        echo "password Success";
                        return true;
                    } else {
                        return false;
                    }


                } else {
                    return false;
                }
            }catch (PDOException $e)
            {
                $e->getMessage();
            }


        // This returning correct, now needs to start session return tru so that page and relocate.


        //return true;

    }

    public static function redirect($url)
    {
        header('Location: '.$url);
    }




}