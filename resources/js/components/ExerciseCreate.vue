<template>
    <div class="p-2 w-full">
        <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">Titre</label>
            <input type="text" id="name" name="name"
                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
    </div>
    <div class="p-2 w-full">
        <div class="relative">
            <label for="description" class="leading-7 text-sm text-gray-600">Description</label>
            <textarea id="description" name="description"
                      class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
        </div>
    </div>
    <div class="p-2 w-1/3">
        <div class="relative">
            <label for="firstMin" class="leading-7 text-sm text-gray-600">Premier Min</label>
            <input type="number" id="firstMin" name="firstMin"
                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
    </div>
    <div class="p-2 w-1/3">
        <div class="relative">
            <label for="firstMax" class="leading-7 text-sm text-gray-600">Premier Max</label>
            <input type="number" id="firstMax" name="firstMax"
                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
    </div>
    <div class="p-2 w-1/3">
        <div class="relative">
            <label for="firstMultiplier" class="leading-7 text-sm text-gray-600">Premier
                Multiplicateur</label>
            <input type="number" id="firstMultiplier" name="firstMultiplier"
                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
    </div>
    <div class="p-2 w-1/2">
        <div class="relative">
            <label for="operation" class="leading-7 text-sm text-gray-600">Operation</label>

            <select id="operation" name="operation"
                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                <option v-for="operator in operators" :value="operator.slug">{{ operator.name }}</option>
            </select>
        </div>
    </div>
    <div class="p-2 w-1/2">
        <div class="relative">
            <label for="quantity" class="leading-7 text-sm text-gray-600">Quantity</label>
            <input type="number" id="quantity" name="quantity"
                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
    </div>
    <div class="p-2 w-1/3">
        <div class="relative">
            <label for="secondMin" class="leading-7 text-sm text-gray-600">Deuxième Min</label>
            <input type="number" id="secondMin" name="secondMin"
                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
    </div>
    <div class="p-2 w-1/3">
        <div class="relative">
            <label for="secondMax" class="leading-7 text-sm text-gray-600">Deuxième Max</label>
            <input type="number" id="secondMax" name="secondMax"
                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
    </div>
    <div class="p-2 w-1/3">
        <div class="relative">
            <label for="secondMultiplier" class="leading-7 text-sm text-gray-600">Deuxième
                Multiplicateur</label>
            <input type="number" id="secondMultiplier" name="secondMultiplier"
                   class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
    </div>
    <div class="p-2 w-full">
        <button type="submit"
                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
            Enregistrer
        </button>
    </div>
</template>

<script>
import axios from 'axios';
export default {
   data(){
    return {
        operators: [],
    }
   },mounted(){
    axios.get('/api/operations')
           .then(async response => {
              this.operators = await response.data.operations;
           })
   }
}
</script>
