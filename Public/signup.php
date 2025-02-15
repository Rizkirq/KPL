<?php include '../includes/header.php'; ?>
<div class="flex items-center justify-center min-h-screen mt-16">
    <div class="w-full max-w-sm">
        <div class="bg-green-800 text-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-bold text-center">Create Account</h2>
            <p class="text-center text-sm">Sign up to create your account and start blogging.</p>
            <button class="w-full bg-white text-gray-700 py-2 mt-4 rounded flex items-center justify-center">
                <img src="facebook-icon.png" class="w-5 h-5 mr-2"> Signup with Facebook
            </button>
            <hr class="my-4">

            <!-- Form untuk signup -->
            <form action="../action/register.php" method="POST">
                <label class="block text-sm">Full Name</label>
                <input type="text" name="full_name" class="w-full p-2 rounded bg-white text-gray-800" placeholder="Your Name" required>

                <label class="block text-sm mt-2">Email</label>
                <input type="email" name="email" class="w-full p-2 rounded bg-white text-gray-800" placeholder="@gmail.com" required>

                <label class="block text-sm mt-2">Password</label>
                <input type="password" name="password" class="w-full p-2 rounded bg-white text-gray-800" placeholder="password" required>

                <label class="block text-sm mt-2">Confirm Password</label>
                <input type="password" name="confirm_password" class="w-full p-2 rounded bg-white text-gray-800" placeholder="password" required>

                <div class="flex items-center mt-2">
                    <input type="checkbox" name="terms" class="mr-2" required> 
                    <span class="text-sm">I agree to the terms & conditions</span>
                </div>

                <button type="submit" class="w-full bg-gray-700 text-white py-2 mt-4 rounded">Sign Up →</button>
            </form>

            <p class="text-center text-sm mt-2">Have an account? <a href="#" class="underline">Sign in here</a></p>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
