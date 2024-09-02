<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Log In</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');.head{color:#fff;font-weight:700;text-align:center;font-family:"inter",sans-serif;padding-top:170px;}*{background-color:rgba(23,31,44,1);}.form-label{color:#fff;margin-left:350px;}.form-control{width:50%;margin-left:350px;background-color:rgba(23,31,44,1);border-color:#3aa21ab3;}.btn{color:#fff;margin-left:350px;min-width:120px;min-height:48px;border-radius:5px;padding-inline:16px;background-color:#3aa21ab3;color:#fff;text-align:center;display:flex;justify-content:center;align-items:center;text-transform:capitalize;font-size:14px;font-weight:300;margin-block:16px 12px;margin-top:20px;cursor:pointer;}.btn:hover{color:#fff;margin-left:350px;min-width:120px;min-height:48px;border-radius:5px;padding-inline:16px;background-color:#3aa21ab3;color:#fff;text-align:center;display:flex;justify-content:center;align-items:center;text-transform:capitalize;font-size:14px;font-weight:300;margin-block:16px 12px;margin-top:20px;cursor:pointer;}.para{color:#fff;}.click{color:#3aa21ab3;text-decoration:none;}.form-control:focus{background-color:rgba(23,31,44,1);color:#fff;border:1px solid #3aa21ab3;outline:none;box-shadow:none;}@media (max-width: 768px){.head{font-size:28px;padding-top:70px;}.form-control{width:80%;margin:0 auto;}.form-label{margin-left:auto;margin-right:auto;display:block;text-align:center;}.btn{margin:0 auto;display:block;}}@media (max-width: 480px){.head{font-size:24px;padding-top:50px;}.form-control{width:90%;}}.form-control::placeholder{color:rgb(145,141,141);opacity:1;}
    
        #password, #email {
            color: #fff !important;
        }
    </style>
</head>

<body>
    <form action="{{ route('login') }}" method="POST">@csrf
        <h2 class="head"> Log In</h2>
        <div class="mb-3">
            <label for="email1" class="form-label">Email </label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email address" required autofocus> @error('email')<span class="text-danger">{{ $message }}</span> @enderror</div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"> @error('password')<span class="text-danger">{{ $message }}</span> @enderror</div>
        <button type="submit" class="btn btn-success"> Log In </button>
        <p class="para text-center"> Forgot Password? <a class="click" href="#"> Click here</a></p>
    </form>
</body>

</html>