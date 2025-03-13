<!DOCTYPE html>
<html>
<head>
    <title>Working Sequences Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Working Sequences Report</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Working Sequence Code</th>
                <th>Person Required</th>
                <th>Multi WI</th>
                <th>Process Code</th>
                <th>Process Name</th>
                <th>Work Center Code</th>
                <th>Work Center Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workingSequences as $index => $sequence)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sequence->working_sequence_code }}</td>
                    <td>{{ $sequence->person_required }}</td>
                    <td>{{ $sequence->multiwi->name }}</td>
                    <td>{{ $sequence->process_code }}</td>
                    <td>{{ $sequence->process_name }}</td>
                    <td>{{ $sequence->work_center_code }}</td>
                    <td>{{ $sequence->work_center_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
