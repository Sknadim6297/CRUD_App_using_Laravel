<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
</head>

<body class="min-h-screen bg-gray-100 flex justify-center flex-col items-center">
    
    <!-- Success Message with Redirect -->
    <div>
        @if($message = Session::get('success'))
        <div id="successMessage" class="text-green-500 p-4 bg-green-100 rounded-lg">
            <p>{{ $message }}</p>
        </div>

        <script>
            // Redirect to home or another page after 3 seconds
            setTimeout(function() {
                window.location.href = "/"; // Change 'home' to the correct route you want to redirect to
            }, 3000); // 3000 milliseconds = 3 seconds
        </script>
        @endif
    </div>
    
    <!-- Product Form -->
    <form action="{{ route('store-product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="bg-background text-primary-foreground p-6 rounded-lg shadow-lg w-full max-w-2xl">
            <h2 class="text-2xl font-bold mb-4 text-center">Add New Products</h2>

            <!-- Product Name -->
            <label for="post-title" class="block text-sm font-medium mt-2">Product Name</label>
            <input type="text" id="post-title" name="name" class="w-full px-3 py-2 rounded-lg border bg-input focus:outline-none focus:ring focus:ring-primary" placeholder="Enter product name..." required />

            <!-- Product Description -->
            <label for="post-content" class="block text-sm font-medium mt-4">Product Description</label>
            <textarea id="post-content" name="desc" class="w-full px-3 py-2 rounded-lg border bg-input focus:outline-none focus:ring focus:ring-primary" placeholder="Write your product description..." required></textarea>

            <!-- Product Image -->
            <label for="post-image" class="block text-sm font-medium mt-4">Product Image</label>
            <input type="file" id="post-image" name="image" accept="image/*" class="mt-2 mb-8" />

            <!-- Submit Button -->
            <button name="post" class="bg-green-500 text-white mt-4 px-4 py-2 w-full rounded-lg">Add Product</button>
        </div>
    </form>
</body>

</html>
