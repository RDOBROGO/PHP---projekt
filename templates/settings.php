<main>
    <section class="cars">
    <div class="container">
        <?php
        if($_SESSION['user'] !== 'admin@admin.pl'){
            echo "
                <ul>
                    <li><a href='index.php?action=settings&task=userdata'>Zmień swoje dane</a></li>
                    <li><a href='index.php?action=settings&task=password'>zmień hasło</a></li>
                    <li><a href='index.php?action=settings&task=current'>Aktualne rezerwacje</a></li>
                    <li><a href='index.php?action=settings&task=userhistory'>Historia rezerwacji</a></li>
                    <li><a href='index.php?action=settings&task=deleteuser'>Usuń konto</a></li>
                </ul>
            ";
            switch ($_GET['task']) {
                case 'password':
                        $tasks = <<<TASK
                        <section class='settingsbox'>
                            <form method="POST" action="index.php?action=settings&task=password">
                                <input name="password" type="text" placeholder="Podaj hasło" required>
                                <input name="passwordre" type="text" placeholder="Powtórz hasło" required>
                                <input id="action" name="action"  type="submit" value="Zmień hasło">
                            </form>
                        </section>
                        TASK;
    
                        echo $tasks;
                    break;
                case 'userdata':
                    foreach ($task ?? [] as $data):
                        $tasks = <<<TASK
                        <section class='settingsbox'>
                            <form method="POST" action="index.php?action=settings&task=userdata">
                                <input id="imie" name="name" type="text" value="{$data['imie']}" required>
                                <input id="email" name="email" type="text" value="{$data['email']}" required>
                                <input id="action" name="action"  type="submit" value="Zmień dane">
                            </form>
                        </section>
                        TASK;
    
                        echo $tasks;
                    endforeach;
                    break;
                    case 'userhistory':
                        foreach ($task ?? [] as $data):
                            $tasks = <<<TASK
                            <section class='settingsbox'>
                                <ul>
                                    <li>Numer rejestracyjny auta: {$data['nr_rejestracyjny']}</li>
                                    <li>Wynajęty od: {$data['od']}</li>
                                    <li>Wynajęty do: {$data['do']}</li>
                                </ul>
                            </section>
                            TASK;
        
                            echo $tasks;
                        endforeach;
                        break;
                        case 'current':
                            foreach ($task ?? [] as $data):
                                $tasks = <<<TASK
                                <section class='settingsbox'>
                                    <ul>
                                        <li>Numer rejestracyjny auta: {$data['nr_rejestracyjny']}</li>
                                        <li>Wynajęty od: {$data['od']}</li>
                                        <li>Wynajęty do: {$data['do']}</li>
                                    </ul>
                                    <form class='form login_form' method='POST' action='index.php?action=settings&task=current'>
                                    <input name='nr_rejestracyjny'  type='text' value='{$data['nr_rejestracyjny']}' hidden>
                                    <input name='stan'  type='text' value='dostępny' hidden>
                                    <input name='action'  type='submit' value='Zakończ wynajem'>
                                </form>
                                </section>
                                TASK;
            
                                echo $tasks;
                            endforeach;
                            break;
                            case 'deleteuser':
                                    $tasks = <<<TASK
                                    <section class='settingsbox'>
                                        <form class='form login_form' method='POST' action='index.php?action=settings&task=current'>
                                        <input name='email'  type='text' value='{$_SESSION['user']}' hidden>
                                        <input name='action'  type='submit' value='Usuń użytkownika'>
                                    </form>
                                    </section>
                                    TASK;
                
                                    echo $tasks;
                                break;
            }
        } else {
            echo "
                <section class='settingsbox'>
                    <ul>
                        <li><a href='index.php?action=settings&task=addcar'>Dodaj auto</a></li>
                        <li><a href='index.php?action=settings&task=current_rent'>Aktualnie wynajęte</a></li>
                        <li><a href='index.php?action=settings&task=current_reservation'>Aktualnie zarezerwowane</a></li>
                        <li><a href='index.php?action=settings&task=history_of_reservation'>Historia rezerwacji</a></li>
                        <li><a href='index.php?action=settings&task=history_of_rent'>Historia wynajmu</a></li>
                        <li><a href='index.php?action=cars'>Lista aut</a></li>
                        <li><a href='index.php?action=settings&task=manage_accounts'>Zarządzanie kontami</a></li>
                    </ul>
                </section>
           ";
                if(!empty($_GET['task'])){

                switch ($_GET['task']) {
                    case 'addcar':
                        echo "
                                <section class='settingsbox'>
                                        <form class='add_car' action='index.php?action=carlist' method='post'>
                                            <label for='nr_rejestracyjny'>Numer rejestracyjny</label>
                                            <input type='text' name='nr_rejestracyjny' placeholder='PO66..E' >
                                            <label for='marka'>Wpisz markę samochodu</label>
                                            <input type='text' name='marka' placeholder='np Skoda' >
                                            <label for='model'>Wpisz model samochodu</label>
                                            <input type='text' name='model' placeholder='np Octavia' >
                                            <label for='przebieg'>Wpisz przebieg samochodu</label>
                                            <input type='number' name='przebieg' placeholder='np. 200000' >
                                            <label for='rodzaj'>Wybierz rodzaj samochodu</label>
                                            <select name='rodzaj'>
                                                <option value='osobowe'>osobowe</option>
                                                <option value='dostawcze'>dostawcze</option>
                                                <option value='specjalne'>specjalne</option>
                                                <option value='laweta'>laweta</option>
                                            </select>
                                            <label for='uszkodzenia'>Wpisz uszkodzenia auta, jeśli posiada</label>
                                            <textarea name='uszkodzenia' placeholder='rysy, zabrudzenia, wgniecenia, uszkodzenia mechaniczne'></textarea>
                                            <label for='miejsca'>Podaj ilość miejsc w samochodzie</label>
                                            <input type='number' name='miejsca' placeholder='1-9'>
                                            <input type='submit' name='action' value='Dodaj pojazd'>
                                        </form>
                                    </section>
                        ";
                    break;
                    case 'manage_accounts':
                        foreach ($task ?? [] as $data):
                        
                            $tasks = <<<TASK
                            <form method="POST" action="index.php?action=settings&task=manage_accounts" >
                                <input type=text value="{$data['email']}" name="email" readonly>
                                <input name="action" type=submit value="Usuń użytkownika">
                            </form>
                            TASK;
        
                            echo $tasks;
                        endforeach;
                        break;
                    case 'history_of_reservation' or 'history_of_reservation':
                        echo '<div class="settingsbox">';
                        foreach ($task ?? [] as $data):
                            
                            $tasks = <<<TASK
                            <ul>
                            <li>
                            <a href="index.php?action=car&car={$data['nr_rejestracyjny']}">{$data['nr_rejestracyjny']}</a>
                            </li>
                            <li>użytkownik: {$data['e-mail']}</li>
                            <li>od: {$data['od']}</li>
                            <li>do: {$data['do']}</li>
                            </ul>
                            <hr>
                            TASK;
        
                            echo $tasks;
                        endforeach;
                        echo "</div>";
                        break;
                    }
                }
        }


        ?>

    </div>
    </section>
</main>