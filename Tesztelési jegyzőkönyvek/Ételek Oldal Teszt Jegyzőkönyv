# **Ételek Oldal Teszt Jegyzőkönyv**

_Tesztelést végezte:_ Dénes Attila

_Dátum:_ 2024.01.19.

Tesztelési környezet _Operációs rendszer:_ Windows 10 _Böngésző:_ Firefox

Tesztelendő rendszer \*Rendszer neve:\*ByteMe ételrendelő alkalmazás _Rendszer verziója:_ v1.0.0

_Talált hibák száma:_ 0

# **Funkcionális tesztek**

**Étel Hozzáadása Teszt**

### Cél

A teszt célja a weboldal ételek hozzáadási funkciójának ellenőrzése és annak megbizonyosodása, hogy az ételek sikeresen hozzáadódnak az adatbázishoz.

### Előfeltételek

- A weboldal elérhető és bejelentkezve vagyunk az admin felhasználóval.
- Van legalább egy aktív kategória az adatbázisban, amit hozzá lehet rendelni az ételhez.

### Teszt Lépései

1. Böngésző megnyitása és ellátogatás a weblap "Étel hozzáadása" oldalára.
2. Kattintás a "Tovább" gombra a cím mellett.
3. A cím "Étel hozzáadása" szerepel-e a fejlécben.
4. Az alábbi mezők kitöltése:
  - Név: "Teszt Étel"
  - Leírás: "Ez egy teszt étel."
  - Ár: 10 (vagy egy másik érték, amit kiválasztasz)
  - Kategória: Válassz egy meglévő, aktív kategóriát a legördülő listából.
  - Ikon kiválasztása: Válassz egy képfájlt a gépedről.
  - Top termék: Jelöld meg az "Igen" opciót.
  - Van-e készleten: Jelöld meg az "Igen" opciót.
5. "Étel hozzáadása" gombra kattintás, az étel hozzáadásának indul.
6. Az oldalon megjelenő üzeneteket. Elvárt üzenetek:
  - "Étel sikeresen hozzáadva" (ha az étel hozzáadása sikeres volt).
  - "Étel hozzáadása nem sikerült" (ha az étel hozzáadása nem sikerült).
7. "Ételek kezelése" oldalra kattintás
8. Tesztétel megjelenésének ellenőrzése

### Eredmények

- Az étel hozzáadása során a weboldal visszajelzi, hogy a művelet sikeres volt vagy sem.
- A teszt étel megjelenik az ételek listájában a "Ételek kezelése" oldalon.

**Étel Frissítése Teszt**

A teszt célja a weboldal ételek frissítési funkciójának ellenőrzése és annak megbizonyosodása, hogy az ételek sikeresen frissülnek az adatbázisban.

### Előfeltételek

- A weboldal elérhető és bejelentkezve vagyunk az admin felhasználóval.
- Legalább egy étel létezik az adatbázisban, amit szeretnénk frissíteni.

### Teszt Lépései

1. Ellátogatás az oldal "Étel frissítése" oldalára.
2. Kattintás a "Tovább" gombra a cím mellett.
3. "Étel frissítése" szerepel a fejlécben.
4. A teszt étel adatai (név, leírás, ár stb.) megjelennek-e a megfelelő mezőkben a frissítési űrlapon.
5. A teszt étel adatainak módosítása (pl. az étel nevét vagy az árát).
6. Az "Étel frissítése" gombra kattintva az étel frissítésének indítása
7. Megjelenő üzeneteket. Elvárt üzenetek:
  - "Sikeres frissítés" (ha az étel frissítése sikeres volt).
  - "Sikertelen frissítés" (ha az étel frissítése nem sikerült).
8. "Ételek kezelése" oldal megtekintése..
9. A teszt étel adatai (pl. az ára) megfelelően frissültek az ételek listájában.

### Elvárt Eredmények

- Az étel frissítése során a weboldal visszajelzi, hogy a művelet sikeres volt vagy sem.
- A teszt étel adatai megfelelően frissülnek az ételek listájában.

**Étel Törlése Teszt**

A teszt célja a weboldal ételek törlési funkciójának ellenőrzése és annak megbizonyosodása, hogy az étel sikeresen törlődik az adatbázisból.

### Előfeltételek

- A weboldal elérhető és bejelentkezve vagyunk az admin felhasználóval.
- Legalább egy étel létezik az adatbázisban, amit szeretnénk törölni.

### Teszt Lépései

1. Böngésző megnyitása, és ellátogatás a weboldal "Étel törlése" oldalára.
2. Kattintás a "Tovább" gombra a cím mellett.
3. A cím "Étel törlése" szerepel a fejlécben.
4. A teszt étel adatai (név, leírás, ár stb.) megjelennek-e a megfelelő mezőkben a törlési űrlapon.
5. Az "Étel törlése" gombra kattintás, az étel törlésének indításához.
6. Az oldalon megjelenő üzeneteket. Elvárt üzenetek:
  - "Sikeres törlés" (ha az étel törlése sikeres volt).
  - "Sikertelen törlés" (ha az étel törlése nem sikerült).
7. A weboldal "Ételek kezelése" oldalának ellenőrzése
8. Annak megtekintése, hogy a teszt étel törlődött-e az ételek listájából.

### Elvárt Eredmények

- Az étel törlése során a weboldal visszajelzi, hogy a művelet sikeres volt vagy sem.
- A teszt étel nem szerepel az ételek listájában a törlés után.
