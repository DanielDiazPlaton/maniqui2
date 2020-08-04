<?php 
class Producto {
    private $con, $sqlData, $entity;

    public function __construct($con, $input)
    {
        $this->con = $con;

        if(is_array($input)){
            $this->sqlData = $input;
        }else{

            $query = $this->con->prepare("SELECT * FROM productos WHERE id=:id");
            $query->bindValue(":id", $input);
            $query->execute();

            $this->sqlData = $query->fetch(PDO::FETCH_ASSOC); 

        }

        $this->entity = new Entity($con, $this->sqlData["id"]);
    } // fin del constructor

    public function getId(){
        return $this->sqlData["id"];
    } // end the function getId 

    public function getName(){
        return $this->sqlData["name"];
    } // end the function getTitle 

    public function getPrecio(){
        return $this->sqlData["precio"];
    } // end the function getPrecio() 

    public function getDescription(){
        return $this->sqlData["descripcion"];
    } // end the function getDescription() 

    public function getPreview(){
        return $this->sqlData["preview"];
    } // end the function getFilePath 

    public function getThumbnail(){
        return $this->entity->getThumbnail();
    } // end the function getThumbnail() 

    public function getCategoryId(){
        return $this->sqlData["categoryId"];
    } // end the function getCategoryId()


} // end the class Video

?>