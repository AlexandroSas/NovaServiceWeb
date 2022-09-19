<html lang="en">
<head>
    <?php require "../php/metadata.php"; ?>
    <title>Document</title>
    <link rel="stylesheet" href="../pages/ticket_preview/ticket_preview.css">
    <link rel="stylesheet" href="../css/home_assistenza.css">
</head>
<body>
    <div class="container">
        <ul class="target in_corso">
            <h1>Chiamate in Corso</h1>
            <?php require "./ticket_preview/ticket_preview.php"; ?>
        </ul>
        <ul class="target completate">
            <h1>Chiamate Completate</h1>
        </ul>
        <ul class="target annullate">
            <h1>Chiamate Annullate</h1>
        </ul>
    </div>
    <script src="../pages/ticket_preview/drag_drop.js"></script>
</body>
</html>
