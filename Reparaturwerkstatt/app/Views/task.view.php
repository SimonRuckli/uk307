<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Auftrag erfassen</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/app.css" rel="stylesheet">
    <script scr="public/js/app.js"></script>
</head>

<body>
    <div class="wrapper">

        <h4>Neuer Reparaturauftrag</h4>

        <form action="processtask" method="post">
            <div class="form-group">
                <label class="form-label" for="name">Name*</label>
                <input class="form-control" type="text" name="name">
                <br>
                <label class="form-label" for="email">E-Mail*</label>
                <input class="form-control" type="text" name="email">
                <br>
                <label class="form-label" for="phone">Telefon</label>
                <input class="form-control" type="text" name="phone">
                <br>
                <label class="form-label" for="urgency">Dringlichkeit*</label>
                <input class="form-control" type="text" id="urgency" name="urgency">
                <br>
                <label class="form-label" for="tool">Betreffendes Werkzeug*</label>
                <input class="form-control" type="text" name="tool">
            </div>

            <div class="form-actions">
                <button class="btn btn-primary" type="submit" name="button" value="add">Reparaturauftrag Hinzufügen</button>
                <button class="btn btn-secondary" type="submit" name="button" value="tasklist">Auftragsliste Öffnen</button>
            </div>
        </form>

    </div>

</body>

</html>