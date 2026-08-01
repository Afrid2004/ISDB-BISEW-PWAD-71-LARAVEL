<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Role</title>
</head>
<body>
    <div>
        <ul>
            <li>Id: {{$role->id}}</li>
            <li>Name: {{$role->name}}</li>
            <li>Created: {{$role->created_at}}</li>
            <li>Updated: {{$role->updated_at}}</li>
        </ul>
    </div>
</body>
</html>