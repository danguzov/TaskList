*** Fajlovi u glavnom folderu su cisti html ***

1.Folder "controllers"
    a).loginUser.php
        Na samom pocetku fajla se ukljuceje fajl koji u sebi sadrzi konekciju sa bazom podataka.
        Zatim se vrse provere da li input polja za email i password prazna, ako jesu ili ako korisnik zeli da se priajvi
        bez unetih parametara, ispisuje se poruka koja obavestava korisnika da unese zadate parametre.
        Nakon toga na liniji 13. se preuzimaju podaci koji su serveru posalti preko forme, a odnose se na email i password.
        Na liniji 16 se vrsi uzimanje podatka iz baze i uporedjuje se mejl koji se nalazi u inputu sa onim koji je upisan
        u bazi podataka.
        Zatim sledi provera. Ako je rezultat kverija jedna broju jedan, tj ako korisnik postoji sa tom email adresom,
        zatim sledi provera
        da li je password tacan koji je unet u input polje sa onim koji se nalazi u bazi a vezan za tu email adresu.
        Ako prodju dalje te dve provere, onda se startuje sesija koja pamtui sve korisnikove radnje na serveru,
        odnosno na aplikaciji.
        Na linija od 27 reda, sledi uzimanje prvog imena korisnika kako bi se na aplikaciji moglo ispisati njegovo ime
        i pozeleti
        dobrodoslica.
        Zatim se korisnik preusmerava na glavnu stranicu aplikacije.
        Na liniji 33. ako korisnik ne upise tacan password ispisuje se poruka da je password netacan.
        A na liniji 36 ako korisnik pogresi u kucanju email adrese, ispisuje se poruka da korisnik za tom adreson
        ne postoji.

    b.)registrationUser.php
        Na pocetku fajla se ucitava fajl sa konekcijom sa bazo podataka.
        Zatim slede provere da li korisnik prosledio sve podatke u zadata input polja. Ako nije ispisace se
        odredjena poruka, posle koje on mora da ih unese kako bi se registrovao.
        Na liniji 21. slede podaci koji se prosledjuju preko forme, a na kraju se vrsi kriptovanje lozinke.
        Zatim sledi upit u bazu podatka, ako vec neki korisnik postoji sa tom email adresom, ispisuje se poruka da je taj
        email vec iskoristen.
        Ako ova provera prodje uspesno i nema nikog sa tom email adresom u bazi podataka, sledi upis u bazu i
        registracija korisnka.
        Na liniji 43. je startovanje sesije za novog korisnika.
        Na liniji 49 posle uspesne registracije korisnik je preusmeren na glavnu stranicu aplikacije.

    c.)taskController.php //
        **** TREBA UNETI IZMENE, JER SE MNOGO FAJLOVA DO SADA OBRISALO JER SE PRESLO NA OOP ****

        Na pocetku koda se nalazi konekcija sa bazom podataka. Zatim se startuje ili obnvlja sesija u zavisnosti da se korisnik
        registruje ili ponovo prijavljuje.
        Na linije 7 se proverava da li je posalti zahtev HTTP POST, ako jeste onda se kod izvrsava dalje.
        Uzima se upisan task iz input polja, uzima se dalje i korisnik id iz sesije i cuva se u sesiji na serveru.
        zatim sledi upisivanje taska u bazu podataka, unosi se korisnikov id i task koji je uneo.
        ID korisnka se unosi radi kasnije lakseg izvlacenja zadataka iz baze kada se on ponovo prijavi na aplikaciju.
        I posle toga sledi osvezenje stranice i dodavanje novog taska na ekran.

    d.)deleteTask.php
        Na poectku se vrsi konekcija za bazom podataka.
        Na linij 5 je postavljen uslov ako sesija nije startovana da se pokrene.
        Zatim na linij 9 je postavljen uslov preko $_GET metode, da ako korisnik klikne na slicicu za brisanje taska
        da se task obrise za displeja i iz baze podatka. Korisniku izlazi pop-up da li je siguran da li zeli da obrise taj
        task.
        I zatim se osvezava stranica.

    e.)updateTask.php
        Na pocetku se vrsi konekcija sa bazom podataka.
        Na liniji 5 je postavljen uslov da li su zadati uslovi postavljeni, ako jesu nastavlja se sa izvrsavanjem koda.
        Zatim sledi azuriranje podataka kada korisnik klikne na slicicu za editovanje taska na glavnoj stranici aplikacije.
        Nakon toga stranica se osvezava i kod se tu zaustavlja sa izvrsavanjem.


*** VIEWS ***
    a.) content.php
        U prvom delu koda se nalazi oho logika za dohavtanje taskova za odredjenog korisnika
        Prvo su ukljuceni svi fajlovi koji odraduju odredjenu logiku na stranici, update, delete, itd.
        Zatim sledi uzimanje id korisnika iz sesije, zatim sledi upit u bazu da se izlistaju svi taskovi tog korisnika
        se ulogovao.
        U fajlu greetings.php se nalazi sesija koja pamti korisnika i ispisuje njegovo ime posto se registruje ili uloguje.
        nakon toga slede html tagovi sa elemtima koje sadrzi stranica.
        N liniji 36 samo koristio petlju za izlistavanje taskova iz baze podataka.
        Na liniji 43 se nalazi javascript kod koji koristi za brisanje taska, kada korisnik klikne na ikonicu za brisanje taska,
        izaje pop-up koji pita korisnika da li je siguran da li zeli da obrise task, nakon pritiska na dugme OK task se brise
        iz sa ekrana i iz baze podataka. Na dugme CANCEL se nista ne dogadja, samo se pop-up zativori.
        Zatim sledi deo koda koji je zaduzen za editovanje taksa, gde kada korisnik klikne na ikonuiicu za edit, pojavi se
        sakrivena forma u koju korisk ukuca izmene taska i one ostaju sacuuvane i na ekranu i u bazi podataka.
        Na liniji 60 je zatvorena petlja i kod nastavlja dalje sa radom u koji su ukljuceni ostali fajlovi.

    a.1) greetings.php
        Na pocetku fajla je uklljucena klasa User radi dohvatanja podataka i metoda u ovom fajlu. Zatim se izvrasavca insanciranje
        klase Database, zatim klase User, koji proseledjuje objekat klase Database i $firstName, zatim se rezultati vezani za
        fisrtName dohvataju iz baze podataka prko metode getFirstName(); i spremaju se u sesiju. I nakon toga se ispisuje poruka
        dobrodoslice.
    a.2) loginController.php

    a.3) class/User
        U konstruktoru klase User je prosledjen i drugi argument koji j eopcioni a to je $firstName = ''; i on ne zahteva
        obaevzno instanciranje.


