# Projekt Dokumentation Ate

## Sicherheit

In diesem Projekt stützen wir uns zu einem grossen Teil auf die
Sicherheitsfunktionen des Laravel Frameworks und dessen Ökosystems.

### Sicheres Sessionhandling

#### Login

Die Login Routen werden von dem Laravel Security Framework [Fortify](https://github.com/laravel/fortify)
bereitgestellt.

Fortify überprüft bei verschieden Requests (Register, Password Reste, Password Change)
das Passwort auf ein Set an Validierungs-Regeln. Diese Regeln liegen in Form einer
Passwort-Klasse vor `Laravel\Fortify\Rules\Password`.

Um Anpassungen an den Regeln zu machen kann einfach von dieser Klasse geerbt werden.
Die gewünschten Anpassungen werden dann durch das Überschreiben von einer protected Instanz-Variablen erreicht.

Alternativ können auf dem Passwortregel-Objekt auch [Methoden](https://jetstream.laravel.com/1.x/features/authentication.html#password-validation-rules) aufgerufen werden die den entsprechenden Wert setzen.
(Fortify wurde als Teil von Laravel Jetstream entwickelt daher gibt es Überschneidungen in der Dokumentation).

#### Session Speicher

Als Speicher für die aktiven Sessions wird die Datenbank verwendet.
Die Sessions werden hier, wenn vorhanden, mit einem Verweiss auf den Nutzer
abgelegt dies erlaubt es dem Nutzer seine aktiven Sessions anzuzeigen.

#### Session Regenrating

Da wir Laravel Fortify verwenden, wird die [Session nach dem Login](https://laravel.com/docs/8.x/session#regenerating-the-session-id)
automatisch neu generiert . Die entsprechend Methode in Laravel Fortify
findet sich [hier](https://github.com/laravel/fortify/blob/1.x/src/Actions/PrepareAuthenticatedSession.php).

### Login rate limiting

Durch Laravel Fortify bekommen wir die Möglichkeit bei den Loginversuchen ein Ratelimiten zu setzen.
Laravel Fortify setzt hier standardmässig auf einen Defaultwert von fünf Versuche pro Minute
für einen Kombination aus Email und IP-Adresse.

Dieses Verhalten kann in `config/fortify.php` Konfiguriert werden.

## Authorization

Für die Authorization verschiedener Aktionen verwenden wir die von Laravel bereitgestellte
Funktionalität der [Gates](https://laravel.com/docs/8.x/authorization#gates)
und [Policies](https://laravel.com/docs/8.x/authorization#creating-policies).

Policies erlauben es und für verschiedene Aktionen des Korrespondierenden Models ein einen
Authorizationcheck zu definieren. Diese Überprüfung kann dann in den Views über die `@can` Funktion
und in den Controllern über `$this->authorize('<action name>', <ModelClass>)` durch geführt werden.

## Absicherung Standardangriffe

### SQL Injections

Wir verwenden in unser Anwendung ausschliesslich Laravel Eloquent Models um mit der Datenbank
zu interagieren.
Diese Verwenden wiederum den Laravel QueryBuilder welcher [intern PDO prepared statements](https://laravel.com/docs/8.x/queries#introduction) verwendet.

Die Funktionalität RAW SQL Queries auszuführen wird von uns nicht verwendet.

## Eingeschränkte DB User

Damit die Laravel Database Migrations angewendet werden können wird für das Aufsetzen
der Anwendung ein DB Nutzer mit den Rechten zum Erstellen von Tabellen benötigt.
Danach kann für den Betrieb ein stärker eingeschränkter Nutzer verwendet werden.

## Errorhandling, Logging

Für das Logging verwenden wir die vom Laravel zur Verfügung stehende Logging-Anbindung.
Wir haben hier die Möglichkeit zwischen verscheiden Logging Treibern auszuwählen.
Standardmässig wird Monlog verwendet.

### Logging von Authentifizierungs- und Registrierungsversuche

Laravel dispatched während der Registrierung und der Authentifizierung des Nutzers
unterschiedliche Events. Die erlaubt es uns über Eventlistener den Login und
Registrierungsprozess zu Loggen ohne dabei den Framework Code verändern zu müssen.

### Logging mit Oberservern

Die Eloquent Models dispatchen für die einzelnen CURD-Aktionen jeweils Events. Für diese Events
kann ein Observer registriert werden der für jedes dieser Events aufgerufen wird.
Wir verwenden die Möglichkeit um die Events genau so wie bei den Login-Events zu loggen. Dies erlaubt
die einfachen CRUD-Änderungen an den Models zu tracken, ohne an jedem Ort wo Änderungen vorgenommen werden dies
explizit hinscheiben zu müssen.

## Eigenes Kriterium

### CSRF

Laravel bietet bereits [CSRF Protection](https://laravel.com/docs/8.x/csrf#csrf-introduction).
Jeder HTTP POST request auf eine Route die Teil der `web` Middleware Gruppe ist wird von der
`VerifyCsrfToken` Middleware überprüft und auf ein vorhandenes CSRF-Token getestet.

Die Middleware kümmert sich auch darum, dass Ajax Requests ein gültiges XSRF Cookie mit senden.

In einem der vorherigen Module, 152, hatten wir uns CSRF eigenständig angeschaut.
Wir hatte hierfür eine simple CSRF Protection geschrieben und eingebaut.

Für dieses Modul verwenden wir die CSRF Protection von Laravel, das Prinzip, wie es implementiert werden kann
und die Notwendigkeit von CSRF Protection ist uns bekannt.

### 2FA
Dadurch, dass wir Laravel Fortify und dem Jetstream in unseren Anwendung verwenden, steht uns 2FA per OTP zur Verfügung.
