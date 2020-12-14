# Projekt Dokumentation Ate

## Sicherheit

In diesem Projekt stützen wir uns zu einem grossen teil auf die
Sicherheitsfunktionen des Laravel Frameworks und dessen Ökosystems.

### Sicheres Sessionhandling

#### Login

Die Login Routen werden von dem Laravel Security Framework [Fortify](https://github.com/laravel/fortify)
bereitgestellt.

Fortify überprüft bei verschieden Requests (Register, Password Reste, Password Change)
das Passwort auf ein set an Validierungs-Regeln. Diese Regeln liegen in Form einer
Passwort Klasse vor `Laravel\Fortify\Rules\Password`.

Um Anpassungen an den Regeln zu machen kann einfach von dieser Klasse geerbt werden.
Die gewünschten Anpassungen werden dann durch das Überschreiben von Protected Instanz
Variablen erreicht.

Alternativ können auf dem Passwortregel Object auch [Methoden](https://jetstream.laravel.com/1.x/features/authentication.html#password-validation-rules)
aufgerufen werden die den entsprechenden wert Setzen.
(Fortify wurde als teil von Laravel Jetstream entwickelt daher gibt es Überschneidungen in der Dokumentation).

#### Session Speicher

Als Session Speicher wird die Datenbank verwendet. Der Nutzer kann seine
Aktiven Sessions auf der Profile Einstellungsseite sehen.

#### Session Regenrating

Da wir Laravel Fortify wird die [Session nach dem Login](https://laravel.com/docs/8.x/session#regenerating-the-session-id)
neu generiert automatisch neu geniert. Die entsprechend Methode in Laravel Fortify findet sich [hier](https://github.com/laravel/fortify/blob/1.x/src/Actions/PrepareAuthenticatedSession.php)

### Login rate limiting

Durch Laravel Fortify bekommen wir die option Login Versuche zu Rate limiten.
Laravel Fortify setzt hier standardmässig auf einen Default wert von fünf Versuche pro Minute
für einen Kombination aus Email und IP-Adresse.

### Absicherung Standardangriffe

## Errorhandling, Logging

Für das Logging verwenden wir die vom Laravel zur verfügung stehende Logging Anbindung.
Wir haben hier die Möglichkeit zwischen verscheiden Logging Treibern auszuwählen.
Standardmässig wird Monlog verwendet.

### Logging von Authentifizierungs- und Registrierungsversuche

Laravel Dispatched während der Registrierung und der Authentifizierung des Nutzers
unterschiedliche Events. Die erlaubt es uns über Eventlistener den Login und
Registrierungsprozess zu Loggen ohne dabei den Framework Code verändern zu müssen.

## Eigenes Kriterium

### CSRF

Laravel bietet bereits [CSRF Protection](https://laravel.com/docs/8.x/csrf#csrf-introduction).
Jeder HTTP POST request auf eine Route die Teil der `web` Middleware Gruppe ist wird von der
`VerifyCsrfToken` middleware überprüft und auf ein Vorhandenes CSRF-Token getestet.

Die Middleware kümmert sich auch darum, dass Ajax Requests ein gültiges XSRF Cookie mit senden.

In dem vorherigen Modul 152 hatten wir uns CSRF eigenständig angeschaut.
Wir hatte hierfür eine simple CSRF Protection geschrieben und eingebaut.
