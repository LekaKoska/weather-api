<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("naslovStranice")</title>
</head>
<body>
    @include("navigation")
        @yield("sadrzajStranice")


    @include("footer")

</body>
</html>
