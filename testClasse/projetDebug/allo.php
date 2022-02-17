<!DOCTYPE html>
<html>
    <head>
        <title>Notre première instruction : echo</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Affichage de texte avec PHP pour le cours 420-4a5</h2>
        
        <p>
            <?php
            $a = 2;
            $b = 1;
            echo "Si a = 2 et b = 3, combien donne a + b? <br />";
            echo "Le resultat est :";
            echo $a + $b;
            echo "<br /><br />";

            ?>
            Cette ligne a été écrite entièrement en HTML.<br />
            <?php echo("Celle-ci a été écrite entièrement en PHP."); ?>
        </p>
    </body>
</html>