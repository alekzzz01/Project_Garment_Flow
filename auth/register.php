<?php

require '../config/db.php'; 

session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    

    if ($password !== $confirmPassword) {
        $error = 'Passwords do not match.';
    } else {
        $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? OR user_email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = 'Username or email already exists.';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $connection->prepare("INSERT INTO users (username, user_email, user_password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashedPassword);

            if ($stmt->execute()) {
                header('Location: login.php');
                exit();
            } else {
                $error = 'Failed to register. Please try again.';
            }
        }

        $stmt->close();
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="../assets//css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>



</head>
<body>


        <div class="bg-gray-50 font-[sans-serif]">
            <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4" x-data="app()">
                <div class="max-w-lg w-full">

                <!-- <a href="javascript:void(0)"><img
                    src="https://readymadeui.com/readymadeui.svg" alt="logo" class='w-40 mb-8 mx-auto block' />
                </a> -->

                <div class="p-8 rounded-2xl bg-white shadow-md">
                    <h2 class="text-gray-800 text-center text-2xl font-bold">Create your account</h2>
                    <form method="POST" class="mt-8 space-y-4">
                    <div>
                        <label class="text-gray-800 text-sm font-medium mb-2 block">Email</label>
                        <div class="relative flex items-center">
                        <input name="email" type="email" required class="w-full text-gray-800 text-sm border border-slate-900/10 px-3 py-2 rounded-md outline-blue-600" placeholder="Enter email" />
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4"><path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 4.7-8 5.334L4 8.7V6.297l8 5.333 8-5.333V8.7z"></path></svg>
                        </div>
                    </div>


                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Username</label>
                        <div class="relative flex items-center">
                        <input name="username" type="text" required class="w-full text-gray-800 text-sm border border-slate-900/10 px-3 py-2 rounded-md outline-blue-600" placeholder="Enter username" />
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                            <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                            <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
                        </svg>
                        </div>
                    </div>

                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Password</label>
                        <div class="relative flex items-center">
                        <input type="password" id="password" x-model="password" name="password" @input="checkStrength" required class="w-full text-gray-800 text-sm border border-slate-900/10 px-3 py-2 rounded-md outline-blue-600" placeholder="Enter password" />
                            <button type="button" onclick="togglePassword('password', 'togglePasswordIcon')" class="absolute inset-y-0 right-4 flex items-center">
                                <i id="togglePasswordIcon" class='bx bxs-show w-4 h-4 text-gray-400'></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex -mx-1 mt-2">
                        <template x-for="(v,i) in 5" :key="i">
                            <div class="w-1/5 px-1">
                                <div class="h-2 rounded-xl transition-colors"
                                    :class="i < passwordScore ? (passwordScore === 5 ? 'bg-green-500' : 'bg-red-400') : 'bg-gray-200'">
                                </div>
                            </div>
                        </template>
                    </div>

                  
                  
                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Confirm Password</label>
                        <div class="relative flex items-center">
                            <input id="confirmPassword" name="confirmPassword" type="password" required class="w-full text-gray-800 text-sm border border-slate-900/10 px-3 py-2 rounded-md outline-blue-600" placeholder="Enter confirm password" />
                            <button type="button" onclick="togglePassword('confirmPassword', 'toggleConfirmPasswordIcon')" class="absolute inset-y-0 right-4 flex items-center">
                                <i id="toggleConfirmPasswordIcon" class='bx bxs-show w-4 h-4 text-gray-400'></i>
                            </button>
                        </div>
                    </div>



                   

                    <div class="flex">
                        <input type="checkbox" x-model="termsAccepted" class="w-4 border border-slate-900/10" />
                        <label class="text-sm ml-2 text-slate-500">I have read and accept the <a href="javascript:void(0)"
                            class="text-sm font-medium text-blue-600 hover:underline">Terms and Conditions</a></label>
                    </div>

                    <div class="!mt-8">
                        <button type="submit" :disabled="!isFormValid" class="w-full py-3 px-4 text-sm font-medium tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                            Sign up
                        </button>
                    </div>

                    <p class="text-slate-500 text-sm !mt-8 text-center">Already have an account? <a href="login.php" class="text-blue-600 hover:underline ml-1 whitespace-nowrap text-sm font-medium">Login here</a></p>


                    <div class="flex items-center gap-6 w-full ">
                        <div class=" border border-b border-slate-900/10 w-full"></div>
                        <div class="text-slate-500">or</div>
                        <div class="border border-b border-slate-900/10 w-full"></div>
                    </div>


                    <div class="relative flex items-center justify-center gap-2  text-gray-800 text-sm border border-slate-900/10 hover:bg-gray-100 p-2 rounded-md outline-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="w-6 h-6" viewBox="0 0 48 48">
                        <path fill="#fbc02d" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12	s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20	s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#e53935" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039	l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4caf50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1565c0" d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                        </svg>

                        <p class="text-sm font-semibold text-gray-900">Sign up with Google</p>
                        
                    </div>
                    
                </form>
                </div>
                </div>

                <?php if (isset($error)): ?>
                    <div class="text-red-500 text-sm mt-8"><?php echo $error; ?></div>
                <?php endif; ?>
                
            </div>
        </div>




    
</body>


<script defer>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("bxs-show");
                toggleIcon.classList.add("bxs-hide");
             
             
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("bxs-hide");
                toggleIcon.classList.add("bxs-show");
                
              
            }
        }
</script>

<script>
function app() {
    return {
        showPasswordField: true,
        passwordScore: 0,
        password: '',
        chars: {
            lower: 'abcdefghijklmnopqrstuvwxyz',
            upper: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            numeric: '0123456789',
            symbols: '!"#$%&\'()*+,-./:;<=>?@[\\]^_`{|}~'
        },
        charsLength: 12,
        checkStrength: function() { 
            if (!this.password) {
                this.passwordScore = 0;
                return;
            }
            
            let score = 0;

            // Check for minimum length
            if (this.password.length >= 8) {
                score++;
            }

            // Check for lowercase letters
            if (/[a-z]/.test(this.password)) {
                score++;
            }

            // Check for uppercase letters
            if (/[A-Z]/.test(this.password)) {
                score++;
            }

            // Check for numbers
            if (/\d/.test(this.password)) {
                score++;
            }

            // Check for special characters
            if (/[!@#$%^&*]/.test(this.password)) {
                score++;
            }

            this.passwordScore = score;
        },

        get isFormValid() {
                const confirmPassword = document.getElementById('confirmPassword').value;
                return this.passwordScore >= 5 && this.termsAccepted && this.password === confirmPassword;
        }
      
    }
}

</script>





</html>