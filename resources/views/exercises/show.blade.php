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

          @can('create', App\Question::class)
            <form method="POST" action="{{ route('exercises.questions.store',$exercise)}}" class="p-2 w-full"> 
              @csrf
                  <button type="submit"
                      class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                      Ajouter un devoir
                  </button>
            </form>
          @endcan

          
         <section class="text-gray-600 body-font">
  <div class="container px-5 py-8 mx-auto">
    <div class="flex flex-wrap -m-4">

      @forelse ($questions as $question)
      <div class="p-4 md:w-1/3 ">
        <div class="flex rounded-lg h-full bg-gray-50 p-8 flex-col hover:scale-110">


          <div class="absolute right-0 top-0 inline-flex p-2">

            @can('delete', App\Models\Question::find($question->first()->id))
              <form method="POST" action="{{ route('exercises.questions.destroy',[$exercise,App\Models\Question::find($question->first()->id)])}}"> 
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

          <div class="flex items-center mb-3">
            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
              </svg>
            </div>
            <h2 class="text-gray-900 text-lg title-font font-medium">{{$question->first()->answer ?'Terminer':'En cours'}}</h2>
          </div>
          <div class="flex-grow">
            <p class="leading-relaxed text-base">{{$question->first()->created_at->translatedFormat('jS F Y h:i')}}</p>
            @if ($question->first()->answer)
            <a href="{{route('questions.answers.show',[App\Models\Question::find($question->first()->id),App\Models\Answer::firstWhere('question_id',$question->first()->id)])}}"
              class="mt-3 text-indigo-500 inline-flex items-center">
              Résultat
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
              </a>
              @else
              <a href="{{route('exercises.questions.show',[$exercise,App\Models\Question::find($question->first()->id)])}}"
                class="mt-3 text-indigo-500 inline-flex items-center">
                S'entraîner
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
            @endif 
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

