seminarverwaltung
=================

Contao Seminarverwaltung

Verwaltung von Seminardaten mit Terminen, Buchungsanfragen und Kundenadressen.

Die Seminare werden je Kategorie angelegt und können auch ohne Terminzuweisung in Listen angezeigt werden.
Steuerbar via verfügbare Plätze und Buchungs-Zeitfenster kann das Buchungsformular ein und aus gestellt werden.
Die eingehenden Buchungen werden automatisch hochgezählt. 

Verschiedene Templates ermöglichen unterschiedliche Auswertungen der Seminare und Termine. 
Ein mitgeliefertes Contao-Theme zeigt verschiedene Spielarten, wie die Daten ausgegeben werden können.

Nicht benötigte Datenfelder können über DCA-Paletten ausgeblendet werden.
Buchungen versenden E-Mails an den Buchenden und den Seminarveranstalter, wobei hier Seminarspezifisch eine 
eigene E-Mailadresse angegeben werden kann.

weiteres siehe unter den FAQ's unter http://www-contao-seminarverwaltung.de/faq.html


Version 1.3.0 beta
-------------

BETA
----
Die Beta-Version ist nicht für den produktiven Einsatz vorgesehen.
Deshalb gilt: diese in einer separaten Testumgebung installieren und testen.
Überprüfen Sie ihre Templates. Wenn Sie Standardtemplates unverändert genutzt haben, dann sollten Sie diese sichern und ggf. im Templates-Ordner wieder anlegen, falls die Änderungen der neuen Version nicht ganz in Ihrem Sinne sein sollten.
Wichtigste Änderungen: Buchungsformular und die ContentElemente und in den Templates wurden überflüssige Indexer-Anweisungen entfernt (Suche)
----


13-03-2015

T E M P L A T E S
CHANGE
• Sämtliche Templates wurden überarbeitet und feste Texte durch Sprachvariablen ersetzt

BUGFIX
• In sv_evt_listshort wurden die Fehlerhaften Variablen zu freien Plätzen und Datum (von..bis) behoben.
• Überflüssige <!-- indexer::... --> Anweisungen wurden entfernt, damit die Suchfunktion auch alle Seminar/EVentdaten finden kann.



B U C H U N G S F O R M U LA R
CHANGE
• Die Templates sv_seminarbooking_single, sv_seminarbooking_choice entfallen; können aber durchaus weiter benutzt werden, sofern in Benutzung.
• Das Standardformular wurde wieder in der alten Form hergestellt und ergänzt (Firma, Abweichende Rechnungsadresse).
• Das Standard-Template heisst jetzt sv_seminarbooking_default
• Zum allgemeinen Datenblock Inserttag {{sv::data}} wurden die generierten HTML-Tags geändert, um eine bessere Formatierung zu ermöglichen:
<div class=""><span class=""></span> <span class=""></span></div>
Es werden hier keine Daten mehr ergänzt, da dieses Tag obsolet sein wird; es können beliebige Strukturausgaben erzeugt werden, da die Menge der Tags jetzt vollständig ist.

NEU
• Es gib auch die Alternative mit einer Weiterleitung auf eine Bestätigungsseite; hier kann ein Inserttag {{sv::data_booking}} benutzt werden, um die Bestätigungsnachricht aus dem Modul anzuzeigen.
• Die Inserttags wurden vervollständigt, siehe hierzu FAQ/Doku.
• Es ist jetzt auch eine sekundengenaue Prüfung des erlaubten Buchungszeitraumes möglich. Dazu kann eine Variable im Template entsprechend abgefragt werden: <?php if (xxxx): ?>
• Hook für Inserttags
• Inserttags für die Tabellenfelder wurde realisiert und passen sich damit Variabel an die jeweiligen Tabellen an: {{svget::seminar::[feldname]}} und {{svget::event::[feldname]}} ([feldname steht dabei für den eigentlichen Feldnamen]).

