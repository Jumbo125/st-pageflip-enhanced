# 📖 Erweiterung für st_pageflip: Benutzerdefinierte Steuerung und Funktionen

Dieses Plugin erweitert die Bibliothek **st_pageflip** um eine benutzerdefinierte Steuerleiste, Vollbildmodus, Zoomfunktionen, Seitenreflexionen, Mousewheel-Support, Sound-Effekte und viele weitere visuelle Features.

---

## 🔧 Voraussetzungen

- [st_pageflip](https://www.pagedflip.com/)
- jQuery
- Panzoom (für Zoom & Pan)
- Bootstrap Icons (für die Steuerungssymbole)
- Eigene Anpassung an der `st_pageflip`-Quelldatei (siehe unten)

---

## 📂 Dateien & Struktur

```
project-root/
│
├── js/
│   ├── st_pageflip_custom.js       # Deine modifizierte st_pageflip Datei
│   └── page-flip_controll.js       # Dein Plugin-Skript (dieses Repository)
│
├── php/
│   └── request.php                 # Gibt Bild-Dateinamen im angegebenen Ordner zurück
│
├── mp3/
│   └── turn.mp3                    # Blätter-Sound (optional)
│
├── css/
│   └── styles.css                  # Enthält Zusatz-Styles für Steuerung & Effekte
```

---

## 🚀 Einbindung & Nutzung

1. **Binde die Skripte in dein HTML ein**:

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/styles.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/st_pageflip_custom.js"></script>
<script src="js/page-flip_controll.js"></script>
```

2. **HTML-Container definieren**:

```html
<div id="myBook" 
     class="ui-flipbook"
     data-pdf-src="pdfs/example.pdf"
     data-img-src="images/book1"
     data-width="responsive"
     data-din_format="A4"
     data-center-single="true"
     data-mousewheel-scroll="true"
     data-slider="true"
     data-sound="true"
     data-download="true"
     data-fullscreen="true"
     data-reflection="true"
     data-color="#004080"
     data-color-hover="#0099ff">
</div>
```

3. **Initialisierung**:

```javascript
controlls_for_book(
  "#myBook"
);
```

---

## 🔍 Features

- ✅ Zoom (In, Out, Reset & Doppelklick-Zoom)
- ✅ Vollbildmodus inkl. Position Reset & Controls-Umsortierung
- ✅ Seitenreflexion je nach Seitenzahl & Format
- ✅ Seitenzahl & Slider zur Navigation
- ✅ Sound beim Umblättern (optional)
- ✅ Drag & Drop (manuelles Verschieben)
- ✅ Button-Icons via Bootstrap Icons
- ✅ Individuelle Farben via `data-color` & `data-color-hover`
- ✅ Responsives Seitenverhältnis (inkl. DIN-Formate)

---

## 🛠️ Anpassung der st_pageflip Datei

Um alle Features korrekt zu nutzen, ist eine minimale Modifikation der originalen **st_pageflip**-Bibliothek notwendig. Diese betreffen z. B. die Initialisierung und das Laden von HTML-Seiten. Bitte dokumentiere diese Änderungen separat im Code oder in einer Datei wie `CHANGES.md`.

---

## 📜 PHP: request.php

Eine einfache PHP-Datei, die Bilddateien aus dem definierten Verzeichnis zurückliefert (z. B. `book1/seite1.jpg`, `seite2.jpg`, ...).

```php
<?php
$path = $_GET['pfad'] ?? '';
if (!is_dir($path)) {
  echo json_encode([]);
  exit;
}
$files = array_values(array_filter(scandir($path), fn($f) => preg_match('/\.(jpg|png|jpeg)$/i', $f)));
echo json_encode($files);
?>
```

---

## 📦 Optional: Erweiterungsideen

- 🔊 Mehrere Soundeffekte je nach Aktion
- 🎨 Themen & Styles via CSS-Variablen
- 🖼️ Thumbnail-Navigation (Miniaturbilder)
- 🔒 Passwortgeschützte Bücher

---

## 💡 Hinweis

Diese Erweiterung ist **nicht offiziell** vom st_pageflip-Projekt und basiert auf dessen Open-Source-Version. Nutzung auf eigenes Risiko.

---

## 🧑‍💻 Autor

- **Dein Name**
- GitHub: [deinProfil](https://github.com/deinProfil)

---

## 📄 Lizenz

MIT License – frei nutzbar, bitte bei Forks & Nutzung erwähnen.

---

## 🏷️ Erklärung der HTML-Datenattribute (`data-*`)

Die folgenden Attribute können im `<div class="ui-flipbook">` angegeben werden, um das Verhalten und Aussehen des Flipbooks individuell zu steuern:

| Attribut                 | Typ      | Beschreibung |
|--------------------------|----------|--------------|
| `data-pdf-src`           | String   | (Optional) Link zur PDF-Datei für den Download-Button. |
| `data-img-src`           | String   | Verzeichnis mit den Seitenbildern (z. B. `images/book1`). Wird zum Laden der Buchseiten verwendet. |
| `data-width`             | String   | `"responsive"` oder feste Pixelzahl. Bei `"responsive"` wird die Breite automatisch an das Elternelement angepasst. |
| `data-height`            | String   | Optional: Höhe in Pixel, falls nicht automatisch berechnet werden soll. |
| `data-din_format`        | String   | Formatname wie `"A4"`, `"16:9"` oder `"Comic/Manga"`. Definiert das Seitenverhältnis. Wenn **nicht gesetzt**, wird `data-aspect_ratio` verwendet oder der Standardwert `0.707` (≈ DIN A4 Hochformat) angenommen. |
| `data-aspect_ratio`      | Number   | Optional: Seitenverhältnis (Breite/Höhe) als Kommazahl (z. B. `1.0` für quadratisch). Überschreibt `data-din_format`. |
| `data-center-single`     | Boolean  | Ob die letzte (einzelne) Seite zentriert dargestellt wird. |
| `data-mousewheel-scroll` | Boolean  | Aktiviert das Umblättern mit dem Mausrad bei Hover. |
| `data-slider`            | Boolean  | Zeigt einen Slider zur Navigation zwischen Seiten. |
| `data-sound`             | Boolean  | Aktiviert das Blättergeräusch (nur bei Benutzerinteraktion möglich). |
| `data-download`          | Boolean  | Zeigt einen Button zum Herunterladen der PDF (setzt `data-pdf-src` voraus). |
| `data-fullscreen`        | Boolean  | Aktiviert den Vollbildmodus. |
| `data-reflection`        | Boolean  | Zeigt eine Spiegelung der aktuellen Seite(n) unterhalb an. |
| `data-color`             | Hexfarbe | Farbe der Icon-Schaltflächen. |
| `data-color-hover`       | Hexfarbe | Hover-Farbe der Icon-Schaltflächen. |

**Hinweis zur Formatwahl:**  
Wenn du `data-din_format` angibst (z. B. `"A4"`, `"16:9"`), wird automatisch das passende Seitenverhältnis geladen. Falls **weder** `data-din_format` **noch** `data-aspect_ratio` gesetzt ist, verwendet das Plugin den Standardwert `0.707`, was etwa dem Verhältnis von DIN A4 Hochformat entspricht.

---
