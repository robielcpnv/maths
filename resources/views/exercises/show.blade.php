<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $exercise->name }}
        </h2>
    </x-slot>

    <div class="py-2">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900"> {{ $exercise->description }} </h1>
              </div>
          </div>
          <form method="POST" action="{{ route('exercises.questions.store',$exercise)}}" class="p-2 w-full"> 
            @csrf
                <button type="submit"
                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                    Ajouter un devoir
                </button>
           </form>
         <section class="text-gray-600 body-font">
  <div class="container px-5 py-8 mx-auto">
    <div class="flex flex-wrap -m-4">

      @forelse ($questions as $question)
      <div class="p-4 md:w-1/3">
        <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
          <div class="flex items-center mb-3">
            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
              </svg>
            </div>
            <h2 class="text-gray-900 text-lg title-font font-medium">Status</h2>
          </div>
          <div class="flex-grow">
            <p class="leading-relaxed text-base">date</p>
            <a href="{{route('exercises.questions.show',[$exercise,App\Models\Question::find($question->first()->id)])}}"
            class="mt-3 text-indigo-500 inline-flex items-center">
              
              S'entraîner
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      @empty
        
      @endforelse
      
    </div>
  </div>
</section>
      </div>
  </div>

 
 


</x-app-layout>
