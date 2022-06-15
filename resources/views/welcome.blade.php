@extends('layouts.body')
@section('contents')
<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="p-6">
            <div class="flex items-center">
                <div class="ml-4 text-lg leading-7 font-semibold">
                    <a href="/reports/hierarchy"
                        class="underline text-gray-900 dark:text-white"><h2>Report 1</h2></a>
                </div>
            </div>

        </div>

        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
            <div class="flex items-center">
                <div class="ml-4 text-lg leading-7 font-semibold">
                    <a href="/reports/transaction"
                        class="underline text-gray-900 dark:text-white"><h2>Report 2</h2></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection