<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Yellow</h1>

<form method="GET" action="{{ route('getBar') }}">

    <label for="">Insert</label>
    <input name="keywords" type="text">
    
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <input type="submit">
</form>

</body>
</html>