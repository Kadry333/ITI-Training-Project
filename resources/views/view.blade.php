<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .button-group {
            display: flex; /* Use flexbox for better alignment */
            gap: 5px; /* Space between buttons */
        }
        .action-button {
            padding: 8px 12px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s, transform 0.2s;
            font-weight: bold;
        }
        .view-button {
            background-color: #007bff; /* Blue */
        }
        .edit-button {
            background-color: #28a745; /* Green */
        }
        .delete-button {
            background-color: #dc3545; /* Red */
        }
        .action-button:hover {
            transform: scale(1.05); /* Slightly enlarge on hover */
        }
        .view-button:hover {
            background-color: #0056b3; /* Darker blue */
        }
        .edit-button:hover {
            background-color: #218838; /* Darker green */
        }
        .delete-button:hover {
            background-color: #c82333; /* Darker red */
        }
    </style>
</head>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">created_by</th>
      <th scope="col">created_at</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td>{{ $post->id }}</td>
      <td>{{ $post->title }}</td>
      <td>{{ $post->created_by }}</td>
      <td>{{ $post->created_at->format('d-m-Y') }}</td> <!-- Assuming 'created_at' is a Carbon instance -->
    </tr>

  </tbody>
</table>