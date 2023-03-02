<?php


class imageUpload extends Controller
{
    public function index()
    { 
        // Exit if no file uploaded
        if (!isset($_FILES["image"])) {
            die('No file uploaded.');
        }
        $image_file = $_FILES["image"];

        // Exit if image file is zero bytes
        if (filesize($image_file["tmp_name"]) <= 0) {
            die('Uploaded file has no contents.');
        }

        // Exit if is not a valid image file
        $image_type = exif_imagetype($image_file["tmp_name"]);
        if (!$image_type) {
            die('Uploaded file is not an image.');
        }

        // Get file extension based on file type, to prepend a dot we pass true as the second parameter
        $image_extension = image_type_to_extension($image_type, true);

        // Create a unique image name
        $image_name = bin2hex(random_bytes(16)) . $image_extension;

        // Move the temp image file to the images directory
        move_uploaded_file(
            // Temp image location
            $image_file["tmp_name"],

            // New image location
            PATH . "/public/images/upload/" . $image_name
        );

        echo json_encode(array("filepath" => "images/upload/" . $image_name));
    }
    public function nic()
    { 
        // Exit if no file uploaded
        if (!isset($_FILES["nicupload"])) {
            die('No file uploaded.');
        }
        $image_file = $_FILES["nicupload"];

        // Exit if image file is zero bytes
        if (filesize($image_file["tmp_name"]) <= 0) {
            die('Uploaded file has no contents.');
        }

        // Exit if is not a valid image file
        $image_type = exif_imagetype($image_file["tmp_name"]);
        if (!$image_type) {
            die('Uploaded file is not an image.');
        }

        // Get file extension based on file type, to prepend a dot we pass true as the second parameter
        $image_extension = image_type_to_extension($image_type, true);

        // Create a unique image name
        $image_name = bin2hex(random_bytes(16)) . $image_extension;

        // Move the temp image file to the images directory
        move_uploaded_file(
            // Temp image location
            $image_file["tmp_name"],

            // New image location
            PATH . "/public/images/upload/nic/" . $image_name
        );

        echo json_encode(array("filepath" => "images/upload/nic/" . $image_name));
    }
    public function profilepic()
    { 
        // Exit if no file uploaded
        if (!isset($_FILES["profilepic"])) {
            die('No file uploaded.');
        }
        $image_file = $_FILES["profilepic"];

        // Exit if image file is zero bytes
        if (filesize($image_file["tmp_name"]) <= 0) {
            die('Uploaded file has no contents.');
        }

        // Exit if is not a valid image file
        $image_type = exif_imagetype($image_file["tmp_name"]);
        if (!$image_type) {
            die('Uploaded file is not an image.');
        }

        // Get file extension based on file type, to prepend a dot we pass true as the second parameter
        $image_extension = image_type_to_extension($image_type, true);

        // Create a unique image name
        $image_name = bin2hex(random_bytes(16)) . $image_extension;

        // Move the temp image file to the images directory
        move_uploaded_file(
            // Temp image location
            $image_file["tmp_name"],

            // New image location
            PATH . "/public/images/upload/user/" . $image_name
        );

        echo json_encode(array("filepath" => "images/upload/user/" . $image_name));
    }


    public function uniid()
    { 
        // Exit if no file uploaded
        if (!isset($_FILES["uniidupload"])) {
            die('No file uploaded.');
        }
        $image_file = $_FILES["uniidupload"];

        // Exit if image file is zero bytes
        if (filesize($image_file["tmp_name"]) <= 0) {
            die('Uploaded file has no contents.');
        }

        // Exit if is not a valid image file
        $image_type = exif_imagetype($image_file["tmp_name"]);
        if (!$image_type) {
            die('Uploaded file is not an image.');
        }

        // Get file extension based on file type, to prepend a dot we pass true as the second parameter
        $image_extension = image_type_to_extension($image_type, true);

        // Create a unique image name
        $image_name = bin2hex(random_bytes(16)) . $image_extension;

        // Move the temp image file to the images directory
        move_uploaded_file(
            // Temp image location
            $image_file["tmp_name"],

            // New image location
            PATH . "/public/images/upload/uniid/" . $image_name
        );

        echo json_encode(array("filepath" => "images/upload/uniid/" . $image_name));
    }

    public function uniad()
    { 
        // Exit if no file uploaded
        if (!isset($_FILES["uniadupload"])) {
            die('No file uploaded.');
        }
        $image_file = $_FILES["uniadupload"];

        // Exit if image file is zero bytes
        if (filesize($image_file["tmp_name"]) <= 0) {
            die('Uploaded file has no contents.');
        }

        // Exit if is not a valid image file
        $image_type = exif_imagetype($image_file["tmp_name"]);
        if (!$image_type) {
            die('Uploaded file is not an image.');
        }

        // Get file extension based on file type, to prepend a dot we pass true as the second parameter
        $image_extension = image_type_to_extension($image_type, true);

        // Create a unique image name
        $image_name = bin2hex(random_bytes(16)) . $image_extension;

        // Move the temp image file to the images directory
        move_uploaded_file(
            // Temp image location
            $image_file["tmp_name"],

            // New image location
            PATH . "/public/images/upload/uniad/" . $image_name
        );

        echo json_encode(array("filepath" => "images/upload/uniad/" . $image_name));
    }
}