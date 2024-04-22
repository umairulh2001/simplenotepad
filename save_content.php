<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    if (!is_dir('_notes'))
        mkdir('_notes');
	
    // Get the content from the POST data
    $content = $_POST['content'];
	$filename = $_POST['filename'];

    // Save the content to a file (you can modify this part to save to a database, etc.)
    $file = '_notes/' . $filename;
    file_put_contents($file, $content);

    // Send a response back to the client (optional)
    echo 'Content saved successfully!';
} else {
    // Handle invalid requests
    echo 'Invalid request';
}
?>
