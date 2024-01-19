# Funkcionális teszt jegyzőkönyv
**Tesztelő neve:** Nagy János <br>
**Tesztelés dátuma:** 2024.01.19
## Tesztelendő rendszer
**Rendszer neve:** ByteMe ételrendelő alkalmazás <br>
**Rendszer verziója:** v1.0.0
## Tesztelési cél
A teszt célja a ByteMe ételrendelő alkalmazás alapvető funkcióinak ellenőrzése.
## Tesztelési környezet
**Operációs rendszer:** Windows, macOS, Linux<br>
**Böngészők:** Chrome, Firefox, Safari<br>
**Mobil eszközök:** iOS, Android
# Funkcionális tesztek
## Bejelentkezés
**Cél:** Ellenőrizni, hogy a felhasználók sikeresen be tudnak-e jelentkezni.<br>
**Lépések:**

1. Weboldal megnyitása
2. Kattintson a "Bejelentkezés" gombra
3. Adja meg a helyes felhasználónevet és jelszót
4. Kattintson a bejelentkezés gombra

**Teszt eredménye:** Sikeres

## Kijelentkezés
**Cél:** Ellenőrizni, hogy a bejelentkezett felhasználók sikeresen ki tudnak-e jelentkezni.<br>
**Lépések:**

1. Lépjen be a rendszerbe
2. Kattintson a "Kijelentkezés" gombra

**Teszt eredménye:** Sikeres, a munkamenet megszűnik és az oldal átirányít a bejelentkezés oldalra.

## Keresés
**Cél:** Ellenőrizni, hogy a felhasználók tudnak-e keresni az ételek között.<br>
**Lépések:**

1. Lépjen be a rendszerbe
2. Írja be a keresendő étel nevét a keresőmezőbe
3. Kattintson a "Keresés" gombra

**Teszt eredménye:** A keresési eredmények megjelenítése.

## Ételrendelés
**Cél:** Tesztelni az ételrendelési folyamatot.<br>
**Lépések:**

1. Lépjen be a rendszerbe
2. Adjon hozzá egy ételt a kosárhoz
3. Nyissa meg a kosarat
4. Ellenőrizze az adatokat
5. Kattintson a "Megrendelés" gombra

**Teszt eredménye:** A rendszer visszaigazolást ad az ételrendelés sikeres leadásáról.