BUGFIXES
• Variablen zum Buchungsstatus
• Im Template wurde die Variable $this->bookingstate anstelle von $this->bookstate_class eingesetzt.



L O C A T I O N – R E A D E R
BUGFIX
• Bei gleichzeitigen Event an verschiedenen Orten wurde immer nur eines dargestellt.



S E M I N A R E V E N T S – L I S T E N
BUGFIX
• Bei Wiederholungsterminen wurde das falsche Datum an den Reader/Buchung übergeben.



C O N T E N T E N E L E M T E   S E M I N A R   U N D   S E M I N A R L I S T E N  Z U   K A T E G O R I E N
NEU
•  Sortierbarkeit der Events innerhalb eines Seminars
• Anzeige von Wiederholungsterminen möglich
• Anzeige der Eventdaten auf Basis von Einstellungen, ähnlich wie der Kalender und zugehörige Seminarlisten



B U C H U N G S A N F R A G E N
BUGFIX
• Bei Bearbeitung, Löschen und Neu anlegen werden jetzt die Event-Buchungsdaten mit gepflegt.

------- 

21-10-2014 Bugfix manuelle Buchung im Backend 

------- 

13-10-2014 Bugfix zur Volltextsuche 

------- 

28-05-2014 Bugfix zu Terminkalenderlisten - specials zu seminarevents wurden nicht ausgegeben

+++++++
ACHTUNG! Für alle, die eine ältere Version im Einsatz haben gilt:
• Daten sichern
• In einer Testumgebung prüfen, ob die Templates noch stimmen
• Templates anpassen. Hier sind einige Daten hinzugekommen und teilweise hat sich die Struktur auch leicht verändert
• Modul ModuleSeminarlist_AllCat.php für Ausgabe aller Kategorien entfällt (in Zukunft wird dies anders geregelt)
• Modul ModuleFormularBuchungSingle.php entfällt (es gibt nur noch das neue Modul mit neuem Template)
• Modul ModuleFormularBuchung.php entfällt (es gibt nur noch das neue Modul mit neuem Template)
+++++++


------- 

1.20.0RC1 Build10 - erste Tests mit Contao 3.3
• Bugfix: Neuanlage Seminare mit korrekter Author-ID 

------- 

1.20.0RC1 - diverse Bug-Fixes
• Referentendaten können jetzt komplett ausgewertet werden; den Namen kann mann auch individuell darstellen (Vorname Nachname oder Nachnamen, Vornamen oder ...)
• Ampelfunktion für den Buchungsstatus
• Buchungsformular jetzt besser erweiterbar per DCA-Definition und Hook-Schnittstelle
• Vorbereitung für eine iCal-Schnittstelle (Erprobungsphase)
• Weiterleitungsseite lässt sich auf verschiedenen Ebenen definieren (Kategorie, Seminar, Modul)
[13.03.15 14:03:06] jo schaefer: 13-03-2015

T E M P L A T E S
CHANGE
• Sämtliche Templates wurden überarbeitet und feste Texte durch Sprachvariablen ersetzt

BUGFIX
• In sv_evt_listshort wurden die Fehlerhaften Variablen zu freien Plätzen und Datum (von..bis) behoben.
• Überflüssige <!-- indexer::... --> Anweisungen wurden entfernt, damit die Suchfunktion auch alle Seminar/EVentdaten finden kann.



B U C H U N G S F O R M U LA R
CHANGE
• Die Templates sv_seminarbooking_single, sv_seminarbooking_choice entfallen; können aber durchaus weiter benutzt werden, sofern in Benutzung.
• Das Standardformular wurde wieder in der alten Form hergestellt und ergänzt (Firma, Abweichende Rechnungsadresse).
• Das Standard-Template heisst jetzt sv_seminarbooking_default
• Zum allgemeinen Datenblock Inserttag {{sv::data}} wurden die generierten HTML-Tags geändert, um eine bessere Formatierung zu ermöglichen:
<div class=""><span class=""></span> <span class=""></span></div>
Es werden hier keine Daten mehr ergänzt, da dieses Tag obsolet sein wird; es können beliebige Strukturausgaben erzeugt werden, da die Menge der Tags jetzt vollständig ist.

