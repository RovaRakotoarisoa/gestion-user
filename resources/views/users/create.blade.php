<x-layout>
	<x-container>
		<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('POST')

			<div>
				<label class="flex flex-col items-center justify-center w-[26rem] h-32 border-2 border-dashed border-gray-400 rounded-lg  cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition">
					<div class="flex flex-col items-center justify-center pt-5 pb-6">
						<svg aria-hidden="true" class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0l-4 4m4-4l4 4M17 8v12m0 0l4-4m-4 4l-4-4"></path>
						</svg>
						<p class="mb-2 text-sm text-gray-500 text-justify">
							<span class="font-semibold">Cliquez pour uploader</span> ou glissez une image
						</p>
						<p class="text-xs text-gray-500">PNG, JPG, JPEG (Max MB)</p>
					</div>

					<input name="avatar" id="fileInput" type="file" accept="image/*" class="hidden" />
				</label>
				<p id="selectedFileText" class="hidden text-green-300 font-semibold">Image Selectionne</p>
			</div>

			<div class="space-y-6">
				<div>
					<x-label value="Name :" class="pb-3"/>
					<x-input name="name" type="text" class="w-full pb-3" placeholder="Enter name here..." required/>
				</div>
				<div>
					<x-label value="Email :" class="pb-3"/>
					<x-input name="email" type="email" class="w-full pb-3" placeholder="Example@gmail.com" required/>
				</div>
				<div>
					<x-label value="Mot de passe :" class="pb-3"/>
					<x-input name="password" type="password" class="w-full pb-3" required/>
				</div>
			</div>

			<div class="flex gap-4 my-6">
				<label for="admin" class="relative flex flex-col bg-white px-12 pt-4 rounded-lg shadow-md cursor-pointer">
		          <span class="font-semibold text-gray-500 leading-tight uppercase">Admin</span>
		          <input type="radio" name="role" id="admin" value="Admin" class="absolute h-0 w-0 appearance-none hidden" />

		          <x-is-checked />
			    </label>

			    <label for="user" class="relative flex flex-col bg-white px-12 py-4 rounded-lg shadow-md cursor-pointer">
		          <span class="font-semibold text-gray-500 leading-tight uppercase">User</span>
		          <input type="radio" name="role" id="user" value="User" class="absolute h-0 w-0 appearance-none hidden" />

		          <x-is-checked />
			    </label>
			</div>

      <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-sm">
        <h2 class="text-xl font-semibold text-gray-700 mb-4 text-center">Photo de profil</h2>

        <div class="relative w-32 h-32 mx-auto">
          <!-- Aperçu de l’image -->
          <img id="preview" src="https://via.placeholder.com/150"
               class="h-32 object-cover rounded-full border-4 border-white shadow" />

          <!-- Icône de modification -->
          <label for="avatar"
                 class="absolute bottom-0 right-0 bg-white rounded-full p-2 shadow hover:bg-gray-100 cursor-pointer transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.232 5.232l3.536 3.536M9 11l6.586-6.586a2 2 0 112.828 2.828L11.828 13.828a2 2 0 01-1.414.586H7v-3.414a2 2 0 01.586-1.414z" />
            </svg>
            <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden" onchange="previewImage(event)">
          </label>
        </div>

        <p class="text-sm text-gray-500 mt-4 text-center">Formats : JPG, PNG, JPEG – Max 2 Mo</p>
      </div>
			
			<x-button class="mt-4">Creer</x-button>
		</form>
	</x-container>
<script>
    function previewImage(event) {
      const file = event.target.files[0];
      const preview = document.getElementById('preview');
      if (file && file.type.startsWith('image/')) {
        preview.src = URL.createObjectURL(file);
      }
    }
  </script>


	
@vite(['resources/js/inputFileSelected.js'])
</x-layout>
