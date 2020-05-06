<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Auftrag bearbeiten</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="public/css/app.css">
    </head>
    <body>
        <h1>Auftrag bearbeiten</h1><br><br>
        <form action="validation" method="post">
            
            <lable for="name">Name*</lable>
            <input name="name" type="text" id="name" require><br><br>

            <lable for="email">E-Mail*</lable>
            <input name="email" type="email" id="email" require><br><br>

            <lable for="phone">Telefon</lable>
            <input name="phone" type="text" id="phone"><br><br>

            <lable>Status der Reparatur</lable>
            <select name="urgency" require>
                <option value=""></option>
                <option value="in_progress">Reparaturauftrag pendent</option>
                <option value="finished">Reparaturauftrag abgeschlossen</option>
            </select><br><br>

            <lable for="tool">Betreffendes Werkzeug*</lable>
            <input name="tool" type="text" id="tool" require><br><br>
            
            <input type="button" value="Auftrag abbrechen">
            <input type="submit" value="Auftrag speichern">
        </form>
    </body>
</html>