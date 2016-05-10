<?php

/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 21/03/16
 * Time: 17:23
 */
class ImageUploader extends DB
{

    public $imageTitle;
    public $imageTitleGiven;
    public $imageFileType;
    public $validFileTypes = array('.png','.jpg','.gif');
    public $errorMessage = '';

    public function __construct()
    {
        $this->_DB = $this->getInstance();

        $this->setImageTitleGiven(false);
    }



    //Setters

    public function setImageTitleGiven($status)
    {
        $this->imageTitleGiven = $status;
    }

    public function setImageTitle()
    {

        if(empty($_POST['image_title']))
        {
            $this->setImageTitleGiven(false);

            $imageTitle = $this->imageTitle = $_FILES['file']['name'];

            $imageTitleReplace= str_replace(' ', '-', $imageTitle);

            $this->imageTitle = $imageTitleReplace;
        } else
        {
            $this->setImageTitleGiven(true);

            $imageTitle = $_POST['image_title'].$this->getImageFileType();
            $imageTitleReplace= str_replace(' ', '-', $imageTitle);

            $this->imageTitle = $imageTitleReplace;
        }
    }


    public function setImageFileType()
    {

        $file = $_FILES['file']['name'];
        $fileExtension = strtolower(end(explode('.',$file)));
        $fileType = '.'.$fileExtension;

        $this->imageFileType = $fileType;

    }


    public function setErrorMessage($message)
    {
        $this->errorMessage = $message;
    }


    // Getters

    public function getImageTitleGiven()
    {
        return $this->imageTitleGiven;
    }


    public function getImageTitle()
    {
       return $this->imageTitle;
    }


    public function getImageFileType()
    {
        return $this->imageFileType;
    }


    public function getValidFileTypes()
    {
        return $this->validFileTypes;
    }


    public function getErrorMessage()
    {
        return $this->errorMessage;
    }


    // Methods

    public function validateFileType()
    {
        if(in_array($this->getImageFileType(), $this->getValidFileTypes()))
        {
            return true;
        } else
        {
            return false;
        }
    }


    public function insertImageDB($imageTitle, $imageSrc)
    {
        try
        {
            $sqlQuery = "INSERT INTO images (image_title, image_src)
                  VALUE (:title, :src)";

            $stmt = $this->_DB->_pdo->prepare($sqlQuery);


            $stmt->bindParam(':title', $imageTitle);
            $stmt->bindParam(':src', $imageSrc);
            echo "<br> <br> <br>";

            $stmt->execute();

            echo"succesful!!!!!!";
        }catch(PDOException $e)
        {
            echo "unsuccesfull";
            $e->getMessage();
        }
    }


    public function uploadImage()
    {

        if($_FILES['file']['size'] > 0)
        {
            // File Exists

            if($_FILES['file']['size'] <= 300000)
            {
                /*******************/

                $this->setImageFileType();
                    //First get the file type and check it is a valid image type.
                if($this->validateFileType())
                {
                    echo "File type Valid";

                    // Set Image Title
                    $this->setImageTitle();

                    // Upload File
                    if(move_uploaded_file($_FILES['file']['tmp_name'], IMG_LOCAL.$this->getImageTitle()))
                    {
                        $this->insertImageDB($this->getImageTitle(), IMG_URL.$this->getImageTitle());
                        return true;

                    }else
                    {
                        //Upload Failed

                        $this->setErrorMessage('Upload-Failed');
                        return false;
                    }
                }else
                {
                    $this->setErrorMessage('file-type-not-valid');
                    return false;

                }
            }else
            {
                //Upload to large
                $this->setErrorMessage('Upload-to-large');
                return false;
            }
        }else
        {
            // No image uploaded

            $this->setErrorMessage('No-File-Selected');
            return false;

        }
    }
}// End of class