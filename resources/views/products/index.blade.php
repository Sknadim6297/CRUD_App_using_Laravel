<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Crud</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
</head>

<body>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row justify-between items-center p-4 mt-2">
            <!-- Logo -->
            <div class="font-bold text-2xl sm:text-3xl mb-4 sm:mb-0">Sk.Crud</div>

            <!-- Search bar -->
            <div class="relative w-full sm:w-1/3">
                <input type="text" placeholder="Search posts..." class="w-full p-2 rounded border border-gray-300 outline-none">
            </div>
        </div>

        <!-- Add Product Button -->
        <div class="flex justify-between mb-4 mt-6 sm:mt-10">
            <button class="bg-green-500 text-white px-4 sm:px-10 py-2 rounded">
                <a href="{{ route('add-product') }}">Add Product</a>
            </button>
        </div>

        <!-- Success Message -->
        <div>
            @if($message = Session::get('success'))
            <div id="successMessage" class="text-green-500 p-4 bg-green-100 rounded-lg text-center">
                <p>{{ $message }}</p>
            </div>
            @endif
        </div>

        <!-- Product Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto bg-white border border-zinc-300">
                <thead>
                    <tr class="bg-zinc-100 text-center">
                        <th class="py-2 px-2 sm:px-4 border-b">Id</th>
                        <th class="py-2 px-2 sm:px-4 border-b">Name</th>
                        <th class="py-2 px-2 sm:px-4 border-b">Description</th>
                        <th class="py-2 px-2 sm:px-4 border-b">Image</th>
                        <th class="py-2 px-2 sm:px-4 border-b">Created_at</th>
                        <th class="py-2 px-2 sm:px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($products->isEmpty())
                    <tr>
                        <td colspan="6" class="py-4 text-center text-red-500">No products found. Please kindly add products.</td>
                    </tr>
                    @else
                    @foreach($products as $product)
                    <tr class="hover:bg-zinc-50 text-center">
                        <td class="py-2 px-2 sm:px-4 border-b">{{ $loop->index + 1 }}</td>
                        <td class="py-2 px-2 sm:px-4 border-b">{{ $product->name }}</td>
                        <td class="py-2 px-2 sm:px-4 border-b">{{ $product->description }}</td>
                        <td class="py-2 px-2 sm:px-4 border-b">
                            <img src="/products/{{ $product->image }}" alt="" class="mx-auto rounded-full w-12 h-12 sm:w-14 sm:h-14 object-cover">
                        </td>
                        <td class="py-2 px-2 sm:px-4 border-b">{{ $product->created_at }}</td>
                        <td class="py-2 px-2 sm:px-4 ">
                            <button class="bg-orange-500 text-white px-2 py-1 rounded"><a href="{{ route('edit-product', $product->id) }}">EDIT</a></button>
                            <button class="bg-red-500 text-white px-2 py-1 rounded">
                                <a href="{{ route('delete-product', $product->id) }}" onclick="return confirm('Are you sure you want to delete this product?');">DELETE</a>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
