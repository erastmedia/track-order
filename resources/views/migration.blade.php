<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Migrasi Database</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>Progress Migrasi Database</h1>
    <div id="progress"></div>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '{{ url("/migrate-database") }}',
                type: 'GET',
                success: function(response) {
                    $('#progress').html(response.message + '<br>' + response.output);
                },
                error: function(xhr, status, error) {
                    $('#progress').html('Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        });
    </script>
</body>
</html>
