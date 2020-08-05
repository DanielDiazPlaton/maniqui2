<?php

class CategoryContainers{

    private $con, $username;

    public function __construct($con)
    {
        $this->con =$con;
        //$this->username = $username;
    } // fin del constructor

    public function showAllCategories(){

        $query = $this->con->prepare("SELECT * FROM categories");
        $query->execute();

        $html = "<div class='container pt-2 pb-2 parallax'>";

        // Imprime las categorias una por una, hasta que deje de hacer la consulta
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            //$html .= $row["name"];  // el .= hace que se imprima lo que se consulta 
            $html .= $this->getCategoryHtml($row, null, true, true);
        }

        return $html . "</div>";

    } // fin de la funcion showAllCategories

    public function showCategory($categoryId, $title = null){

        $query = $this->con->prepare("SELECT * FROM categories WHERE id=:id");
        $query->bindValue(":id", $categoryId);
        $query->execute();

        $html = "<div class='container'>";

        // Imprime las categorias una por una, hasta que deje de hacer la consulta
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            //$html .= $row["name"];  // el .= hace que se imprima lo que se consulta 
            $html .= $this->getCategoryHtml($row, $title, true, true);
        }

        return $html . "</div>";

    } // end the function showCategory

    public function showNotice($categoryId, $title = null){

        $query = $this->con->prepare("SELECT * FROM categories WHERE id=:id");
        $query->bindValue(":id", $categoryId);
        $query->execute();

        $html = "<div id='carousel-example-2' class='carousel slide carousel-fade' data-ride='carousel'>";

        // Imprime las categorias una por una, hasta que deje de hacer la consulta
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            //$html .= $row["name"];  // el .= hace que se imprima lo que se consulta 
            $html .= $this->getNotice($row, $title, true, true);
        }

        return $html . "</div>";

    } // end the function showCategory

    private function getCategoryHtml($sqlData, $title, $tvShows, $movies){

        $categoryId = $sqlData["id"];
        $title = $title == null ? $sqlData["name"] : $title;

        if($tvShows && $movies){
            $entities = EntityProvider::getEntities($this->con, $categoryId, 30); // Aqui mando a consultar las
            //peliculas relacionadas a esa categoria y son 30 las que pido
        }else if($tvShows){
            // Get tv show entities
        }else{
            // Get movie entities
        }

        if(sizeof($entities) == 0){
            return;
        }

        $entitiesHtml = "";
        $previewProvider = new PreviewProvider($this->con);

        foreach($entities as $entity){
            $entitiesHtml .= $previewProvider->createEntityPreviewSquad($entity);
        }

        return "<a class='pt-5 pb-5' href='category.php?id=$categoryId'>
                    <h3 class='pt-5 pb-2 text-dark font-weight-bold'>$title</h3> 
                    </a>
                    <div class='row'>
                                $entitiesHtml
                        
                   </div>";

    }  // fin de la funcion getCategoryHtml

    private function getNotice($sqlData, $title, $tvShows, $movies){

        $categoryId = $sqlData["id"];
        $title = $title == null ? $sqlData["name"] : $title;

        if($tvShows && $movies){
            $entities = EntityProvider::getEntities($this->con, $categoryId, 30); // Aqui mando a consultar las
            //peliculas relacionadas a esa categoria y son 30 las que pido
        }else if($tvShows){
            // Get tv show entities
        }else{
            // Get movie entities
        }

        if(sizeof($entities) == 0){
            return;
        }

        $entitiesHtml = "";
        $previewProvider = new PreviewProvider($this->con);

        foreach($entities as $entity){
            $entitiesHtml .= $previewProvider->createEntityNotice($entity);
        }

        return "<!--<div id='carousel-example-2' class='carousel slide carousel-fade' data-ride='carousel'>-->
                    <!--Indicators-->
                    <ol class='carousel-indicators'>
                        <li data-target='#carousel-example-2' data-slide-to='0' class='active'></li>
                        <li data-target='#carousel-example-2' data-slide-to='1'></li>
                        <li data-target='#carousel-example-2' data-slide-to='2'></li>
                        
                
                    </ol>
                    <!--/.Indicators-->
                    <!--Slides-->
                    <div class='carousel-inner' role='listbox'>
                        <div class='carousel-item active'>
                            <div class='view'>
                                <img class=' d-block w-100' src='productos/thumbnails/prueba/1.png'
                                alt='First slide'>
                                <div class='mask rgba-black-light'></div>
                            </div>
                            <div class='carousel-caption'>
                                <h3 class='h3-responsive'>Light mask</h3>
                                <p>First text</p>
                            </div>
                        </div>
                         $entitiesHtml
                    </div>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class='carousel-control-prev' href='#carousel-example-2' role='button' data-slide='prev'>
                        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                        <span class='sr-only'>Previous</span>
                    </a>
                    <a class='carousel-control-next' href='#carousel-example-2' role='button' data-slide='next'>
                        <span class='carousel-control-next-icon' aria-hidden='true'></span>
                        <span class='sr-only'>Next</span>
                    </a>
                    <!--/.Controls-->
                <!--/div-->
                <!--/.Carousel Wrapper-->";

    }  // fin de la funcion getCategoryHtml
 
}

?>