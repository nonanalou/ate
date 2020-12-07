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

Als Session Speicher wird die Datenbank verwendet. Der Nutzer kann seine Aktiven Sessions auf der Profile
Einstellungsseite sehen.

#### Session Regenrating

Da wir den Laravel Starter verwenden wurde bereits eine [Middleware Registriert](https://laravel.com/docs/8.x/session#regenerating-the-session-id),
welche die Session nach dem Login neu generiert.

### Absicherung Standardangriffe

## Errorhandling, Logging

## Eigenes Kriterium

### CSRF

Laravel bietet bereits [CSRF Protection](https://laravel.com/docs/8.x/csrf#csrf-introduction).
Jeder HTTP POST request auf eine Route die Teil der `web` Middleware Gruppe ist wird von der
`VerifyCsrfToken` middleware überprüft und auf ein Vorhandenes CSRF-Token getestet.

Die Middleware kümmert sich auch darum, dass Ajax Requests ein gültiges XSRF Cookie mit senden.
