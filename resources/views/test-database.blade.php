<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DataBase Test Connection</title>
</head>

<body>
    <h1>
        @php
            try {
                DB::connection()->getPdo();
                echo 'Database connection successful!';
            } catch (\Exception $e) {
                echo 'Database connection failed: ' . $e->getMessage();
            }
        @endphp
    </h1>
</body>

</html>
