<!-- resources/views/pdf/holiday-plan.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Holiday Plan PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Holiday Plan Details</h1>
        <table>
            <tr>
                <th>ID</th>
                <td>{{ $holidayPlan->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $holidayPlan->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $holidayPlan->description }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $holidayPlan->date }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
