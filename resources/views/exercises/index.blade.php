<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exercises') }}
        </h2>
    </x-slot>
    
<section class="bg-gray-200 body-font">
  <div class="container px-5 py-8 mx-auto">
    <div class="p-2 w-full">
     <a href="{{ route('exercises.create' )}}">
        <button 
        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
        Ajouter un exercice
    </button>
     </a>
    </div>
    <div class="flex flex-wrap -m-4 pt-5">
    @forelse ($exercises as $exercise )


    <div class=" relative p-4 lg:w-1/3 hover:scale-110">
        <div class="h-full bg-gray-50 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">

          <form method="POST" action="{{ route('exercises.destroy',$exercise)}}" class="absolute right-0 top-0"> 
            @csrf
            @method('delete')
              <button type="submit">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current  text-gray-300 hover:text-red-700" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
         </form>

          <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{$exercise->operator}}</h2>
          <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">{{$exercise->name}}</h1>
          <p class="leading-relaxed mb-3">{{$exercise->description}}</p>
          <a href="{{route('exercises.show',$exercise)}}" 
          class="text-indigo-500 inline-flex items-center">
            S'entraîner
            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14"></path>
              <path d="M12 5l7 7-7 7"></path>
            </svg>
          </a>
          <div class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4">
            <span class="text-gray-400 inline-flex items-center leading-none text-sm">
              <svg class="w-4 h-4 mr-1 fill-current  text-gray-600 hover:text-red-700" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
              </svg>{{$exercise->quantity}}
            </span>
            
          </div>
        </div>
      </div>
    @empty
        
    @endforelse
    
    </div>
  </div>
</section>

</x-app-layout>
