<p align="center">
  <img src="https://github.com/Jumbo125/st-pageflip-enhanced/blob/main/a080723b-e63e-49d4-a9e1-f0487cf1188b.png" alt="st-pageflip-enhanced" width="300">
</p>
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
│   ├── page-flip.browser.unmin.js  # Deine modifizierte st_pageflip Datei
│   ├── page-flip_controll.js       # Plugin-Skript (dieses Repository)
|   ├── jquery.js                   # jQuery notwenid
│   ├── jquery_ui_draggable.min.js  # jQuery ui für draggable
|   └── panzoom.min.js              # Panzoom.js für Zoom
│
├── php/
│   └── request.php                 # Returns image filenames in the specified folder
│
├── mp3/
│   └── turn.mp3                    # Page flip sound (optional)
│
├── css/
│   ├── stPageFlip.css              # Pageflip css 
│   ├── bootstrap.css               # Bootstrap css
│   ├── custom.css                  # eigenes Styling Additional styles for controls & effects
├── css/bootsrap-ico
│         ├── #divese Daten für Bootstrap icons
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

MIT License


## 📄 Third-Party Licenses

### Panzoom
Panzoom (c) 2020 Timmy Willison  
MIT License  
https://github.com/timmywil/panzoom

### StPageFlip
Original library: StPageFlip
Copyright (c) 2020 Nodlik
https://github.com/Nodlik/StPageFlip

Extended plugin functionality:
(c) 2025 Jumbo125 – Erweiterungen für Steuerung, UI, Zoom, Sound, etc.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.


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

### 📐 Supported `din_format` Values

| Name              | Aspect Ratio | Type               |
|-------------------|--------------|--------------------|
| A0                | 0.707        | DIN A (portrait)   |
| A1                | 0.706        | DIN A (portrait)   |
| A2                | 0.707        | DIN A (portrait)   |
| A3                | 0.707        | DIN A (portrait)   |
| A4                | 0.707        | DIN A (portrait)   |
| A5                | 0.705        | DIN A (portrait)   |
| A6                | 0.709        | DIN A (portrait)   |
| A7                | 0.705        | DIN A (portrait)   |
| A8                | 0.703        | DIN A (portrait)   |
| 16:9              | 1.778        | Screen / Video     |
| 4:3               | 1.333        | Screen / Video     |
| 3:2               | 1.500        | Screen / Video     |
| 21:9              | 2.333        | Ultra-Wide         |
| 1:1               | 1.000        | Square             |
| 9:16              | 0.562        | Vertical / Mobile  |
| 5x7               | 0.714        | Photo              |
| 8x10              | 0.800        | Photo              |
| 2:3               | 0.667        | Photo              |
| Portrait Standard | 0.707        | Flipbook Classic   |
| Comic/Manga       | 0.650        | Flipbook Classic   |
| Square            | 1.000        | Flipbook Classic   |
| Wide Book         | 1.400        | Flipbook Classic   |

> 💡 Benutze `din_format="A4"` oder einen anderen Wert aus der Liste, um automatisch die korrekte auflösung zu wählen

---


<p align="center">
  <img src="https://github.com/Jumbo125/st-pageflip-enhanced/blob/main/a080723b-e63e-49d4-a9e1-f0487cf1188b.png" alt="st-pageflip-enhanced" width="300">
</p>
# 📖 Extension for st_pageflip: Custom Controls and Features

This plugin extends the **st_pageflip** library with a custom control bar, fullscreen mode, zoom functions, page reflections, mouse wheel support, sound effects, and many other visual features.

---

## 🔧 Requirements

