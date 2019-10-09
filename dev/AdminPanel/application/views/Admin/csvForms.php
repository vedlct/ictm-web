
<html>
<head>
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/
bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <!-- jQuery library -->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">-->
<!--    </script>-->
<!--    <!-- Latest compiled JavaScript -->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">-->
<!--    </script>-->
    <style type="text/css">
        .container{
            margin-top: 50px; border:1px solid rgba(158, 158, 158, 0.49);
            padding-bottom: 50px;
        }
        h3{
            text-align: center;
        }
        .top { }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <h3>Import MYSQL data to CSV File</h3>
    </div>
    <div class="top">
        <form method="post">
            <button type="submit" class="btn btn-primary" name="export">Export
            </button>

        </form>
    </div>
<!--    <table class="table">-->
<!--        <tr>-->
<!--            <th>Title</th>-->
<!--            <th>FirstName</th><th>SurName</th><th>OtherNames</th><th>DateOfBirth</th><th>GanderChange</th><th>Gender</th><th>PlaceOfBirth</th><th>Nationality</th><th>PassportNo</th><th>PassportExpiryDate</th><th>UkEntryDate</th><th>VisaExpiryDate</th><th>VisaType</th>-->
<!--        </tr>-->
<!--        --><?php //if(isset($export)) { foreach($export as $ind => $value) {?>
<!--            <tr>-->
<!--                <td>--><?//= $value['title'] ?><!--</td>-->
<!--                <td>--><?//= $value['firstName'] ?><!--</td>-->
<!--                <td>--><?//= $value['surName'] ?><!--</td>-->
<!--                <td>--><?//= $value['otherNames'] ?><!--</td>-->
<!--                <td>--><?//= $value['dateOfBirth'] ?><!--</td>-->
<!--                <td>--><?//= $value['ganderChange'] ?><!--</td>-->
<!--                <td>--><?//= $value['gender'] ?><!--</td>-->
<!--                <td>--><?//= $value['placeOfBirth'] ?><!--</td>-->
<!--                <td>--><?//= $value['nationality'] ?><!--</td>-->
<!--                <td>--><?//= $value['passportNo'] ?><!--</td>-->
<!--                <td>--><?//= $value['passportExpiryDate'] ?><!--</td>-->
<!--                <td>--><?//= $value['ukEntryDate'] ?><!--</td>-->
<!--                <td>--><?//= $value['visaExpiryDate'] ?><!--</td>-->
<!--                <td>--><?//= $value['visaType'] ?><!--</td>-->
<!--            </tr>-->
<!--        --><?php //} } ?>
<!--    </table>-->
    <table class="table">
        <tr>
            <th>Title</th>


        <?php if(isset($export)) { foreach($export as $ind => $value) {?>

                <td><?= $value['title'] ?></td>

        <?php } } ?>

            </tr>

        <tr>
            <th>FirstName</th>


            <?php if(isset($export)) { foreach($export as $ind => $value) {?>

                <td><?= $value['firstName'] ?></td>

            <?php } } ?>

        </tr>
        <tr>
            <th>SurName</th>


            <?php if(isset($export)) { foreach($export as $ind => $value) {?>

                <td><?= $value['surName'] ?></td>

            <?php } } ?>

        </tr>
    </table>
</div>
</body>
</html>