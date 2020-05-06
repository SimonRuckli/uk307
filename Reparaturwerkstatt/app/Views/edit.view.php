<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Auftrag bearbeiten</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/css.css" rel="stylesheet">
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
                <lable>Status der Reparatur</lable>
                <select class="form-control" name="urgency" require>
                    <option hidden disabled selected value> -- Bitte auswählen -- </option>
                    <option>Reparaturauftrag pendent</option>
                    <option>Reparaturauftrag abgeschlossen</option>
                </select>
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