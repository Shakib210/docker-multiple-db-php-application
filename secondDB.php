<?php
header("Content-Type: application/json");
$method = $_SERVER['REQUEST_METHOD'];

$connectDB1 = mysqli_connect(
    'db', # service name
    'php_docker_student', # username
    'password', # password
    'php_docker_student' # db table
);

$table_name = "php_docker_table";

switch ($method) {
    case 'GET':
        // Retrieve data
        $sql = "SELECT * FROM users";
        $result = mysqli_query($connectDB1, $sql);

        $data = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        echo json_encode($data);
        break;

    case 'POST':
        // Create new record
        $input = json_decode(file_get_contents('php://input'), true);

        $username = $input['username'];
        $email = $input['email'];

        $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";

        if ($connectDB1->query($sql) === TRUE) {
            echo json_encode(["message" => "Record created successfully"]);
        } else {
            echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
        }
        break;

    case 'PUT':
        // Update existing record
        $input = json_decode(file_get_contents('php://input'), true);

        $id = $input['id'];
        $username = $input['username'];
        $email = $input['email'];

        $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";

        if ($connectDB1->query($sql) === TRUE) {
            echo json_encode(["message" => "Record updated successfully"]);
        } else {
            echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
        }
        break;

    case 'DELETE':
        // Delete record
        $input = json_decode(file_get_contents('php://input'), true);

        $id = $input['id'];

        $sql = "DELETE FROM users WHERE id=$id";

        if ($connectDB1->query($sql) === TRUE) {
            echo json_encode(["message" => "Record deleted successfully"]);
        } else {
            echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
        }
        break;

    default:
        echo json_encode(["message" => "Invalid method"]);
        break;
}

$connectDB1->close();