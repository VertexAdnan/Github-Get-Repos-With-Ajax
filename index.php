<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <h3 id="result">Repos</h3>
    <table id="resultHead">
        <thead>
            <th>Name</th>
            <th>Html_url</th>
            <th><button id="refresh">Refresh</button></th>
        </thead>
        <tbody id="resultBody">

        </tbody>
    </table>

    <script>
        $("#refresh").click(function() {
            $.ajax({
                type: "POST",
                url: "php.php",
                data: "getPost",
                success: function(data) {
                    $("#resultBody").html(data);
                    $("#result").html("Data incoming");
                },
            });
        });
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "php.php",
                data: "getPost",
                success: function(data) {
                    $("#resultBody").html(data);
                },
            });
        });
    </script>
</body>

</html>