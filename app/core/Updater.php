<?php


class Updater extends DB
{
    public $_getArray;


    public function __construct()
    {
        // Get DB Connection
        $this->_DB = $this->getInstance();

        // grab GET global data
        $this->setGetArray();
    }


    public function setGetArray()
    {
        $this->_getArray = $_GET;
    }

    public function getGetArray()
    {
        return $this->_getArray;
    }


    public function updatePage($pageId, $pageTitle, $pageSlug, $pageBlock, $blockId)
    {

        //Pages table update
        try
        {
            $sqlQuery = "UPDATE pages SET page_title='{$pageTitle}', page_slug='{$pageSlug}'
            WHERE id=$pageId";

            $stmt = $this->_DB->_pdo->prepare($sqlQuery);


            $stmt->execute();
        }catch(PDOException $e)
        {
            echo "unsuccesfull";
            $e->getMessage();
        }

        // Block Table Update
        try
        {
            $sqlQuery = "UPDATE blocks SET block_value='{$pageBlock}'
            WHERE id='$blockId'";

            $stmt = $this->_DB->_pdo->prepare($sqlQuery);


            $stmt->execute();
        }catch(PDOException $e)
        {
            echo "unsuccesfull";
            $e->getMessage();

        }

    } // End Update Page


    public function updateProduct($product, $productName, $productDescription, $imageId)
    {
        try
        {
            $sqlQuery = "UPDATE products SET product_name='{$productName}', product_description='{$productDescription}', image={$imageId}
            WHERE product_name='$product'";

            $stmt = $this->_DB->_pdo->prepare($sqlQuery);


            $stmt->execute();
        }catch(PDOException $e)
        {
            echo "unsuccesfull";
            $e->getMessage();
        }
    }


    public function updateApplication($application, $applicationName, $applicationDescription, $imageIds)
    {

        //select $applicationId based on $application

        // run the try block below for

        try{

            $sqlQuery = "SELECT id FROM applications WHERE application_name='{$application}'";

            $stmt = $this->_DB->_pdo->query($sqlQuery);


            $query = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $applicationId = $query['0']['id'];


        }catch (PDOException $e){
            $e->getMessage();
            echo "Select unsuccesful";
        }


        //Update applications table information

        try
        {
            $sqlQuery = "UPDATE applications SET application_name='{$applicationName}',
            application_description='{$applicationDescription}',
            image={$imageIds[0]}
            WHERE id='$applicationId'";

            $stmt = $this->_DB->_pdo->prepare($sqlQuery);


            $stmt->execute();

            echo "Update Success";
        }catch(PDOException $e)
        {
            echo "unsuccesfull";
            $e->getMessage();
        }


        // Update application_images table 'id' field
        try
        {
            $sqlQuery = "SELECT id FROM application_images WHERE application_id={$applicationId}";

            $query = $this->_DB->_pdo->query($sqlQuery)->fetchAll(PDO::FETCH_ASSOC);

            $applicationImagesRefIds = $query;


        }catch (PDOException $e){
            echo"unsuccessful SELECT";

        }

        // Update Application_images

            // from this arrach for loop through and up usimage image IDS array with $index

        $i = 0;
            foreach($imageIds as $imageId)
            {
        

                $sql = "UPDATE application_images SET image_id={$imageId} where id={$applicationImagesRefIds[$i]['id']}";

                $stmt = $this->_DB->_pdo->prepare($sql);
                $stmt->execute();
                $i++;

            }
    } // End updateApplication


    public function updateProject($project, $projectName, $projectDescription, $imageIds)
    {

        //select $projectId based on $project

        // run the try block below for

        try{

            $sqlQuery = "SELECT id FROM projects WHERE project_name='{$project}'";

            $stmt = $this->_DB->_pdo->query($sqlQuery);


            $query = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $projectId = $query['0']['id'];


        }catch (PDOException $e){
            $e->getMessage();
            echo "Select unsuccesful";
        }


        //Update projects table information

        try
        {
            $sqlQuery = "UPDATE projects SET project_name='{$projectName}',
            project_description='{$projectDescription}',
            image={$imageIds[0]}
            WHERE id='$projectId'";

            $stmt = $this->_DB->_pdo->prepare($sqlQuery);


            $stmt->execute();

            echo "Update Success";
        }catch(PDOException $e)
        {
            echo "unsuccessfull";
            $e->getMessage();
        }


        // Update project_images table 'id' field
        try
        {
            $sqlQuery = "SELECT id FROM project_images WHERE project_id={$projectId}";

            $query = $this->_DB->_pdo->query($sqlQuery)->fetchAll(PDO::FETCH_ASSOC);

            $projectImagesRefIds = $query;


        }catch (PDOException $e){
            echo"unsuccessful SELECT";

        }

        // Update Project_images

        // from this arrach for loop through and up usimage image IDS array with $index

        $i = 0;
        
        foreach($imageIds as $imageId)
        {
            $sql = "UPDATE project_images SET image_id={$imageId} where id={$projectImagesRefIds[$i]['id']}";

            $stmt = $this->_DB->_pdo->prepare($sql);
            $stmt->execute();
            $i++;

        }
    } // End updateProject


}// End of Updater