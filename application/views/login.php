<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    /* Importing fonts from Google */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

    /* Reseting */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: #ecf0f3;
    }

    .wrapper {
      max-width: 350px;
      min-height: 500px;
      margin: 80px auto;
      padding: 40px 30px 30px 30px;
      background-color: #ecf0f3;
      border-radius: 15px;
      box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
    }

    .logo {
      width: 80px;
      margin: auto;
    }

    .logo img {
      width: 100%;
      height: 80px;
      object-fit: cover;
      border-radius: 50%;
      box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3,
        8px 8px 15px #a7aaa7, -8px -8px 15px #fff;
    }

    .wrapper .name {
      font-weight: 600;
      font-size: 1.4rem;
      letter-spacing: 1.3px;
      padding-left: 10px;
      color: #555;
    }

    .wrapper .form-field input {
      width: 100%;
      display: block;
      border: none;
      outline: none;
      background: none;
      font-size: 1.2rem;
      color: #666;
      padding: 10px 15px 10px 10px;
      /* border: 1px solid red; */
    }

    .wrapper .form-field {
      padding-left: 10px;
      margin-bottom: 20px;
      border-radius: 20px;
      box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
    }

    .wrapper .form-field .fas {
      color: #555;
    }

    .wrapper .btn {
      box-shadow: none;
      width: 100%;
      height: 40px;
      background-color: #0054a6;
      color: #fff;
      border-radius: 25px;
      box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
      letter-spacing: 1.3px;
    }

    .wrapper .btn:hover {
      background-color: #039be5;
    }

    .wrapper a {
      text-decoration: none;
      font-size: 0.8rem;
      color: #0054a6;
    }

    .wrapper a:hover {
      color: #039be5;
    }

    @media (max-width: 380px) {
      .wrapper {
        margin: 30px 20px;
        padding: 40px 15px 15px 15px;
      }
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="logo">
      <img
        src="<?= base_url() ?>assets/img/logo.png"
        alt=""
      />
    </div>
    <div class="text-center mt-4 name">Akuntansi</div>
    <form class="p-3 mt-3" id="loginForm">
      <div class="form-field d-flex align-items-center">
        <span class="far fa-user"></span>
        <input
          type="text"
          name="userName"
          id="userName"
          placeholder="Username"
        />
      </div>
      <div class="form-field d-flex align-items-center">
        <span class="fas fa-key"></span>
        <input
          type="password"
          name="password"
          id="pwd"
          placeholder="Password"
        />
      </div>
      <button class="btn mt-3" type="submit">Login</button>
    </form>
    <div class="text-center fs-6">
      <a href="#">Forget password?</a> or <a href="#">Sign up</a>
    </div>
  </div>

  <script>
    document.querySelector('#loginForm').addEventListener('submit', function(event) {
      event.preventDefault();
      
      const username = document.getElementById('userName').value;
      const password = document.getElementById('pwd').value;
      
      fetch('http://api-akuntansi.test/api/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ username: username, password: password }),
      })

      .then(response => response.json())
      .then(data => {
        if (data.success) {
          localStorage.setItem('authToken', data.token); 
          localStorage.setItem('username', username);  
          localStorage.setItem('nama', data.data.nama);  
          localStorage.setItem('id_profil', data.data.id_profil);  
          alert(data.message);
          window.location.href = "<?= base_url() ?>"; 
        } else {
          alert(data.message);
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while logging in.');
      });
    });
  </script>
</body>
