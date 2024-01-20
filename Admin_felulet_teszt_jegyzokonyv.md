# ADMIN FELÜLET TESZT JEGYZŐKÖNYV


*Tesztelést végezte:* Jusztin Noémi
*Dátum:* 2024.01.17.

##Tesztelési környezet
*Operációs rendszer:* Windows 11 
*Böngésző:* Google Chrome


##Tesztelendő rendszer
*Rendszer neve:*ByteMe ételrendelő alkalmazás
*Rendszer verziója:* v1.0.0
 
*Talált hibák száma:* 3

# FUNKCIONÁLIS TESZTEK

### Admin belépésének tesztelése:
- “Admin login” menüpontra kattintva az admin bejelentkezés felületre tölt be.
A jelszó mező kitöltése nem történt meg, ebben az esetben “Sikertelen bejelentkezés” hibaüzenet olvasható.
- Hibás adatok megadása esetén is “Sikertelen bejelentkezés” hibaüzenet olvasható.
- Helyes adatok megadása esetén belépünk az admin felületre. “Sikeres bejelentkezés” üzenetet kapunk az admin főoldalon.

### Admin irányító tesztelése:
- Az “Admin” menüpontra kattintva az “Admin irányító” felületre lépünk.
“Admin hozzáadása” gombra kattintva megjelenik 3 beviteli mező, ahol az adatokat lehet megadni: “Teljes név”, “Felhasználónév”, “Jelszó”.
A “Teljes név”-nél számot is írtam a mezőbe. Hibaüzenet nem jelent meg, elfogadta az új admint. Ezt hibaként tüntetem fel. HIBA
- Az újonnan létrehozott admint szerkesztem. A Szerkesztés gombra kattintva a Teljes név, valamint Felhasználónév mezőket tudom módosítani. A Teljes név mezőből eltávolítottam a számjegyet és az Admin szerkesztése gombra kattintva mentésre kerültek a változtatások.
- A létrehozott admint eltávolítom a “Törlés” gombra kattintva.

### Kategória hozzáadásának tesztelése:
- A “Kategória” menüpontra kattintva betöltődik a “Kategória hozzáadása” oldal.
- “Kategória hozzáadása” gombra kattintva megjelenik az “Add” felület, “Kategória beviteli” mezővel, “Ikon kiválasztása” és feltöltése lehetőséggel, “Top termék” és “Van-e készleten” igen/nem választóval.
- Az új elem hozzáadása megtörtént. Kép feltöltése működött.
- A az új elem melletti “Szerkesztés” gombra kattintva, betölt a Kategória hozzáadásához hasonló oldal, de itt látható még az előzőleg feltöltött kép.
- Módosítom a képet, valamint a “Készleten” checkboxot “Nem lehetőségre”. A “Kategória frissítése” gombra kattintva, a módosítások megtörténtek. “Sikeres frissítés” üzenetet kapunk.
- Az újonnan hozzáadott kategóriát törölni szeretném. A “Törlés” gombra kattintva eltűnik az adott kategória és az oldaltól “Sikeres törlés” üzenetet kapunk.

### Étel irányító tesztelése:
- “Étel” menüpontra kattintva az “Étel irányító” oldal tölt be.
- “Étel hozzáadása” gombra kattintva betölt az oldal. 
- A “Név” mezőt üresen hagyom, az “Ár” mezőbe próbálok betűt írni,nem érzékeli, csak számot tudok beleírni.  Majd az “Étel frissítése” gombra kattintva, az étel elmentésre kerül. Megjelenik a listában a “Név” oszlopban üres értékkel. 
- Az újonnan hozzáadott ételt szerkesztem, másik képet töltök fel, a kép cseréje megtörtént. “Sikeres frissítés” üzenetet kapunk.
-Az törölni kívánt étel melletti “Törlés” gombra kattintva az elem eltávolításra kerül.Az oldaltól “Sikeres törlés” üzenetet kapunk.

###Rendelések kezelésének tesztelése:
- Rendelés menüpontra kattintva betölt a “Rendelés kezelése” oldal.
- Az egyik megrendelést szerkesztjük. A “Szerkesztés” menüpontra kattintva elérhetővé válik a felület. 
- A “Mennyiség” mezőbe nem tudok betűt írni, csak számot.
- "Státusz" legördülő lista működik.
- A “Megrendelő neve” mezőbe tudok számot is írni. Ezt hibaként jelölöm. HIBA
- A “Megrendelő email” nem e-mail formátum megadása esetén nem jelez hibát. HIBA
- A “Rendelés frissítése” gombra kattintva, a “Rendelések kezelése” oldal tölt be, “Sikeres frissítés” üzenettel.
“Kijelentkezés” menüpontra kattintva az admin felületről kilépünk. Az admin “Bejelentkezés” oldal tölt be.

