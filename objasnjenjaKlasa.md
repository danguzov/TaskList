## Objasnjenje Klasa

### A.) TaskController.php

#### 1.getAllTasks() metoda: 
 Kreira novi objekat klase Task poziva metodu getTasks(), i nad tim objektom vraca rezultat. 
 Metoda getTasks() vraca listu svih zadataka, koji su vezani za prijavljenog korisnika.

#### 2.renderTaskRow($task) metoda: 
Generise HTML red u tabeli  za zadati task($task). Uzima $task kao ulazni argument
i koristi ga za generisanje HTML-a za prikazivanje zadataka u tabeli. Takodje, ova metoda ima dodatne elemente poput 
checkboxa za ozncavanje zadataka kao izvesene, forme za uredjivanje zadataka, prikaz datuma i vremena zadataka i 
slicice za uredjivanje i brisanje zadataka. 

#### 3.rendertaskTable($tasks) metoda: 
Ova metoda generise HTML kod za prikazivanje kompletne tabele sa zadacima. 
Prihvata niz $tasks kao ulazni argument i prolazi kroz svaki zadatak u nizu pozivajuci rendertaskRow() za svaki zadatak.
Na kraju dodaje zatvarajuci tag za tabelu. Ovaj HTML se rvaca kao rezultat. 

#### 4. HTML heredoc stringovi:
Kod koristi heredoc stringove <<<HTML za generisanje HTML koda unutar PHP. 
Heredoc stringovi omogucavaju multi-line stringove sa minimalnim znacima za escape. 



