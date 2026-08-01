<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <h1>Edit page</h1>

    <div>
        <form action="{{route("roles.update", $role->id)}}" method="post">
            @csrf
            @method("PUT")
            <div>
                <label for="name">Role Name</label>
                <input type="text" name="name" value="{{$role->name}}">
            </div>
            <button type="submit" name="btn_submit">Update Role</button>
        </form>
    </div>
</body>
</html>