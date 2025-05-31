<x-layout>
	<x-container>
		<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('POST')
      <div class="flex flex-col items-center">
	      <div class="my-12">
	        <h2 class="text-xl font-semibold text-gray-700 mb-4 text-center">Photo de profil</h2>

	        <div class="relative w-32 h-32 mx-auto">
	          <img id="preview" src="https://via.placeholder.com/150"
	               class="h-32 object-cover rounded-full border-4 border-white shadow-2xl" />
	          <label for="avatar"
	                 class="absolute bottom-0 right-0 bg-white rounded-full p-2 shadow hover:bg-gray-100 cursor-pointer transition">
	            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M1 8C1 6.89543 1.89543 6 3 6H3.92963C4.59834 6 5.2228 5.6658 5.59373 5.1094L6.40627 3.8906C6.7772 3.3342 7.40166 3 8.07037 3H11.9296C12.5983 3 13.2228 3.3342 13.5937 3.8906L14.4063 5.1094C14.7772 5.6658 15.4017 6 16.0704 6H17C18.1046 6 19 6.89543 19 8V15C19 16.1046 18.1046 17 17 17H3C1.89543 17 1 16.1046 1 15V8ZM14.5 11C14.5 13.4853 12.4853 15.5 10 15.5C7.51472 15.5 5.5 13.4853 5.5 11C5.5 8.51472 7.51472 6.5 10 6.5C12.4853 6.5 14.5 8.51472 14.5 11ZM10 14C11.6569 14 13 12.6569 13 11C13 9.34315 11.6569 8 10 8C8.34315 8 7 9.34315 7 11C7 12.6569 8.34315 14 10 14Z" fill="#0F172A"/>
									</svg>
	            <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden" onchange="previewImage(event)">
	          </label>
	        </div>

	        <p class="text-sm text-gray-500 mt-4 text-center">Formats : JPG, PNG, JPEG – Max 2 Mo</p>
	      </div>

				<div class="space-y-6 flex flex-col items-center justify-center">
					<div>
						<x-label value="Name :" class="pb-3"/>
						<x-input name="name" type="text" class="w-[34rem] pb-3" placeholder="Enter name here..." />
					</div>
					<div>
						<x-label value="Email :" class="pb-3"/>
						<x-input name="email" type="email" class="w-[34rem] pb-3" placeholder="Example@gmail.com" />
					</div>
					<div>
						<x-label value="Mot de passe :" class="pb-3"/>
						<x-input name="password" type="password" class="w-[34rem] pb-3" />
					</div>
					<div>
						<x-label value="Confirmer le mot de passe :" class="pb-3"/>
						<x-input name="password_confirmation" type="password" class="w-[34rem] pb-3"/>
					</div>
				</div>

				<div class="flex justify-center gap-4 my-6">
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
				<div>
					@if($errors->any())
						<ul class="text-red-500 text-sm">
							@foreach($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
						</ul>
					@endif
				</div>
				<x-button class="mt-4 rounded text-white py-2 !bg-purple-300 w-[34rem] flex justify-center">Ajouter</x-button>
			</div>
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


	
{{-- @vite(['resources/js/inputFileSelected.js']) --}}
</x-layout>
