<?php
require_once("includes/header.php");

if (!isset($_GET["id"])) {
    ErrorMessage::show("No se paso ningun Id del producto");
}

$producto = new Producto($con, $_GET["id"]);
?>

<div class="container pt-2">
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col mb-4">
            <!-- Card -->
            <div class="card">

                <!--Card image-->
                <div class="view overlay">
                    <img class="img-fluid card-img-top" src="<?php echo $producto->getThumbnail(); ?>" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!--Card content-->
                <!-- <div class="card-body">

                    
                    <h4 class="card-title">Card title</h4>
                    
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                   
                    <button type="button" class="btn btn-light-blue btn-md">Read more</button>

                </div>  -->

            </div>
            <!-- Card -->
        </div>
        <div class="col-5 mb-2">
            <!-- Card -->
            <div class="card purple lighten-4">

                <!--Card image-->
                <!-- <div class="view overlay">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div> -->

                <!--Card content-->
                <div class="card-body">

                    <!--Title-->
                    <h1 class="card-title display-3"><?php echo $producto->getName(); ?></h1>
                    <!--Text-->
                    <p class="card-text"><?php echo $producto->getDescription(); ?>
                        <div class="col-5 badge purple-gradient text-wrap" style="width: 5rem;">
                            <h3>$ <?php echo $producto->getPrecio(); ?></h3>
                        </div>    
                    </p>
                    <br>
                    
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <button type="button" class="btn blue-gradient btn-md">Pedir</button>
                    <button type="button" class="btn aqua-gradient btn-md"><i class='fa fa-cart-arrow-down'></i> Agregar al carrito</button>

                </div>

            </div>
            <!-- Card -->
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>