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
				<div class="flex">
					<x-input name="role" type="radio" value="Admin"/>
					<x-label value="Admin"/>	
				</div>
				<div class="flex">
					<x-input name="role" type="radio" value="User"/>
					<x-label value="User"/>	
				</div>
			</div>
			<div>
				<x-input name="avatar" type="file" />
			</div>

			<x-button>Creer</x-button>
		</form>
	</x-container>
</x-layout>