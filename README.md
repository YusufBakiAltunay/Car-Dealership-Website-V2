# 🚗 Car Dealership Website V2 - Laravel Project

Welkom bij de vernieuwde versie van het CarDealership project! Deze applicatie is gebouwd met het Laravel framework en biedt een volledige oplossing voor autodealers. Volg de onderstaande instructies om de website succesvol op jouw eigen computer te installeren en uit te voeren.

## Vereisten en Installatie

Om dit project te draaien, moet je ervoor zorgen dat je **PHP 8.x**, **Composer**, **Node.js & NPM** en een **MySQL-server** op je systeem hebt geïnstalleerd. Zodra je omgeving klaar is, voer je de volgende stappen uit:

Begin met het klonen van deze repository naar je lokale machine met het commando:
`git clone https://github.com/YusufBakiAltunay/Car-Dealership-Website-V2.git`. 

Ga daarna naar de projectmap via de terminal en installeer alle benodigde pakketten door achtereenvolgens `composer install` en `npm install` uit te voeren. Voor de configuratie van de applicatie maak je een kopie van het voorbeeldbestand met `cp .env.example .env`. Open dit nieuwe `.env` bestand in je editor en vul je eigen databasegegevens in bij de regels `DB_DATABASE`, `DB_USERNAME` en `DB_PASSWORD`. Let op: omdat dit project gebruikmaakt van database-gestuurde sessies, is een werkende databaseverbinding essentieel.

Na de configuratie moet je een unieke applicatiesleutel genereren met `php artisan key:generate`. Maak vervolgens de benodigde databasetabellen aan door het commando `php artisan migrate` uit te voeren. Als laatste stap kun je de applicatie opstarten: gebruik `npm run dev` om de frontend assets te compileren en start de lokale server met `php artisan serve`. De website is daarna direct bereikbaar via `http://127.0.0.1:8000`.
