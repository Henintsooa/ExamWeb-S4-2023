<!DOCTYPE html>
<html>
<head>
    <title>Statistiques</title>
</head>
<body>
    <h1>Statistiques</h1>

    <h2>Régime maximum utilisé :</h2>
    <?php if (!empty($regimeMax)): ?>
        <ul>
            <?php foreach ($regimeMax as $regime): ?>
                <li><?php echo $regime; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun régime maximum utilisé</p>
    <?php endif; ?>

    <h2>Nombre de ventes :</h2>
    <p><?php echo $nbrVente; ?></p>

    <h2>Nombre d'hommes :</h2>
    <p><?php echo $nbrHomme; ?></p>

    <h2>Nombre de femmes :</h2>
    <p><?php echo $nbrFemme; ?></p>
</body>
</html>
