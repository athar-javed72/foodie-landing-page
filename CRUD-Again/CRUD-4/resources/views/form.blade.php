<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Student</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <h2>AJAX Student Form</h2>

    <form id="studentForm" enctype="multipart/form-data">
        @csrf
        <label>Name: *</label>
        <input type="text" name="name" required><br><br>

        <label>Email: *</label>
        <input type="email" name="email" required><br><br>

        <label>File:</label>
        <input type="file" name="file"><br><br>

        <button type="submit" id="btnsubmit">Submit</button>
    </form>

        <span id="output"></span>



    <p id="message" style="color: green;"></p>

    <script>

        document.ready(function() {
            $('#studentForm').submit(function(event){
                event.preventDefault();

                var form = $(studentForm)[0];
                var data = new formData(form);

                $('#btnsubmit').prop('disabled', true);


            });
        });

</body>
</html>
