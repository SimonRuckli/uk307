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
        <?php if (isset($validation)) : ?>
            <ul class="text-monospace text-danger">
                <?php foreach ($validation->getErrors() as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <h4>Neuer Reparaturauftrag</h4>

        <form autocomplete="off" action="addtask" method="post">

            <div class="form-group">
                <label class="form-label" for="name">Name*</label>
                <input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars(post("name")); ?>">
                <br>
                <label class="form-label" for="email">E-Mail*</label>
                <input class="form-control" type="text" name="email" value="<?php echo htmlspecialchars(post("email")); ?>">
                <br>
                <label class="form-label" for="phone">Telefon</label>
                <input class="form-control" type="text" name="phone" value="<?php echo htmlspecialchars(post("phone")); ?>">
                <br>
                <label class="form-label" for="urgency">Dringlichkeit*</label>
                <select class="form-control" name="urgency" id="urgency" require>
                    <option hidden disabled selected value><?php echo (post("urgency", " -- Bitte auswählen -- ")); ?></option>
                    <option>sehr tief</option>
                    <option>tief</option>
                    <option>normal</option>
                    <option>hoch</option>
                    <option>sehr hoch</option>
                </select><br>
                <input class="form-control" type="text" name="returnDate" id="returnDate" value="<?php echo (post("returnDate")); ?>" readonly>
                <br>

                <label class="form-label" for="tool">Betreffendes Werkzeug*</label>
                <br>
                <div class="autocomplete">
                    <input class="form-control" id="tool" type="text" name="tool" value="<?php echo htmlspecialchars(post("tool")); ?>">
                </div>
            </div>

            <div class="form-actions">
                <button class="btn btn-primary" type="submit" id="add" name="button" value="add">Reparaturauftrag hinzufügen</button>
                <button class="btn btn-secondary" type="submit" name="button" value="tasklist">Auftragsliste öffnen</button>
            </div>
        </form>
    </div>
    <script src="public/js/autocomplete.js"></script>
    <script type="text/javascript">
        var tools = <?php echo json_encode($tools); ?>;
    </script>
    <script>
        autocomplete(document.getElementById("tool"), tools);
    </script>
    <script src="public/js/addTask.js"></script>
</body>

</html>