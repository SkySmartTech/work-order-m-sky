<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>mmsnoyon</title>
  <link rel="icon" type="image/x-icon" href="../myimg/favicon.ico">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- SweetAlert -->
  <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #4facfe,rgb(13, 247, 247));
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box {
      width: 400px;
    }

    .login-logo img {
      width: 250px;
      margin-bottom: 10px;
    }

    .login-logo h3 {
      font-weight: 500;
      color: #fff;
      text-shadow: 1px 1px 2px #00000070;
    }

    .card {
      border-radius: 15px;
      box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
      animation: slideIn 0.6s ease-in-out;
    }

    @keyframes slideIn {
      from {
        transform: translateY(20px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .login-card-body {
      padding: 30px;
    }

    .form-control {
      border-radius: 10px;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      border-radius: 10px;
      transition: 0.3s;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004b9b;
    }

    .icheck-primary label {
      font-size: 0.9rem;
    }

    .login-box-msg {
      font-size: 1rem;
      margin-bottom: 20px;
    }
  </style>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo text-center">
      <img src="../myimg/sky.png" alt="User Image">
      <h3>Work Order Management System</h3>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg text-center">Enter login details</p>

        <div class="input-group mb-3">
          <input id="id_UserName" type="email" class="form-control" placeholder="User Name" onkeydown="funKeyPress(this)">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input id="id_Password" type="password" class="form-control" placeholder="Password" onkeydown="funKeyPress(this)">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember"> Remember Me </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" onclick="funCheckLogin()" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- Include SweetAlert JavaScript -->
    <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
         //var vblSec;
        var intTmp = 0;
        var strTmp = "";
        var i;
        
        //--------------- Load when document is ready ------------------------------------------
        $(function() 
        {      
            //alert("Execute Reports..");
            //funViewReport();
          
        });   
        function funKeyPress(vblKey) 
        {
            if(event.key === 'Enter') 
            {
                //alert(vblKey.value);  
                funCheckLogin();
            }        
        }
        //--------------- View Report function ------------------------------------------
        function funCheckLogin() 
	{
            var vbl_UserName = document.getElementById("id_UserName").value;
            var vbl_Password = document.getElementById("id_Password").value;            
            //alert(vbl_UserName);
            //alert(vbl_Password);
            if((vbl_UserName ==="") || (vbl_Password===""))
            {                
                //alert("Username or Password is blank");
                Swal.fire({
                    title: 'Error.!',
                    text: 'Username or Password is blank',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    customClass: 
                    {
                        popup: 'small-popup',
                        title: 'small-title',
                        content: 'small-text',
                    }});
            }           
            else
            {
                //alert("Check login details.");       
                var vblSendPara =  [vbl_UserName , vbl_Password];
                $.post('login.php', { userpara: vblSendPara }, function(json_data2) 
                {             
                    //alert(json_data2);
                    var res = $.parseJSON(json_data2);
                    //alert(res);                     
                    //alert(res.LoginDetailAry[0]);
                    //alert(res.LoginDetailAry[1]);
                    
                    if(res.LoginDetailAry[0] === "Success")
                    {
                        //alert("Open Home Page");
                        window.location.href = "./home/home.php";
                        //window.close();
                        //window.open("./home.php");
                        //alert("OK.!");
                    }
                    else
                    {
                        //alert("Username or Password incorrect..!");
                        Swal.fire({
                            title: 'Error.!',
                            text: 'Username or Password incorrect..',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            customClass: 
                            {
                                popup: 'small-popup',
                                title: 'small-title',
                                content: 'small-text',
                            }});
                    }
                 });
            }
           // alert("End");
        };
    </script>

