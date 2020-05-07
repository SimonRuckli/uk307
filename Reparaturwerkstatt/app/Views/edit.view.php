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
        <?php if (isset($validation)) : ?>
            <ul class="text-monospace text-danger">
                <?php foreach ($validation->getErrors() as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <h4>Auftrag Bearbeiten</h4>

        <form autocomplete="off" action="edit" method="post">
            <div class="form-group">
                <label class="form-label" for="name">Name*</label>
                <input class="form-control" type="text" name="name" value="<?= htmlspecialchars($task["name"] ?? post("name")) ?>">
                <br>
                <label class="form-label" for="email">E-Mail*</label>
                <input class="form-control" type="text" name="email" value="<?= htmlspecialchars($task["email"] ?? post("email")) ?>">
                <br>
                <label class="form-label" for="phone">Telefon</label>
                <input class="form-control" type="text" name="phone" value="<?= htmlspecialchars($task["phone"] ?? post("phone")) ?>">
                <br>
                <label class="form-label" for="processing">Status der Reparatur</label>
                <select class="form-control" name="processing" id="processing" require>
                    <option hidden disabled selected value></option>
                    <option>Reparaturauftrag pendent</option>
                    <option>Reparaturauftrag abgeschlossen</option>
                </select>
                <br>
                <label class="form-label" for="tool">Betreffendes Werkzeug*</label>
                <div class="autocomplete">
                    <input class="form-control" id="tool" type="text" name="tool" value="<?= htmlspecialchars($task["tool"] ?? post("tool")) ?>">
                </div>
                <br>
                <input class="form-control" type="text" name="urgency" id="urgency" value="Dringlichkeit: <?= $task["urgency"] ?>" readonly>
                <br>
                <input class="form-control" type="text" name="returnDate" id="returnDate" value="Voraussichtliches Rückgabedatum: <?= getReturnDate($task["entryDate"], $task["urgency"]) ?>" readonly>
            </div>

            <div class="form-actions">
                <button class="btn btn-primary" type="submit" name="button" value="<?= $task["id"] ?>">Speichern</button>
                <button class="btn btn-secondary" type="submit" name="button" value="cancel">Abbrechen</button>
            </div>
        </form>
    </div>

    <script src="public/js/autocomplete.js"></script>
    <script type="text/javascript">
        var tools = <?php echo json_encode($tools); ?>;
        var processing = <?= $task["processing"] ?? post("processing", "1") ?>;
    </script>
    <script>
        autocomplete(document.getElementById("tool"), tools);
    </script>
    <script src="public/js/editTask.js"></script>
</body>

</html>