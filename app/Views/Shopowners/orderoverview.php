<!-- Hier haalt hij de header op  --> 
<?php include APPROOT . "/Views/Includes/header.php"; ?>


<style>
        #queries {
            font-family: Montserrat, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #queries td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #queries tr:nth-child(even){background-color: #E38F88;;}

        #queries tr:hover {background-color: #ddd;}

        #queries th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #34744d;
            color: white;
            padding-left: 8px;
        }
        </style>






<div class="container col-12">
<h1>Dit zijn de openstaande orders:</h1>

<table style="width:75%" id="queries" align="center">
    <tr>
        <th>ID</th>
        <th>Datum/tijd</th>
        <th>Zoekvraag</th>
    </tr>
    <?php foreach ($data['orders'] as $order) : ?>
    <tr>
        <td><?php echo $query->query_id ?></td>
        <td> <?php
            setlocale(LC_TIME, "");
            setlocale(LC_ALL, 'nl_NL');
            $queryMoment = strtotime($query->query_moment);
            $date = strftime("%A %d %B %Y", $queryMoment);
            $time = strftime("%H:%M", $queryMoment);

            echo $date . " om " .  $time . " uur" ?>

        </td>
        <td><?php echo $query->query ?></td>
    </tr>

    <?php endforeach; ?>
</table>




<h1>Dit zijn de afgewerkte orders:</h1>

<table style="width:75%" id="queries" align="center">
    <tr>
        <th>ID</th>
        <th>Datum/tijd</th>
        <th>Zoekvraag</th>
    </tr>
    <?php foreach ($data['allQueries'] as $query) : ?>
    <tr>
        <td><?php echo $query->query_id ?></td>
        <td> <?php
            setlocale(LC_TIME, "");
            setlocale(LC_ALL, 'nl_NL');
            $queryMoment = strtotime($query->query_moment);
            $date = strftime("%A %d %B %Y", $queryMoment);
            $time = strftime("%H:%M", $queryMoment);

            echo $date . " om " .  $time . " uur" ?>

        </td>
        <td><?php echo $query->query ?></td>
    </tr>

    <?php endforeach; ?>
</table>
</div>






<!-- Hier haalt hij de footer op  --> 
<?php include APPROOT . "/Views/Includes/footer.php"; ?>