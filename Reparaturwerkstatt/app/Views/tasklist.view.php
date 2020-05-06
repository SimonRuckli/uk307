<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Auftragsliste</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/css.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <h4>Task-Liste</h4>
        <ul>
            <?php foreach ($tasks as $task) : ?>
                <li>
                    <?= $task["name"] ?? "" ?> | <?= $task["email"] ?? "" ?> | <?= $task["phone"] ?? "" ?> | <?= $task["urgency"] ?? "" ?> | <?= $task["tool"] ?? "" ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="form-actions">
        <button class="btn btn-primary" type="submit" name="button" value="add">Reparaturauftrag Bearbeiten</button>
        <button class="btn btn-secondary" type="cancel" name="button" value="tasklist">Abbrechen</button>
    </div>
</body>

</html>