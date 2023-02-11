<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Media Owner Contract</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            margin-top: 20rem;
        }

        p {
            color: royalblue;
            font-family: sans-serif;
            font-size: 30px;
            line-height: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <div>
        <p>Media Owner Contract</p>
        <p>name: {{$data['name']}}</p>
        <p>This contract has been generated at {{$data['date']}}</p>
    </div>
    <p>Nitx.io</p>
</div>
</body>
</html>
