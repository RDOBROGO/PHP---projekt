<main>
    <section class="cars">
        <div class="container">
            <?php
                $date = date('Y-m-d');
                foreach ($car ?? [] as $data):
                    $cars = <<<CAR
                        <div class="car">
                            <img src="{$data['zdjecie']}" alt="{$data['marka']} {$data['model']}">
                            <h2>{$data['marka']} {$data['model']}</h2>
                            <p>liczba miejsc: {$data['ilosc_miejsc']}</p>
                        </div>
                    CAR;

                    echo $cars;
                endforeach;
                echo "
                    <div class='car login'>
                        <div class='container'>
                    ";
                if(empty($_SESSION['user']))
                {
                    echo "
                        <h2>Zaloguj się, aby zarezerwować</h2>
                        <form class='form login_form' method='POST' action='index.php?action=car&car={$_GET['car']}'>
                            <input id='email' name='email' type='text' placeholder='Adres e-mail' required>
                            <input id='pass' name='password' type='password' placeholder='Hasło' required>
                            <input id='action' name='action'  type='submit' value='zaloguj się'>
                        </form>
                        <h2>Nie masz konta?</h2>
                        <a class='login_form' href='index.php?action=register'><button>zarejestruj się</button></a>
                    ";
                } else if($_SESSION['user'] === 'admin@admin.pl') 
                {
                switch ($data['stan']) {
                    case 'dostępny':
                        echo "
                            <h2>Wynajem</h2>
                            <form class='form login_form' method='POST' action='index.php?action=car&car={$_GET['car']}'>
                                <input name='nr_rejestracyjny'  type='text' value='{$_GET['car']}' hidden>
                                <input name='stan'  type='text' value='wynajęte' hidden>
                                <input name='e-mail'  type='text' placeholder='Wpisz email użytkownika'>
                                <input name='data_wynajmu'  type='date' hidden value='$date'>
                                <label for='data_zwrotu'>Podaj datę zwrotu</label>
                                <input name='data_zwrotu'  type='date'>
                                <input name='action'  type='submit' value='Wynajmij'>
                            </form>
                            <form class='form login_form' method='POST' action='index.php?action=car&car={$_GET['car']}'>
                                <input name='nr_rejestracyjny'  type='text' value='{$_GET['car']}' hidden>
                                <input name='stan'  type='text' value='uszkodzone' hidden>
                                <input name='action'  type='submit' value='Auto uszkodzone'>
                            </form>
                            <form method='POST' action='index.php?action=cars' >
                                <input type=text value='{$data['nr_rejestracyjny']}' name='nr_rejestracyjny' hidden>
                                <input name='action' type=submit value='Usuń auto'>
                            </form>
                        ";
                        break;
                    case 'wynajęte':
                        echo "
                            <h2>To auto jest wynajęte:</h2>
                            <form class='form login_form' method='POST' action='index.php?action=car&car={$_GET['car']}'>
                                <input name='nr_rejestracyjny'  type='text' value='{$_GET['car']}' hidden>
                                <input name='stan'  type='text' value='dostępny' hidden>
                                <input name='action'  type='submit' value='Zakończ wynajem'>
                            </form>
                            <form class='form login_form' method='POST' action='index.php?action=car&car={$_GET['car']}'>
                                <input name='nr_rejestracyjny'  type='text' value='{$_GET['car']}' hidden>
                                <input name='stan'  type='text' value='uszkodzone' hidden>
                                <input name='action'  type='submit' value='Auto uszkodzone'>
                            </form>
                        ";
                        break;
                        case 'uszkodzone':
                            echo "
                            <h2>Auto jest uszkodzone</h2>
                            <form class='form login_form' method='POST' action='index.php?action=car&car={$_GET['car']}'>
                                <input name='nr_rejestracyjny'  type='text' value='{$_GET['car']}' hidden>
                                <input name='stan'  type='text' value='dostępny' hidden>
                                <input name='action'  type='submit' value='Auto naprawione'>
                            </form>
                            ";
                            break;
                        case 'zarezerwowane':
                            echo "
                            <h2>Auto jest zarezerwowane</h2>
                            <form class='form login_form' method='POST' action='index.php?action=car&car={$_GET['car']}'>
                                <input name='nr_rejestracyjny'  type='text' value='{$_GET['car']}' hidden>
                                <input name='stan'  type='text' value='dostępny' hidden>
                                <input name='action'  type='submit' value='Zakończ rezerwację'>
                            </form>
                            <h2>Możesz je wynająć</h2>
                            <form class='form login_form' method='POST' action='index.php?action=car&car={$_GET['car']}'>
                                <input name='nr_rejestracyjny'  type='text' value='{$_GET['car']}' hidden>
                                <input name='stan'  type='text' value='wynajęte' hidden>
                                <input name='e-mail'  type='text' placeholder='Wpisz email użytkownika'>
                                <input name='data_wynajmu'  type='date' hidden value='$date'>
                                <label for='data_zwrotu'>Podaj datę zwrotu</label>
                                <input name='data_zwrotu'  type='date'>
                                <input name='action'  type='submit' value='Wynajmij'>
                            </form>
                            <form class='form login_form' method='POST' action='index.php?action=car&car={$_GET['car']}'>
                                <input name='nr_rejestracyjny'  type='text' value='{$_GET['car']}' hidden>
                                <input name='stan'  type='text' value='uszkodzone' hidden>
                                <input name='action'  type='submit' value='Auto uszkodzone'>
                            </form>
                            ";
                            break;
                    }

                } else 
                {
                    switch ($data['stan']) {
                        case 'dostępny':
                            echo "
                                <h2>Zarezerwój auto</h2>
                                <form class='form login_form' method='POST' action='index.php?action=car&car={$_GET['car']}'>
                                    <input name='nr_rejestracyjny'  type='text' value='{$_GET['car']}' hidden>
                                    <input name='stan'  type='text' value='zarezerwowane' hidden>
                                    <input name='data_wynajmu'  type='date'>
                                    <input name='data_zwrotu'  type='date'>
                                    <input name='action'  type='submit' value='Zarezerwój'>
                                </form>
                            ";
                            break;
                        case 'wynajęte':
                            echo "
                                <h2>To auto jest wynajęte:</h2>
                                <p>do: {$data['wypożyczony_do']}</p>
                            ";
                            break;
                            case 'uszkodzone':
                                echo "
                                    <h2>Auto jest uszkodzone</h2>
                                ";
                                break;
                            case 'zarezerwowane':
                                echo "
                                    <h2>To auto jest zarezerwowane</h2>
                                ";
                                break;
                        }
                }
                echo "                            
                        </div>
                    </div>
                ";
            ?>

        </div>
    </section>
</main>