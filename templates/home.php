
    <main>
        <section id="about_as" class="about_as">
            <h1>Lider wśród wypożyczalnii w Wielkopolsce</h1>
            <div class="container">
                <div>
                    <h2>Nasza historia</h2>
                    <p>Na rynku istniejemy już od 20lat, jesteśmy tym samym jedną z najstarszych firm zajmujących się wynajmem samochodów. 
                        Jesteśmy firmą rodzinną, prowadzoną przez ojca i synów. Zaczynaliśmy jako mały punkt oferujący samochody osobowe. 
                        W tym momencie w nasza oferta jest znacznie bogatsza.
                        W naszych garażach znajdą państwo samochody miejskie, osobowe, rodzinne, sportowe, dostawcze, a nawet cięższy sprzęt jak np lawety.
                    </p>
                </div>
                <img class="about_us__img" src="images/about_as.jpeg" alt="nasze samochody na parkingu">
                <div>
                    <h2>Dlaczego Nowax`s cars</h2>
                    <ul>
                        <li>Bogata oferta</li>
                        <li>Najnowsze samochody</li>
                        <li>Stały kontakt z klientem</li>
                        <li>Atrakcyjne ceny</li>
                    </ul>
                </div>
                <div>
                    <h2>Bogata oferta</h2>
                    <p>
                        W swojej ofercie posiadamy niemal 100 samochodów. Każdy znajdzie u nas odpowiadający mu model. 
                        Potrzebujesz samochód na rodzinny wypad w góry, a może przeprowadzasz się do nowego mieszkania?
                        Nie ma problemu nasze samochody pomogą ci w kazdej sytuacji.
                    </p>
                </div>
            </div>
        </section>
        <section id="cars" class="cars">
            <h1>Nasze samochody</h1>
            <div class="container">
                <div class="cars__passenger_cars car">
                    <a href="index.php?action=cars&cartype=osobowe">
                        <img src="images/passenger.jpg" alt="auta osobowe">
                        <h2>Samochody osobowe</h2>
                        <p>zobacz<img src="images/right-arrow.png" alt="strzałka auta osobowe"></p>
                    </a>
                </div>
                <div class="cars__special_cars car">
                    <a href="index.php?action=cars&cartype=specjalne">
                        <img src="images/special.jpg " alt="auta okolicznościowe">
                        <h2>Samochody okolicznościowe</h2>
                        <p>zobacz<img src="images/right-arrow.png" alt="strzałka auta okolicznościowe"></p>
                    </a>
                </div>
                <div class="cars__delivery_cars car">
                    <a href="index.php?action=cars&cartype=dostawcze">
                        <img src="images/delivery.jpg" alt="auta dostawcze">
                        <h2>Samochody dostawcze</h2>
                        <p>zobacz<img src="images/right-arrow.png" alt="strzałka auta dostawcze"></p>
                    </a>
                </div>
                <div class="cars__car_transporter car">
                    <a href="index.php?action=cars&cartype=laweta">
                        <img src="images/transport.jpg" alt="lawety samochodowe">
                        <h2>Lawety samochodowe</h2>
                        <p>zobacz<img src="images/right-arrow.png" alt="strzałka lawety samochodowe"></p>
                    </a>
                </div>
            </div>
        </section>
        <section id="rent" class="rent">
            <h1>Wynajmem auta</h1>
            <div class="container">
                <div class="rent__short_time car">
                    <a href="index.php?action=rent&rent=krotkitermin">
                        <img src="images/short_time.jpg" alt="wynajem krótkoterminowy samochodów">
                        <h2>Wynajem krótkoterminowy</h2>
                        <p>sprawdź<img src="images/right-arrow.png"></p>
                    </a>

                </div>
                <div class="rent__long_time car">
                    <a href="index.php?action=rent&rent=dlugitermin">
                        <img src="images/long_time.jpg">
                        <h2>Wynajem długoterminowy</h2>
                        <p>sprawdź<img src="images/right-arrow.png" alt="wynajem długoterminowy samochodów"></p>  
                    </a>
                </div>
            </div>
        </section>
        <section id="contact" class="contact">
                <h1>Kontakt</h1>
                <div class="contact__form">
                    <div class="container">
                        <h2>Zadaj nam pytanie!</h2>
                        <form class="contact_form" action="index.php" method="POST">
                            <input name="subject" type="text" placeholder="Wpisz tytuł wiadomości..." required>
                            <textarea name="message" placeholder="Wpisz treść swojego pytania..." required></textarea>
                            <input name="action" type="submit" value="wyślij">
                        </form>
                    </div>
                </div>
                <div class="contact__data">
                    <div class="container">
                        <ul>
                            <li>Nowax`s cars Sp. z o.o.</li>
                            <li>61-611 Poznań</li>
                            <li>ul. Św. Marcin 80</li>
                            <li>mail: <a href="mailto:kontakt@nowaxscars.pl">kontakt@nowaxscars.pl</a></li>
                            <li>tel: <a href="tel:+48611611611">611611611</a></li>
                        </ul>
                            <iframe
                            class="map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1182.3318942020815!2d16.918397241397262!3d52.40751516305311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47045b365fd5a499%3A0xb3e19447bd6f5862!2sZamek%20Cesarski!5e0!3m2!1spl!2spl!4v1640028276046!5m2!1spl!2spl"
                            width="50%" height="150" style="border:0;" allowfullscreen="" loading="lazy">
                            </iframe>
                    </div>
                </div>
        </section>
    </main>
