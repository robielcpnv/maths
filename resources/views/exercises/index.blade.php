<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exercises') }}
        </h2>
    </x-slot>
    
<section class="bg-gray-200 body-font">
  <div class="container px-5 py-8 mx-auto">
    @can('create', App\Exercise::class)
      <div class="p-2 w-full">
        <a href="{{ route('exercises.create' )}}">
          <button 
            class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
            Ajouter un exercice
          </button>
        </a>
      </div>
    @endcan
    <div class="flex flex-wrap -m-4 pt-5">
    @forelse ($exercises as $exercise )

    <div class="p-4 md:w-1/3 ">
      <div class="flex rounded-lg h-full bg-gray-50 p-8 flex-col hover:scale-110 ">
         
        <div class="absolute right-0 top-0 inline-flex p-2">

          @can('update', $exercise)
            <div class="px-2">
              <a href="{{ route('exercises.edit',$exercise)}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300 hover:text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
              </a>
            </div>
          @endcan

          @can('delete', $exercise)
          <form method="POST" action="{{ route('exercises.destroy',$exercise)}}"> 
            @csrf
            @method('delete')
              <button type="submit">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current text-gray-300 hover:text-red-700" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
         </form>
          @endcan

  
         
        </div>
        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{$exercise->operator}}</h2>
        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">{{$exercise->name}}</h1>
        <p class="leading-relaxed mb-3">{{$exercise->description}}</p>
       
          
          <div class="text-center mt-2 leading-none flex justify-center bottom-0 left-0 w-full">
            <span class="text-gray-400 inline-flex items-center leading-none text-sm">
              <a href="{{route('exercises.show',$exercise)}}" title="S'entraîner" 
              class="text-indigo-500 inline-flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500  hover:text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
              </svg>
              {{App\Models\Question::all()->where('exercise_id',$exercise->id)->groupBy('cycle')->count()}}
              </a>
              
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
