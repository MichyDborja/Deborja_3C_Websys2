<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item View</title>
</head>
<body>
    <h1>Item View</h1>
    <form>
        <label>Item No.:</label>
        <input type="text" value="{{ request('item_no') }}" readonly><br>

        <label>Name:</label>
        <input type="text" value="{{ request('name') }}" readonly><br>

        <label>Price:</label>
        <input type="text" value="{{ request('price') }}" readonly><br>
    </form>
</body>
</html>
