<x-layout>
	<x-container>
		<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('POST')
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
			<div class="flex gap-4 mt-6">
				<label for="admin" class="relative flex flex-col bg-white px-12 pt-4 rounded-lg shadow-md cursor-pointer">
		          <span class="font-semibold text-gray-500 leading-tight uppercase">Admin</span>
		          <input type="radio" name="role" id="admin" value="Admin" class="absolute h-0 w-0 appearance-none hidden" />

		          <span aria-hidden="true" class="hidden absolute inset-0 border-2 border-green-500 bg-green-200 bg-opacity-10 rounded-lg">
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

		          <span aria-hidden="true" class="hidden absolute inset-0 border-2 border-green-500 bg-green-200 bg-opacity-10 rounded-lg">
		            <span class="absolute top-1 right-1 h-6 w-6 inline-flex items-center justify-center rounded-full bg-green-200">
		              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-green-600">
		                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
		              </svg>
		            </span>
		          </span>
			    </label>

				
			</div>
			<div>
				<x-input name="avatar" type="file" />
			</div>



			<x-button>Creer</x-button>
		</form>
	</x-container>
</x-layout>

