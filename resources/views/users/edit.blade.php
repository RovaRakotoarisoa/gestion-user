<x-layout>
	<x-container>
		<form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="space-y-6">
				<div>
					<x-label value="Name :" class="pb-3"/>
					<x-input name="name" type="text" class="w-full pb-3"  value="{{ $user->name }}" required/>
				</div>
				<div>
					<x-label value="Email :" class="pb-3"/>
					<x-input name="email" type="email" class="w-full pb-3"  value="{{ $user->email }}" required/>
				</div>
				<div>
					<x-label value="Mot de passe :" class="pb-3"/>
					<x-input name="password" type="text" autocomplete="new-password" class="w-full pb-3" required/>
				</div>
				<div>
					<x-label value="Confirmer le mot de passe :" class="pb-3"/>
					<x-input name="password_confirmation" type="text" class="w-full pb-3" required autocomplete="new-password"/>
				</div>
			</div>

			<div class="flex gap-4 my-6">
				@if($user->role === 'Admin' || $user->role === 'User')
					
				
				<label for="admin" class="relative flex flex-col bg-white px-12 pt-4 rounded-lg shadow-md cursor-pointer">
		          <span class="font-semibold text-gray-500 leading-tight uppercase">Admin</span>
		          <input type="radio" name="role" id="admin" value="Admin" class="absolute h-0 w-0 appearance-none hidden" />

		            <span aria-hidden="false" class="absolute inset-0 border-2 border-green-500 bg-green-200 bg-opacity-10 rounded-lg">
						<span class="absolute top-1 right-1 h-6 w-6 inline-flex items-center justify-center rounded-full bg-green-200">
						  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-green-600">
						    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
						  </svg>
						</span>
					</span>
			    </label>

			    <label for="user" class="relative flex flex-col bg-white px-12 py-4 rounded-lg shadow-md cursor-pointer">
		          <span class="font-semibold text-gray-500 leading-tight uppercase">User</span>
		          <input type="radio" name="role" id="user" value="User" class="absolute h-0 w-0 appearance-none hidden" />
					<span aria-hidden="false" class="absolute inset-0 border-2 border-green-500 bg-green-200 bg-opacity-10 rounded-lg">
						<span class="absolute top-1 right-1 h-6 w-6 inline-flex items-center justify-center rounded-full bg-green-200">
						  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-green-600">
						    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
						  </svg>
						</span>
					</span>
				</label>
			    @endif
			</div>

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



			<x-button class="mt-4">Modifier</x-button>
		</form>
	</x-container>
	
@vite(['resources/js/inputFileSelected.js'])
</x-layout>

