<?php

class PreviewProvider {

    private $con, $username;

    public function __construct($con)
    {
        $this->con = $con;
        //$this->username = $username;
    } // end the __constructor


    public function createPreviewVideo($entity) {

        if($entity == null){

            $entity = $this->getRandomEntity();

        }

        $id = $entity->getId();
        $name = $entity->getName();
        $preview = $entity->getPreview();
        $thumbnail = $entity->getThumbnail();


        //TODO:: ADD SUBTITLE

        return "<div class='previewContainer'>

                    <img src='$thumbnail' class='previewImage' hidden>

                    <video autoplay muted class='previewVideo' onended='previewEnded()'>

                        <source src='$preview' type='video/mp4'>

                    </video>

                    <div class='previewOverlay'>
                    
                        <div class='mainDetails'>

                            <h3>$name</h3>

                            <div class='buttons'>

                                <button onclick='watchProduct($id)'><i class='fa fa-cart-arrow-down'></i> Ver Producto</button>
                                <!-- <button onclick='volumeToggle(this)'><i class='fas fa-volume-mute'></i></button> -->

                            </div>

                        </div>

                    </div>

                </div>";

    } // end the function createPreviewVideo()

    public function createEntityPreviewSquad($entity){
        $id = $entity->getId();
        $thumbnail = $entity->getThumbnail();
        $name = $entity->getName();
        $precio = $entity->getPrecio();

        return "
        <div class='col-3'>
                <div class='card'>
                            <!-- Card image -->
                            <div class='view overlay'>

                                <img class='img-fluid' src='$thumbnail' title='$name'> 
                                <a href='#!'>
                                    <div class='mask rgba-white-slight'></div>
                                </a>
                            </div>

                            <div class='card-body'>

                                <!-- Title -->
                                <h4 class='card-title'>$name <p class=' red-text badge purple-gradient text-wrap '>$ $precio</p></h4>
                                <!-- Text -->
                                <p class='card-text'>
                                    </p>
                                <!-- Button -->
                                <a href='producto.php?id=$id' class='btn btn-primary'>Ver</a>

                            </div>
                            
                </div>
            </div>
                ";
    } // Fin de la funcion createEntityPreviewSquad 

    private function getRandomEntity(){

        /**
         * ORDER BY RAND() es una funcion de mysql para generar cnosulta aleatoria y 
         * LIMIT 1 -> es para que solo traiga una consulta a la vez y no mas
         */
        // $query = $this->con->prepare("SELECT *FROM entities ORDER BY RAND() LIMIT 1");
        // $query->execute();

        /**
         * Traigo la consulta de los nombres, fetch para uno solo y fetchAll para todas las columnas
         */
        // $row = $query->fetch(PDO::FETCH_ASSOC);
        
        // return new Entity($this->con, $row); // ejecuto la clase de las entidades que me permite 
        // con las funciones getID, getName, getPreview y getThumbnail obtener los datos de la tabla entities
        // de manera mas ordenada

        $entity = EntityProvider::getEntities($this->con, null, 1);
        return $entity[0];

    } // Fin de la funcion getRandomEntity

}
?>