- [st_pageflip](https://www.pagedflip.com/)
- jQuery
- Panzoom (for zoom & pan)
- Bootstrap Icons (for control icons)
- Custom modifications to the `st_pageflip` source file (see below)

---

## 📂 File Structure

```
project-root/
│
├── js/
│   ├── page-flip.browser.unmin.js   # Your modified st_pageflip file
│   ├── page-flip_controll.js        # Plugin script (this repository)
│   ├── jquery.js                    # jQuery (required)
│   ├── jquery-ui.min.js             # jQuery UI for draggable support
│   └── panzoom.min.js               # Panzoom.js for zoom functionality
│
├── php/
│   └── request.php                  # Returns image filenames in the specified folder
│
├── mp3/
│   └── turn.mp3                     # Page flip sound (optional)
│
├── css/
│   ├── stPageFlip.css               # CSS styles for st_pageflip
│   ├── bootstrap.css                # Bootstrap styles
│   ├── custom.css                   # Your custom styles (controls, effects, etc.)
│
├── css/bootstrap-ico/
│   └── # various files for Bootstrap Icons
```

---

## 🚀 Integration & Usage

1. **Include the scripts in your HTML**:

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/styles.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/st_pageflip_custom.js"></script>
<script src="js/page-flip_controll.js"></script>
```

2. **Define the HTML container**:

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

3. **Initialization**:

```javascript
controlls_for_book(
  "#myBook"
);
```

---

## 🔍 Features

- ✅ Zoom (in, out, reset & double-click zoom)
- ✅ Fullscreen mode incl. position reset & control reordering
- ✅ Page reflection depending on page count & layout
- ✅ Page number & slider for navigation
- ✅ Page flip sound (optional)
- ✅ Drag & drop movement
- ✅ Button icons via Bootstrap Icons
- ✅ Custom colors via `data-color` & `data-color-hover`
- ✅ Responsive aspect ratio (incl. DIN formats)

---

## 🛠️ Modifying the st_pageflip File

To use all features correctly, a minimal modification of the original **st_pageflip** library is necessary. This affects, for example, the initialization and HTML page loading. Please document these changes separately in your code or in a file like `CHANGES.md`.

---

## 📜 PHP: request.php

A simple PHP script that returns image files from a specified directory (e.g. `book1/page1.jpg`, `page2.jpg`, ...).

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

## 📦 Optional: Extension Ideas

- 🔊 Multiple sound effects depending on action
- 🎨 Themes & styles via CSS variables
- 🖼️ Thumbnail navigation
- 🔒 Password-protected books

---

## 💡 Note

This extension is **not officially affiliated** with the st_pageflip project and is based on its open-source version. Use at your own risk.

---

## 🧑‍💻 Author

- **Jumbo125**

---

## 📄 License

### Panzoom
Panzoom (c) 2020 Timmy Willison  
MIT License  
https://github.com/timmywil/panzoom

### StPageFlip
Original library: StPageFlip
Copyright (c) 2020 Nodlik
https://github.com/Nodlik/StPageFlip

Extended plugin functionality:  
(c) 2025 Jumbo125 – Enhancements for controls, UI, zoom, sound, etc.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

---

## 🏷️ Explanation of HTML Data Attributes (`data-*`)

The following attributes can be used in `<div class="ui-flipbook">` to individually configure the behavior and appearance of the flipbook:

| Attribute                | Type     | Description |
|--------------------------|----------|-------------|
| `data-pdf-src`           | String   | (Optional) Link to the PDF file for the download button. |
| `data-img-src`           | String   | Directory containing the page images (e.g. `images/book1`). Used to load the book pages. |
| `data-width`             | String   | `"responsive"` or fixed pixel value. With `"responsive"`, the width adjusts automatically to the parent element. |
| `data-height`            | String   | Optional: height in pixels if not calculated automatically. |
| `data-din_format`        | String   | Format name such as `"A4"`, `"16:9"` or `"Comic/Manga"`. Defines the aspect ratio. If **not set**, `data-aspect_ratio` is used or the default `0.707` (≈ DIN A4 portrait) is assumed. |
| `data-aspect_ratio`      | Number   | Optional: aspect ratio (width/height) as a decimal (e.g. `1.0` for square). Overrides `data-din_format`. |
| `data-center-single`     | Boolean  | Whether the last (single) page is centered. |
| `data-mousewheel-scroll` | Boolean  | Enables flipping via mouse wheel on hover. |
| `data-slider`            | Boolean  | Displays a slider for page navigation. |
| `data-sound`             | Boolean  | Enables flip sound (only works after user interaction). |
| `data-download`          | Boolean  | Displays a PDF download button (requires `data-pdf-src`). |
| `data-fullscreen`        | Boolean  | Enables fullscreen mode. |
| `data-reflection`        | Boolean  | Displays a reflection of the current page(s) below. |
| `data-color`             | Hex color | Icon color. |
| `data-color-hover`       | Hex color | Hover color for icons. |

**Note on format selection:**  
If you specify `data-din_format` (e.g. `"A4"`, `"16:9"`), the appropriate aspect ratio is automatically applied. If **neither** `data-din_format` **nor** `data-aspect_ratio` is set, the plugin uses the default value `0.707`, which roughly corresponds to DIN A4 portrait format.

### 📐 Supported `din_format` Values

| Name              | Aspect Ratio | Type               |
|-------------------|--------------|--------------------|
| A0                | 0.707        | DIN A (portrait)   |
| A1                | 0.706        | DIN A (portrait)   |
| A2                | 0.707        | DIN A (portrait)   |
| A3                | 0.707        | DIN A (portrait)   |
| A4                | 0.707        | DIN A (portrait)   |
| A5                | 0.705        | DIN A (portrait)   |
| A6                | 0.709        | DIN A (portrait)   |
| A7                | 0.705        | DIN A (portrait)   |
| A8                | 0.703        | DIN A (portrait)   |
| 16:9              | 1.778        | Screen / Video     |
| 4:3               | 1.333        | Screen / Video     |
| 3:2               | 1.500        | Screen / Video     |
| 21:9              | 2.333        | Ultra-Wide         |
| 1:1               | 1.000        | Square             |
| 9:16              | 0.562        | Vertical / Mobile  |
| 5x7               | 0.714        | Photo              |
| 8x10              | 0.800        | Photo              |
| 2:3               | 0.667        | Photo              |
| Portrait Standard | 0.707        | Flipbook Classic   |
| Comic/Manga       | 0.650        | Flipbook Classic   |
| Square            | 1.000        | Flipbook Classic   |
| Wide Book         | 1.400        | Flipbook Classic   |

> 💡 Use `din_format="A4"` (or any name from this list) to auto-set the aspect ratio.
