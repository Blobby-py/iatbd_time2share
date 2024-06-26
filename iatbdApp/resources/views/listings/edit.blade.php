<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1"> Edit a product </h2>
            <p class="mb-4">Edit: {{$listing->title}}</p>
        </header>

        <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">

        <!-- Website Protection -->
        @csrf
        @method("PUT")

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Edit Product Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" placeholder="Example: Senior Laravel Developer" value="{{$listing->title}}" />

                @error("title")
                    <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Edit Product Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="product" placeholder="Example: Senior Laravel Developer" value="{{$listing->product}}" />
                @error("product")
                    <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Edit Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" placeholder="Example: Remote, Boston MA, etc" value="{{$listing->location}}" />
                @error("location")
                    <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Edit Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$listing->email}}" />
                @error("email")
                    <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">Edit Tags </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" placeholder="Example: Laravel, Backend, Postgres, etc" value="{{$listing->tags}}" />
                @error("tags")
                    <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                Edit Company Logo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />

                <img class="w-48 mr-6 mb-6"
                    src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="" 
                />

                @error('logo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2"> Edit Description </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Include tasks, requirements, salary, etc"> {{$listing->description}} </textarea>
                @error("desription")
                    <p class="text-red-500 text-xs mt-1"> {{$message}} </p>
                @enderror
            </div>

            <div class="mb-6">
                <a href="/" class="text-black ml-4"> Back </a>
                <button class="bg-laravel text-white rounded py-2 px-2 hover:bg-black"> Confirm Edit </button>
            </div>
        </form>
    </x-card>
</x-layout>