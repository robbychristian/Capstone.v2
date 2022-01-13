<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $maildata['subject'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center m-1">
        <p class="lead">{{ $maildata['body'] }}</p>
    </div>
</body>
</html>