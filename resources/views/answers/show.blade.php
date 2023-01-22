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

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto relative">


    <div class="lg:w-1/2 md:w-2/3 mx-auto relative">
      @php $answers = count($questions) @endphp
        @forelse ($questions as $question)
        <div class="p-2 w-1/2" data-aos="zoom-in" data-aos-easing="ease-in-sine">
          <div class="md:flex md:items-center mb-6">
            @if ($question->operation->name !== '<>')
              <div class="md:w-full">
                <p class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 px-4 text-left text-2xl">
                  {{$question['first']."  ".$question->operation->name."  ".$question['second']."  =  "}}
                  @if (App\Models\Answer::firstWhere('question_id',$question->id)->result !== $question['result'])
                  @php $answers--; @endphp
                  <span  class="text-red-600 text-3xl">
                    {{App\Models\Answer::firstWhere('question_id',$question->id)->result}} =>
                  </span>
                  @endif
                  <span  class="text-green-600 text-3xl"> {{$question['result']}} </span>

                </p>
              </div>
            @else
            <p class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 px-4 text-2xl">
              {{$question['first']}}
              @if (App\Models\Answer::firstWhere('question_id',$question->id) !== null && App\Models\Answer::firstWhere('question_id',$question->id)->result != $question['result'])
              <span  class="text-red-600 px text-3xl">
                {{App\Models\Answer::firstWhere('question_id',$question->id)->result}}
              </span>
              @endif
              <span  class="text-green-600 text-3xl"> {{$question['result']}} </span>
              {{$question['second']}}
            </p>
            @endif
        </div>
      </div>
        @empty

        @endforelse

        <div class="p-2 w-full">
          <a href="{{ route('exercises.index') }}">
            <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
              terminer
            </button>
          </a>
        </div>

    </div>

    <div class="absolute h-64 w-64 right-80 top-16 border-8 border-rose-600 rounded-full" id="answers-result">
      <div class="text-center p-6">
        <h1 class="text-7xl font-medium text-rose-600 pt-6 pl-16">{{$answers}}</h1>
        <hr class="border-rose-600 bg-rose-400 border-4 rotate-45">
        <h1 class="text-7xl font-medium text-rose-600 pr-16">{{count($questions)}}</h1>
      </div>
  </div>

      <script>
          gsap.fromTo("#answers-result",{scale:1},{
            scale:1.5, 
            duration: 1, 
            repeat: Infinity,
            easy:"elastic",
            direction:"alternate",
          });

      </script>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        offset: 50,
        delay: 10,
        duration: 1000,
        easing: 'ease-in-out',
        anchorPlacement: 'top-center',
    });
</script>
  </div>
</section>

</x-app-layout>
