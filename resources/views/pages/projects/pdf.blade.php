<!DOCTYPE html>
<html>
<head>
    <title>Projects Report</title>
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
    <h2>Projects Report</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Project Code</th>
                <th>Status</th>
                <th>Material</th>
                <th>Project Description</th>
                <th>Start Date</th>
                <th>Finish Date</th>
                <th>Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $index => $project)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $project->project_code }}</td>
                    <td>{{ $project->status->name }}</td>
                    <td>{{ $project->material }}</td>
                    <td>{{ $project->project_description }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->finish_date }}</td>
                    <td>{{ $project->qty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
