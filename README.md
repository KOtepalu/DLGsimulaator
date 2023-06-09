# DLGsimulaator
# DLG sisseastumisintervjuu simulaator

Tegemist on veebibrauseri vahendusel toimiva sisseastumisintervjuu simulaatoriga, kus on võimalik vastata valikvastustega. Iga valitud vastus määrab ka järgneva küsimuse sisu ja iseloomu. Iga vastus annab teatud arvu punkte, mille põhjal antakse sisseastujale intervjuu tulemus - positiivne või negatiivne. 
Antud programm on mõeldud DLG õppekava jaoks, mille eesmärk on ettevalmistada sisseastujaid, andes neile võimaluse erialaga rohkem tutvuda ja mõista, kas see on nende jaoks õige valik.

Projekt valmis Tallinna Ülikoolis, Digitehnoloogiate instituudis informaatika õppekava raames.

## Kasutatud tehnoloogiad

HTML5, CSS3, PHP 7.3, Javascript, Krita 5.1.5, SQL 5.2.0-1.el9, MariaDB 10.5.16, Apache 2.4.

## Projekti autorid

Kristel Kolkanen, Annika Rohtmets, Isabella Pebsen, Karl Otepalu, Aksel Talvoja

## Ekraanipildid (tava ning kuraatori lehest)

![begin](https://github.com/KOtepalu/DLGsimulaator/assets/93727374/7f38ade3-4c89-49fa-986c-c01179f60632)
![form](https://github.com/KOtepalu/DLGsimulaator/assets/93727374/cd9e37c9-a3ca-4a62-9bee-c5326b5fae31)
![start](https://github.com/KOtepalu/DLGsimulaator/assets/93727374/0eea1cac-dde0-4e40-95d9-55dc35634cf4)
![interview](https://github.com/KOtepalu/DLGsimulaator/assets/93727374/280ef8d6-41ff-4aa6-b062-115e8d27889b)
![results](https://github.com/KOtepalu/DLGsimulaator/assets/93727374/247d0370-bc66-4aa7-8cea-d40b3e388136)
![submitname](https://github.com/KOtepalu/DLGsimulaator/assets/93727374/c9aa91b2-0180-4c08-99bd-6d522b09b4bd)
![leaderboard](https://github.com/KOtepalu/DLGsimulaator/assets/93727374/e1475862-f4b9-46b3-bb48-a8d325f69476)
![share](https://github.com/KOtepalu/DLGsimulaator/assets/93727374/6bc9218c-e3e9-45af-a840-94dc9d26b448)
![kuraator](https://github.com/KOtepalu/DLGsimulaator/assets/93727374/e491294a-3e73-45be-ab0c-b41ff06357ef)

## Paigaldusjuhised

1. Veenduge, et PHP, MySQL ja Apache server oleksid korrektselt seadistatud, et tagada nende õige toimimine.
   - Kontrollige, et PHP versioon oleks 7.3.
   - Kontrollige, et MariaDB versioon oleks 10.5.16.
   - Kontrollige, et Apache versioon oleks 2.4.
2. Vajalige failide alla laadimiseks minge GitHubi repositooriumi lehele (https://github.com/KOtepalu/DLGsimulaator). Klõpsake "Code" nuppu ja valige "Download ZIP" võimalus, et allalaadida failid ZIP-vormingus. Pärast allalaadimist ekstrakteerige ZIP-fail oma arvutisse. Leidke vajalik kaust, kuhu soovite failid lisada, ja kopeerige või teisaldage laaditud failid sellesse kausta.
3. Looge oma andmebaasiga ühendus ning kopeerige [SQL-käsud](https://github.com/KOtepalu/DLGsimulaator/blob/main/if22_DLGsimulaator.sql) ja käivitage need oma andmebaasis, et luua tabelid.
4. Looge või muutke config_dlg.php faili. Sinna sisestage oma severi nimi, kasutaja, parool ja andmebaasi nimi. Veenduge, et failide asukoht kattuks githubis oleva paigutusega.

## Litsents

Antud projekt on [MIT litsentsi](https://github.com/KOtepalu/DLGsimulaator/blob/main/LICENSE) all.