*** JS ***
    a.)deleteTask.js
        Ovaj fajl koristi za potvrddu brisanja taksa sa ekrana i iz baze podataka.
        Funkcija confirmDelte ime jedan parametar taskId koji pretstavlja indikator za task koji treba da bude obrisan.
        Zatim sledi pitanje za korisnika da li zeli da obrise zadatak, ako pritisne OK bice true, tj zadatak ce da bude
        obrisan, ako pritisne CANCEL zadatak ce ostati tu gde jeste.
    b.)updateTask.php
        Ovaj fajl se definise dve funckije koje se koriste za prikazivanje i skrivanje forme za uredjivanje zadatka na
        osnovu ID zadatka.
        funkcija showEditForm(taskId) koristi se za prikazivanje forme kada se klikne na ikonicu za uredjivanje zadatka.
        funcija cancelEdit(tasdkId) se koristi za skrivanje forme za uredjenje zadatka na osnocu ID zadatka.
        Funckija showEditTask() je aktivira kada korisnik pritisne ikonicu za editovanje taska, a druga funckija se poziva
        kada korisnik posto se predomisli da izmeni zadatak u toj formi pritisne dugme CANCEL.
    c.) content.php
        Na liniji koda 40 pocinje deo koji je vezan za javascript kod koji se nalazi na od 50-te linije koda.
        U input za checkbox je postavljen id sa kojim ce da se manipulise u javascript kodu.
        Na liniji 50 poceinje javascript kod.
        Na prvom mestu senalazi promenljiva checkbox koji cuva podataka preko id.
        Funckija finishTask(); u sebi sadrzi uslov IF koji proverava da li je chockbox oznacen ili ne.
        XMLHttpRequest(); ovo kreira novi request objekat koji omogucava slanje HTTP zahteva na server asinhrono(bez osvezavanja cele stranice)
        xhr.open() postavlja HTTP metodu (POST), URL koji ce poslati zahtev (complete_)task.php)  i true za asinhrono slanje.
        xhr.setrequestHeader() Postavlja zaglavlje HTTP zahteva koji govori serveru kako inteerpretirati podatke koje saljete
        Koristi se "application/x-www-form-urlencoded" sto je cesto koristeni tip za slanje html formi.
        xhr.send() salje podatak na server. U ovom primeru, salje se podataak, tj tak koji je oznacen po svoj ID iz baze podataka.
        window.location.href, ova linija koda preusmerava korisnka na drugfu stranicu gde se prikazuju i skladiste izrseni taskovi.
        Ovaj kod koristi javascript i AJAX kako bi se asinhrono poslali podaci na server kada korisnik oznaci checkbox,
        a zatim preusmerava korisnka na drugu stranicu.


*** OOP ***
        a.) Napravljene su klase Database i User koje ce da sluze radi, prijavljivanja i registrovanja korisnika na
        aplikaciju. U klasi Database je napravljena konekcija ka bazi a u fajlu config.php su date vredsnoti preko kojih
        se konektujemo na bazu. U klasi User koristimo $sql public varijablu iz klase Database, koja u sebi sadrzi konekciju
        sa bazom podataka. Neophodno je pre svega da se u klasi User, ukljuci fajl Database.php preko require_once, a zatim
        i da korisnik nasledi klasu Database, kako bi mogao da koristi njene atrubute u ovom slucaju $sql, tj konekciju
        sa bazom podataka.
        Kada se klasa nasledi, u ovom slucaju to stoji ovako "class User extends Database{}", i sada klasa User ima
        pristup toj varijabli za konekciju sa bazom podataka.


*** Javascipt ***

        Sutra uraditi proveru koda koji sam sa Bolicem radio, pre svega javascript i sve izmene koje smo dodali, da se 
        u potpunosti razumeju. Posle toga, uraditi checkbox logiku i front aplikacije. Pa zatim se prelazi na LARAVEL. 
        U Laravel se kasnije prebacuje cela aplikacija, i jos projekata. 
        Pa nek je sa srecom!!!...!!!...!!!...!!!...!!!<<<>>>


        ostalo je da se uradi da kada korisnik klikne na cekbox, izadje alert (to se i dogadja, samo sadda treba da kada korisnik
        klinke na OK da se taj isti task prebaci na comleted_task.php. Ostalo je to da se uradi da se sredi i ne znam sta jos!!!
        Neke stvari su se sad odradile samo mora da se sedne da se shvati sta tacno dogadja sa AJAX zahtevima i kako oni funkcionisu
        I onda ostaje da se sredi malo front preko CSS, i onda napokon Laravel, valjda, nadam se!!!

