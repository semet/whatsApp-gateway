<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="w-50 my-4 mx-auto p-4">
        <div class="card card-body">
            <form action="{{ route('message.send') }}" method="POST">
                @csrf
                <div class="my-4">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="phoneNumber">
                </div>
                <div class="my-4">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" id="message" cols="30" rows="3" class="form-control"></textarea>
                </div>

                <div class="my-4">
                    <button class="btn btn-primary" type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
