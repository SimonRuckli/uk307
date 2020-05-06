<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Auftrag erfassen</title>
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
                <label class="form-label" for="urgency">Dringlichkeit*</label>
                <select class="form-control" name="urgency" id="urgency" require>
                    <option hidden disabled selected value> -- Bitte auswählen -- </option>
                    <option>sehr tief</option>
                    <option>tief</option>
                    <option>normal</option>
                    <option>hoch</option>
                    <option>sehr hoch</option>
                </select><br>
                <input class="form-control" type="text" name="urgencydays" id="urgencydays" readonly>
                <br>
                <label class="form-label" for="tool">Betreffendes Werkzeug*</label>
                <input class="form-control" type="text" name="tool">
            </div>

            <div class="form-actions">
                <button class="btn btn-primary" type="submit" name="button" value="add">Reparaturauftrag speichern</button>
                <button class="btn btn-secondary" type="submit" name="button" value="tasklist">Reparaturauftrag abbrechen</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        var tools = <?php echo json_encode($tools); ?>;
    </script>
    <script src="public/js/app.js"></script>
</body>

</html>