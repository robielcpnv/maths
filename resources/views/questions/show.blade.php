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
            @if ($question->operation->name !== '<>')
              <div class="md:w-1/3">
                <label for="{{$question['id']}}" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                  {{$question['first']."  ".$question->operation->name."  ".$question['second']."  =  "}}
                </label>
              </div>
              <div class="md:w-2/3">
                <input type="number" id="{{$question['id']}}" name="{{$question['id']}}" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
              </div>
            @else
              <div class="md:w-1/6">
                <p class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                  {{$question['first']}}
                </p>
              </div>
              <div class="md:w-2/3">

                <ul class="grid grid-cols-3 gap-x-5 m-10 max-w-md mx-auto">
                  <li class="relative">
                    <input class="sr-only peer" type="radio" value="greater" name="{{$question['id']}}" id="{{$question['id'].'greater'}}">
                    <label class="flex p-5 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-yellow-500 peer-checked:ring-2 peer-checked:border-transparent" 
                    for="{{$question['id'].'greater'}}">></label>
                
                  <li class="relative">
                    <input class="sr-only peer" type="radio" value="equal" name="{{$question['id']}}" id="{{$question['id'].'equal'}}">
                    <label class="flex p-5 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-green-500 peer-checked:ring-2 peer-checked:border-transparent" 
                    for="{{$question['id'].'equal'}}">=</label>
                
                  </li>
                
                  <li class="relative">
                    <input class="sr-only peer" type="radio" value="smaller" name="{{$question['id']}}" id="{{$question['id'].'smaller'}}">
                    <label class="flex p-5 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-red-500 peer-checked:ring-2 peer-checked:border-transparent" 
                    for="{{$question['id'].'smaller'}}"><</label>
                
                  </li>
                </ul>
              </div>
              <div class="md:w-1/6">
                  <p class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    {{$question['second']}}
                  </p>
              </div>
            @endif
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
