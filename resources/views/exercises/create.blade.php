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
                    créer un nouvel exercice
                </div>
            </div>
        </div>
    </div>

    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <form action="{{ route('exercises.store') }}" method="post">
                  @csrf
                  <div class="flex flex-wrap -m-2" id="exercise-create">

                  </div>
                </form>
            </div>
        </div>
    </section>


</x-app-layout>
