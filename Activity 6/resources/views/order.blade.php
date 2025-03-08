<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order View</title>
</head>
<body>
    <h1>Order View</h1>
    <form>
        <label>Customer ID:</label>
        <input type="text" value="{{ $customer_id }}" readonly><br>

        <label>Name:</label>
        <input type="text" value="{{ $name }}" readonly><br>

        <label>Order No.:</label>
        <input type="text" value="{{ $order_no }}" readonly><br>

        <label>Date:</label>
        <input type="text" value="{{ $date }}" readonly><br>
    </form>
</body>
</html>
