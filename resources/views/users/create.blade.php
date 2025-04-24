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
				<div>
					{{-- <x-input name="role" type="radio" value="Admin" class="hidden peer/admin"/> --}}
					<input type="radio" name="role" value="Admin" class="hidden">
					<label for="admin" class="px-6 py-2 border border-gray-300 rounded-lg cursor-pointer text-gray-700 transition">
						Admin
					</label>
				</div>
				<div>
					<input name="role" type="radio" value="User" class="hidden"/>
					<label for="user" class="px-6 py-2 border border-gray-300 rounded-lg cursor-pointer text-gray-700">
						User
					</label>
				</div>
			</div>
			<div>
				<x-input name="avatar" type="file" />
			</div>



			<x-button>Creer</x-button>
		</form>
	</x-container>
</x-layout>