<main>
    <div class="container">
        <form class="add_car" action="index.php?action=carlist" method="post">
            <label for="nr_rejestracyjny">Numer rejestracyjny</label>
            <input type="text" name="nr_rejestracyjny" placeholder="PO66..E" >
            <label for="marka">Wpisz markę samochodu</label>
            <input type="text" name="marka" placeholder="np Skoda" >
            <label for="model">Wpisz model samochodu</label>
            <input type="text" name="model" placeholder="np Octavia" >
            <label for="przebieg">Wpisz przebieg samochodu</label>
            <input type="number" name="przebieg" placeholder="np. 200000" >
            <label for="rodzaj">Wybierz rodzaj samochodu</label>
            <select name="rodzaj">
                <option value="osobowe">osobowe</option>
                <option value="dostawcze">dostawcze</option>
                <option value="specjalne">specjalne</option>
                <option value="laweta">laweta</option>
            </select>
            <label for="uszkodzenia">Wpisz uszkodzenia auta, jeśli posiada</label>
            <textarea name="uszkodzenia" placeholder="rysy, zabrudzenia, wgniecenia, uszkodzenia mechaniczne"></textarea>
            <label for="miejsca">Podaj ilość miejsc w samochodzie</label>
            <input type="number" name="miejsca" placeholder="1-9">
            <input type="submit" name="action" value="Dodaj pojazd">
        </form>
    </div>
</main>