<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exercises') }}
        </h2>
    </x-slot>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                modifier  un nouvel exercice
              </div>
          </div>
      </div>
  </div>

<section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
      <form action="{{ route('exercises.update',$exercise) }}" method="post" class="flex flex-wrap -m-2">
        @csrf
        @method('PUT')
        <div class="p-2 w-full">
          <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">Titre</label>
            <input type="text" id="name" name="name" value="{{$exercise->name}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-full">
          <div class="relative">
            <label for="description" class="leading-7 text-sm text-gray-600">Description</label>
            <textarea id="description" placeholder="{{$exercise->description}}" name="description" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          </div>
        </div>
        <div class="p-2 w-1/3">
          <div class="relative">
            <label for="firstMin" class="leading-7 text-sm text-gray-600">Premier Min</label>
            <input type="number" id="firstMin" name="firstMin" value="{{$exercise->firstMin}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/3">
          <div class="relative">
            <label for="firstMax" class="leading-7 text-sm text-gray-600">Premier Max</label>
            <input type="number" id="firstMax" name="firstMax" value="{{$exercise->firstMax}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/3">
          <div class="relative">
            <label for="firstMultiplier" class="leading-7 text-sm text-gray-600">Premier Multiplicateur</label>
            <input type="number" id="firstMultiplier" name="firstMultiplier" value="{{$exercise->firstMultiplier}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="operation" class="leading-7 text-sm text-gray-600">Operation</label>

            <select id="operation" name="operation" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 
            focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

             @foreach ($operations as $operation)
              <option value="{{ $operation->slug }}" {{$operation->id === $exercise->operation_id?'selected':''}}>{{ $operation->name }}</option>
             @endforeach
            </select>
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="quantity" class="leading-7 text-sm text-gray-600">Quantity</label>
            <input type="number" id="quantity" name="quantity" value="{{$exercise->quantity}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>

        <div class="p-2 w-1/3">
          <div class="relative">
            <label for="secondMin" class="leading-7 text-sm text-gray-600">Deuxième Min</label>
            <input type="number" id="secondMin" name="secondMin" value="{{$exercise->secondMin}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/3">
          <div class="relative">
            <label for="secondMax" class="leading-7 text-sm text-gray-600">Deuxième Max</label>
            <input type="number" id="secondMax" name="secondMax" value="{{$exercise->secondMax}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
  <div class="p-2 w-1/3">
        <div class="relative">
          <label for="secondMultiplier" class="leading-7 text-sm text-gray-600">Deuxième Multiplicateur</label>
          <input type="number" id="secondMultiplier" name="secondMultiplier" value="{{$exercise->secondMultiplier}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
      </div>
      </div>
        <div class="p-2 w-full">
          <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
            Sauvegarder
          </button>
        </div>
       
      </form>
    </div>
  </div>
</section>



</x-app-layout>
