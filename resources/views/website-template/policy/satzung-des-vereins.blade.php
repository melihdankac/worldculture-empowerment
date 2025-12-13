@extends('website-template.layouts.app')

@section('meta&title')
    <title>WORLDCULTURE EMPOWERMENT</title>

    <style>
        h1,
        h2,
        h3 {
            margin: 1.2em 0 0.5em;
            line-height: 1.3;
        }

        p {
            margin: 0.8em 0;
        }

        ul,
        ol {
            margin: 0.8em 0 0.8em 1.2em;
        }

        blockquote {
            margin: 1em 0;
            padding: 0.5em 1em;
            border-left: 3px solid #ddd;
            color: #555;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <iframe style="width: 100%; height: 80vh;"
            src="{{ asset('website-template/images/policys/Worldculture_Empowerment_Satzung.pdf') }} "
            frameborder="0"></iframe>
    </div>

    {{-- <div class="container" style="margin-top: 2em; margin-bottom: 2em;">

        <h1>Satzung des Vereins<br>Worldculture Empowerment e.V.</h1>
        <p>Anschrift: Am Rheinufer 18, 50999 Köln, Deutschland</p>

        <h2>§ 1 Name, Sitz, Geschäftsjahr</h2>
        <p>(1) Der Verein führt den Namen Worldculture Empowerment.</p>
        <p>(2) Er ist ein rechtsfähiger Verein mit Sitz in Köln.</p>
        <p>(3) Der Verein soll in das Vereinsregister eingetragen werden und trägt dann den Zusatz „e. V.“.</p>
        <p>(4) Das Geschäftsjahr ist das Kalenderjahr.</p>

        <h2>§ 2 Zweck des Vereins</h2>
        <p>(1) Der Verein verfolgt ausschließlich und unmittelbar gemeinnützige Zwecke im Sinne des Abschnitts
            „Steuerbegünstigte Zwecke“ der Abgabenordnung.</p>
        <p>(2) Der Zweck des Vereins ist die Förderung der Entwicklungszusammenarbeit, der Gleichberechtigung von Frauen und
            Männern und der Jugendhilfe sowie die Förderung internationaler Toleranz und Völkerverständigung.</p>
        <p>(3) Der Satzungszweck wird verwirklicht insbesondere durch:</p>
        <ul>
            <li>Förderung der internationalen Toleranz und Völkerverständigung durch Unterstützung ethnischer Minderheiten …
            </li>
            <li>Förderung der Gleichberechtigung und Selbstständigkeit von Frauen durch gezielte Projekte …</li>
            <li>Unterstützung von Kindern, die von Armut, Naturkatastrophen, Kriegen oder Diskriminierung betroffen sind …
            </li>
        </ul>
        <p>(4) Der Verein darf seinen Satzungszweck auch durch Hilfspersonen (§ 57 Abs. 1 Satz 2 AO) …</p>

        <h2>§ 3 Gemeinnützigkeit</h2>
        <p>(1) Der Verein ist selbstlos tätig; er verfolgt nicht in erster Linie eigenwirtschaftliche Zwecke.</p>
        <p>(2) Mittel des Vereins dürfen nur für die satzungsmäßigen Zwecke verwendet werden. Die Mitglieder erhalten keine
            Zuwendungen aus Mitteln der Körperschaft.</p>
        <p>(3) Es darf keine Person durch Ausgaben, die dem Zweck des Vereins fremd sind, oder durch unverhältnismäßig hohe
            Vergütungen begünstigt werden.</p>

        <h2>§ 4 Mitgliedschaft</h2>
        <p>(1) Mitglied kann jede natürliche oder juristische Person werden, welche die Ziele des Vereins unterstützt.</p>
        <p>(2) Der Antrag auf Mitgliedschaft ist schriftlich an den Vorstand zu richten …</p>
        <ul>
            <li>bei natürlichen Personen durch Tod oder Verlust der Geschäftsfähigkeit</li>
            <li>bei juristischen Personen durch Verlust der Rechtsfähigkeit</li>
            <li>durch Austritt</li>
            <li>durch Streichung von der Mitgliederliste</li>
            <li>durch Ausschluss</li>
        </ul>
        <p>(4) Das Mitglied kann durch schriftliche Erklärung gegenüber dem Vorstand austreten …</p>
        <!-- … devamı aynı mantıkla tüm paragraflar ve listeler dönüştürülür … -->

        <h2>§ 8 Auflösung des Vereins</h2>
        <p>(1) Die Auflösung des Vereins kann nur durch eine Mitgliederversammlung mit einer Zweidrittelmehrheit beschlossen
            werden.</p>
        <p>(2) Bei Auflösung oder Aufhebung des Vereins … fällt das Vereinsvermögen an TERRE DES FEMMES …</p>

        <h2>§ 9 Inkrafttreten</h2>
        <p>Diese Satzung tritt mit der Eintragung in das Vereinsregister des Vereins in Kraft.</p>

        <h2>Anlage: Beitragsordnung</h2>
        <ul>
            <li>Mitgliedsbeitrag beträgt 120,00 € im Jahr …</li>
            <li>Fördermitglieder zahlen 750,00 € im Jahr …</li>
            <li>Neu hinzukommende Mitglieder zahlen Aufnahme-Gebühr von 30,00 € …</li>
        </ul>

        <p>Satzung errichtet am 16.08.2025, Köln</p>
        <p>Unterschriften der Gründungsmitglieder: …</p>

    </div> --}}
@endsection
