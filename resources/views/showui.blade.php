<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>{{ $title }}</h2>
  <ul>
    @foreach ($todos as $todo)
      <li>{{ $todo }}</li>
    @endforeach
  </ul>
</body>
</html>