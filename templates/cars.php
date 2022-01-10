<main>
    <section class="carstype">
        <div class="container">
            <a href="index.php?action=cars&cartype=osobowe">osobowe</a>
            <a href="index.php?action=cars&cartype=specjalne">specjalne</a>
            <a href="index.php?action=cars&cartype=dostawcze">dostawcze</a>
            <a href="index.php?action=cars&cartype=laweta">lawety</a>
        </div>
    </section>
    <section class="cars">
        <div class="container">
        <?php 
                    if(empty($_GET['car']) || $_GET['car'] !== 'available'){
            foreach ($cars ?? [] as $car):
                $cars = <<<CAR
                    <div class="car">
                    <a href="index.php?action=car&car={$car['nr_rejestracyjny']}">
                        <img src="{$car['zdjecie']}" alt="{$car['marka']} {$car['model']}">
                        <h2>{$car['marka']} {$car['model']}</h2>
                        <p>zobacz<img src="images/right-arrow.png" alt="strzałka lawety samochodowe"></p>
                    </a>
                    </div>
                CAR;

                echo $cars;
            endforeach;
        }
            else{
                echo "
                <h1>Dostępne pojazdy</h1>
                ";
                foreach ($cars ?? [] as $car):
                    $cars = <<<CAR
                        <div class='car'>
                        <a href='index.php?action=car&car={$car['nr_rejestracyjny']}'>
                            <img src='{$car['zdjecie']}' alt='{$car['marka']} {$car['model']}'>
                            <h2>{$car['marka']} {$car['model']}</h2>
                            <p>zobacz<img src='images/right-arrow.png' alt='strzałka'></p>
                        </a>
                        </div>
                    CAR;

                    echo $cars;
                endforeach;
            }      
                            
        ?>
                    
                </div>
    </section>
</main>