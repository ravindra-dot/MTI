<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | MyTalentIndia</title>
    <!-- Tailwind CSS v4 -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- GLightbox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
</head>

 <body class="bg-gray-50 min-h-screen flex flex-col">

    <!--===================
            NAVBAR
    ==================== -->
    @include('Components.navbar')

    <!--===================
        GALLERY CONTENT
    ==================== -->
    <section aria-labelledby="photo-gallery-heading" class="mb-20">
        <div class="border-b border-gray-200 pb-5 mb-8">
            <h2 id="photo-gallery-heading" class="text-2xl font-black text-blue-950 flex items-center gap-3">
                <span class="text-orange-500"><i class="fa-solid fa-camera"></i></span> Photo Gallery
            </h2>
        </div>

        @if(count($images) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($images as $image)
                    @php $imagePath = asset('assets/MK/Images/' . $image->getFilename()); @endphp
                    <div class="group relative overflow-hidden rounded-2xl shadow-md border border-gray-100 bg-white aspect-square">
                        <a href="{{ $imagePath }}" class="glightbox block w-full h-full" data-gallery="photos">
                            <img src="{{ $imagePath }}" alt="Gallery Showcase" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500 ease-out" loading="lazy">
                            <div class="absolute inset-0 bg-blue-950/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white bg-orange-500 p-3.5 rounded-full shadow-lg transform translate-y-4 group-hover:translate-y-0 transition duration-300">
                                    <i class="fa-solid fa-magnifying-glass-plus text-lg"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 mx-auto max-w-xs">
                {{ $images->appends(['books_page' => request('books_page')])->links() }}
            </div>
        @else
            <div class="text-center py-16 text-gray-400 bg-white border border-gray-200 border-dashed rounded-2xl">
                No photos found.
            </div>
        @endif
    </section>

    <!-- --- Books Section --- -->
    <section aria-labelledby="books-heading">
        <div class="border-b border-gray-200 pb-5 mb-8">
            <h2 id="books-heading" class="text-2xl font-black text-blue-950 flex items-center gap-3">
                <span class="text-orange-500"><i class="fa-solid fa-book-open"></i></span> Books & Publications
            </h2>
        </div>

        @if(count($books) > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($books as $book)
                    @php $bookPath = asset('assets/MK/Books/' . $book->getFilename()); @endphp
                    <div class="group relative overflow-hidden rounded-2xl shadow-md border border-gray-100 bg-white aspect-[3/4]">
                        <a href="{{ $bookPath }}" class="glightbox block w-full h-full" data-gallery="books">
                            <img src="{{ $bookPath }}" alt="Book Cover" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500 ease-out" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-950/90 via-blue-950/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                                <span class="text-white text-[10px] font-bold uppercase tracking-wider bg-orange-500 self-start px-2 py-1 rounded-md mb-2 shadow">View Publication</span>
                                <p class="text-white text-sm font-bold truncate">{{ pathinfo($book->getFilename(), PATHINFO_FILENAME) }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 mx-auto max-w-xs">
                {{ $books->appends(['photos_page' => request('photos_page')])->links() }}
            </div>
        @else
            <div class="text-center py-16 text-gray-400 bg-white border border-gray-200 border-dashed rounded-2xl">
                No books available.
            </div>
        @endif
    </section>

    <!--===================
            FOOTER
    ==================== -->
    @include('Components.footer')

    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- GLightbox Initialization JS -->
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const lightbox = GLightbox({
                touchNavigation: true,
                loop: true,
                zoomable: true,
                autoplayVideos: false,
                openEffect: 'zoom',
                closeEffect: 'zoom'
            });
        });
    </script>
</body>

</html>