<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('日記作成') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('storeDiary') }}" method="post">
                    @csrf
                    <div class="p-6 text-gray-900">
                        <label for="content" class="block text-lg font-medium text-gray-700">
                        {{ __("タイトル") }}
                        </label>
                        <x-text-input type="text" name="title" maxlength="15"/>
                    </div>
                    <div class="p-6 text-gray-900">
                        <label for="content" class="block text-lg font-medium text-gray-700">
                        {{ __("内容") }}
                        </label>
                        <textarea name="content" id="content" rows="10" cols="50" class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                    </div>
                    
                    <div class="p-6 text-gray-900">
                        <x-primary-button>{{__("Save")}}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
