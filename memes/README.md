# PHP-Übung

Sie benötigen eine geeignete Ausführungsumgebung für die PHP-Skripte.

## Webserver mit PHP

Damit das Beispiel ausgeführt werden kann, ist ein Webserver mit PHP-Ausführungsumgebung notwendig. Der Webserver nimmt die HTTP-basierten Anfragen entgegen und muss entscheiden, ob die Anfrage an die entsprechende Ausführungsumgebung weitergereicht wird oder nicht - zum Beispiel anhand der Endung der angeforderten Ressource.

Eine einfache Möglichkeit ist die Installation der [XAMPP-Umgebung](https://www.apachefriends.org/de/index.html). Diese Umfasst für verschiedene Betriebssysteme (**X**) einen Apache-Webserver (**A**), eine MariaDB als Datenbank (**M**) und die Ausführungsumgebungen für PHP (**P**) sowie Perl (**P**). Installieren Sie sich diese Umgebung und starten Sie XAMPP. Legen Sie die Beispiel-Dateien dieser Übung in den entsprechenden Ordner und öffnen Sie im Browser die Seite (i.R. http://localhost/).

## Docker / Docker-Compose

Alternativ finden Sie im Beispiel eine Möglichkeit die Übung mittels Docker zu starten. Docker definiert ein Format für Anwendungen und eine Möglichkeit diese Container auszuführen. Hierfür ist die Installation des [Docker-Desktop](https://www.docker.com/products/docker-desktop) notwendig. Anschließend können Sie in einer Kommandozeile in den Ordner des Beispiels navigieren und mittels `docker-compose up` einen Webserver mit PHP-Ausführungsumgebung starten - was genau gestartet wird beschreibt in diesem Fall die `docker-compose.yml` in diesem Beispiel. Öffne anschließend `http://localhost:8080`.