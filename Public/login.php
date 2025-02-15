<?php include '../includes/header.php'; ?>
<div class="flex items-center justify-center min-h-screen ">
    <div class="w-full max-w-sm">
        <!-- Login Form -->
        <div class="bg-green-800 text-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-lg font-bold text-center">Sign in to MakeBlog</h2>
            <p class="text-center text-sm">Sign in to access your dashboard, settings, and projects.</p>
            <button class="w-full bg-white text-gray-700 py-2 mt-4 rounded flex items-center justify-center">
                <img src="facebook-icon.png" class="w-5 h-5 mr-2"> Connect with Facebook
            </button>
            <hr class="my-4">


            <form action="../action/login_process.php" method="POST">
                <label class="block text-sm">Email</label>
                <input type="email" name="email" id="email" class="w-full p-2 rounded bg-white text-gray-800" placeholder="your email@gmail.com" required>
                
                <label class="block text-sm mt-2">Password</label>
                <input type="password" name="password" id="password" class="w-full p-2 rounded bg-white text-gray-800" placeholder="password" required>
                
                <div class="flex items-center mt-2">
                    <input type="checkbox" class="mr-2" name="remember"> <span class="text-sm">Remember Password</span>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-gray-700 text-white py-2 mt-4 rounded">Sign In →</button>
            </form>

            <p class="text-center text-sm mt-2">No account? <a href="signup.php" class="underline">Create an account</a></p>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
