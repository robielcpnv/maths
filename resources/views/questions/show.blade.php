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
              {{ $exercise->description }}
            </div>
        </div>
    </div>
</div>

<section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
      <form action="{{ route('exercises.store') }}" method="post" class="flex flex-wrap -m-2">
        @csrf
     
        @forelse ($questions as $question)

        <div class="p-2 w-1/2">
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label for="{{$question['id']}}" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                {{$question['first']."  ".$question->operation->name."  ".$question['second']."  =  "}}
              </label>
            </div>
            <div class="md:w-2/3">
              <input type="number" id="{{$question['id']}}" name="{{$question['id']}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
            </div>
          </div>
        </div>
       
        @empty
          
        @endforelse

        <div class="p-2 w-full">
          <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
            terminer
          </button>
        </div>
       
      </form>
    </div>
  </div>
</section>
  
</x-app-layout>
