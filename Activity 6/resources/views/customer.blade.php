<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information View</title>
</head>
<body>
    <h1>Customer View</h1>
    <form>
        <label>Customer ID:</label>
        <input type="text" value="{{ request('customer_id') }}" readonly><br>

        <label>Name:</label>
        <input type="text" value="{{ request('name') }}" readonly><br>

        <label>Address:</label>
        <input type="text" value="{{ request('address') }}" readonly><br>
    </form>
</body>
</html>
