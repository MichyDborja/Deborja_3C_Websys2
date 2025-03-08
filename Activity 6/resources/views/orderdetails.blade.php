<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details View</title>
</head>
<body>
    <h1>Order Details View</h1>
    <form>
        <label>Transaction No.:</label>
        <input type="text" value="{{ $transNo }}" readonly><br>

        <label>Item ID:</label>
        <input type="text" value="{{ $item_id }}" readonly><br>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" readonly><br>

        <label>Price:</label>
        <input type="text" value="{{ $price }}" readonly><br>

        <label>Quantity:</label>
        <input type="text" value="{{ $qty }}" readonly><br>
    </form>
</body>
</html>
