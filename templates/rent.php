<main>
    <section>
        <div class="container">
            <div class="rent">
            <?php
                if($_GET['rent'] === 'krotkitermin')
                {
                    echo "
                    <h1>Wynajem krótkoterminowy</h1>
                    <p>W naszej firmie wypożyczysz pojazd na krótki termin. <a href='index.php?action=cars&car=available'>Sprawdź dostępne samochody.</a></p>
                    ";
                }
                else if($_GET['rent'] === 'dlugitermin')
                {
                    echo "
                    <h1>Wynajem długoterminowy</h1>
                    <p>W naszej firmie wypożyczysz pojazd na długi termin. <a href='index.php?action=cars&car=available'>Sprawdź dostępne samochody.</a></p>
                    ";
                }

            ?>
            </div>
        </div>
    </section>
</main>