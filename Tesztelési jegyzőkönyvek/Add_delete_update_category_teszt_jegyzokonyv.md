# Ételkategória-kezelési felület tesztje


*Tesztelést végezte:* Olajos Máté
*Dátum:* 2024.01.20.

##Tesztelési környezet
*Operációs rendszer:* Windows 10 22H2, Ubuntu 22.04.3, Android 13 
*Böngésző:* Brave Brorser v1.61.120, Microsoft Edge v120.0.2210.144, Mozilla Firefox 116.0.2


##Tesztelendő rendszer
*Rendszer neve:*ByteMe ételrendelő alkalmazás
*Rendszer verziója:* v1.0.0
 
*Talált hibák száma:* 3

# FUNKCIONÁLIS TESZTEK

### Admin bejelentkezés tesztelése:
**Cél:** A megfelelő bejelentkezési adatok birtokában a felhasználó képes legyen bejelentkezni az admin felületre, ellenkező esetben a belépés kerüljön megtagadásra.

**Lépések:**
- “Admin login” menüpontra kattintva betöltődik az admin bejelentkezés oldal.
- Mind a felhasználónév, mind a jelszó mező képes fogadni mindenféle karaktert.
- A jelszó mező kitöltésekor "●" karakterek jelennek meg, biztonságosabbá téve a bejelentkezést.
- Adatok meg nem adása, ill. hibás adatok megadása esetén is “Sikertelen bejelentkezés” hibaüzenet olvasható.
- Helyes adatok megadása esetén belépünk az admin felületre. Az admin oldalon “Sikeres bejelentkezés” üzenet jelenik meg, a böngésző felajánlja a bejelentkezési adatok tárolását.

**Teszt eredménye:** Sikeres

### Ételkategória-kezelési felület elérése:
**Cél:** A bejelentekezett admin képes legyen elérni az ételkategória-kezelési felületet, ahol aztán lehetősége nyílik a felvett kategóriák áttekintésére, szerkesztésére és törlésére, ill. új kategóriák felvételére. 

**Lépések:**
- Az “Admin irányító” felület navigációs sávjában elérhető a "Kategóriák" menüpont, erre kattintva betöltődik a "Kategória hozzáadása" felület.
- Az felület címe "Kategória hozzáadása"; mivel ezen a felületen nem csak felvenni tudunk új kategóriákat, hanem lehetőség van kategóriákat szerkeszteni és törölni is, szerencsésebb megoldás lenne például a "Kategóriák kezelése" címsor. Ezt hibaként jelölöm meg: HIBA
- A felületen megjelennek az előzőleg felvett ételkategóriák és azok tulajdonságai (ID, név, ikon, top termék, van-e készleten, szerkesztés)

**Teszt eredménye:** Sikeres

### Ételkategória hozzáadásának tesztelése:
**Cél:** Tesztelni, hogy megjelenik-e meg az új kategória hozzáadására szolgáló felület és azon a megfelelő adatokat megadva új ételkategóriát tudjunk felvenni.

**Lépések:**
- A “Kategória hozzáadása” gombra kattintva megjelenik az “Add” felület, az “Kategória beviteli” mezővel, “Ikon kiválasztása” és feltöltése lehetőséggel, “Top termék” és “Van-e készleten” igen/nem választóval.
- Az új elem hozzáadása megtörtént. Kép feltöltése működött.
- A "Fájl kiválasztása" funkció lehetővé teszi nem kép formátumú fájlok feltöltését, ami hibaként fogható fel. HIBA
- A "Kategória hozzáadása" gombra kattintva visszajutunk a "Kategória hozzáadása" felületre, aminek bal felső sarkában a "Kategória sikeresen hozzáadva" üzenet jelenik meg.

**Teszt eredménye:** Sikeres, a fájlfeltöltési procedúra finomítása után teljes értékű funkcionalitást kapunk.

### Ételkategória szerkesztésének tesztelése:
**Cél:** Tesztelni, hogy a "Szerkesztés" gombra kattintva megjelenik-e meg a kategória szerkesztésére szolgáló felület és azon a megfelelő adatokat megadva frissíteni tudjuk a már felvett ételkategóriát.

**Lépések:**
- A "Szerkesztés" menüpontra kattintva a “Kategória szerkesztése” felület jelenik meg.
- “Étel hozzáadása” gombra kattintva betölt az oldal. 
- A “Név” mezőt üresen hagyva és nem kép típusú fájlt feltöltve, majd a "Kategória frissítése" gombra kattintva a változások mentődnek és visszakerülünk az előző oldalra. A frissített kategória megjelenik a listában a “Név” oszlopban üres értékkel, valamint az "Ikon" helyén egy 'placeholder' szimbólummal. HIBA
- A "Név" mezőt kitöltve és képfájlt feltöltve sikeresen lezajlik a frissítés, visszajutunk az előző képernyőre, a bal felső sarokban megjelenik a “Sikeres frissítés” üzenet.

**Teszt eredménye:** Sikeres, a fájlfeltöltési procedúra finomítása után teljes értékű funkcionalitást kapunk.

### Ételkategória törlésének tesztelése:
**Cél:** Tesztelni, hogy a "Törlés" gombra kattintva eltávolítható-e meg a választott ételkategória

**Lépések:**
- Az törölni kívánt étel melletti “Törlés” gombra kattintva az elem eltávolításra kerül, a bal felső sarokban megjelenik a “Sikeres törlés” üzenet.