NEU
• Es gib auch die Alternative mit einer Weiterleitung auf eine Bestätigungsseite; hier kann ein Inserttag {{sv::data_booking}} benutzt werden, um die Bestätigungsnachricht aus dem Modul anzuzeigen.
• Die Inserttags wurden vervollständigt, siehe hierzu FAQ/Doku.
• Es ist jetzt auch eine sekundengenaue Prüfung des erlaubten Buchungszeitraumes möglich. Dazu kann eine Variable im Template entsprechend abgefragt werden: <?php if (xxxx): ?>
• Hook für Inserttags
• Inserttags für die Tabellenfelder wurde realisiert und passen sich damit Variabel an die jeweiligen Tabellen an: {{svget::seminar::[feldname]}} und {{svget::event::[feldname]}} ([feldname steht dabei für den eigentlichen Feldnamen]).

BUGFIXES
• Variablen zum Buchungsstatus
• Im Template wurde die Variable $this->bookingstate anstelle von $this->bookstate_class eingesetzt.



L O C A T I O N – R E A D E R
BUGFIX
• Bei gleichzeitigen Event an verschiedenen Orten wurde immer nur eines dargestellt.



S E M I N A R E V E N T S – L I S T E N
BUGFIX
• Bei Wiederholungsterminen wurde das falsche Datum an den Reader/Buchung übergeben.



C O N T E N T E N E L E M T E   S E M I N A R   U N D   S E M I N A R L I S T E N   Z U   K A T E G O R I E N
NEU
•  Sortierbarkeit der Events innerhalb eines Seminars
• Anzeige von Wiederholungsterminen möglich
• Anzeige der Eventdaten auf Basis von Einstellungen, ähnlich wie der Kalender und zugehörige Seminarlisten



B U C H U N G S A N F R A G E N
BUGFIX
• Bei Bearbeitung, Löschen und Neu anlegen werden jetzt die Event-Buchungsdaten mit gepflegt.

------- 

21-10-2014 Bugfix manuelle Buchung im Backend 

------- 

13-10-2014 Bugfix zur Volltextsuche 

------- 

28-05-2014 Bugfix zu Terminkalenderlisten - specials zu seminarevents wurden nicht ausgegeben

+++++++
ACHTUNG! Für alle, die eine ältere Version im Einsatz haben gilt:
• Daten sichern
• In einer Testumgebung prüfen, ob die Templates noch stimmen
• Templates anpassen. Hier sind einige Daten hinzugekommen und teilweise hat sich die Struktur auch leicht verändert
• Modul ModuleSeminarlist_AllCat.php für Ausgabe aller Kategorien entfällt (in Zukunft wird dies anders geregelt)
• Modul ModuleFormularBuchungSingle.php entfällt (es gibt nur noch das neue Modul mit neuem Template)
• Modul ModuleFormularBuchung.php entfällt (es gibt nur noch das neue Modul mit neuem Template)
+++++++


------- 

1.20.0RC1 Build10 - erste Tests mit Contao 3.3
• Bugfix: Neuanlage Seminare mit korrekter Author-ID 

------- 

1.20.0RC1 - diverse Bug-Fixes
• Referentendaten können jetzt komplett ausgewertet werden; den Namen kann mann auch individuell darstellen (Vorname Nachname oder Nachnamen, Vornamen oder ...)
• Ampelfunktion für den Buchungsstatus
• Buchungsformular jetzt besser erweiterbar per DCA-Definition und Hook-Schnittstelle
• Vorbereitung für eine iCal-Schnittstelle (Erprobungsphase)
• Weiterleitungsseite lässt sich auf verschiedenen Ebenen definieren (Kategorie, Seminar, Modul)

