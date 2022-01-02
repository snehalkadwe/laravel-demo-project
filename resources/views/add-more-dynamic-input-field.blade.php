<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload File') }}
        </h2>
    </x-slot>
    @if (Session::has('success'))
        <x-success>
            {{ session()->get('success') }}
        </x-success>
    @endif
    @if (Session::has('error'))
        <x-error>
            {{ session()->get('error') }}
        </x-error>
    @endif
    @if ($errors->any())
        <div class="w-1/2 mx-auto p-4 mt-4 bg-red-100 text-red-600">
            <ul>
                @foreach ($errors->all() as $key => $error)
                <li>{{ $error }} - {{ $key }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="py-12">
        <h1 class="text-center mb-2">Ex to dynamically add input fields</h1>
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('add-more.store') }}" method="POST">
                        @csrf
                        <table class="table-auto" id="addNewFiled">
                            <tbody>
                                <tr>
                                    <td>
                                        <x-label for="product_name" :value="__('Product Name')" />
                                        <x-input id="product_name" type="text" name="newInputFields[0][product_name]"
                                            autocomplete="product_name" placeholder="product name" />
                                        {{-- <p id='s' class="absolute text-red-600 ">  {{ $errors->has('newInputFields.0.product_name') ? $errors->first('newInputFields.0.product_name') : ''}}
                                        </p> --}}
                                    </td>
                                    <td>
                                        <x-label for="cost" :value="__('Cost')" />
                                        <x-input class="ml-2" id="cost" type="number" name="newInputFields[0][cost]" autocomplete="cost" />
                                        {{-- <p class="absolute text-red-600">{{ $errors->has('newInputFields.0.cost') ? $errors->first('newInputFields.0.cost') : '' }} </p> --}}
                                    </td>
                                    <td>
                                        <button id="add-new-input" type="button"
                                            class="block ml-4 mt-4 px-4 text-lg rounded text-black border border-indigo-400 hover:text-white hover:bg-indigo-600">
                                            Add More
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <button type="submit"
                            class="mt-12 h-10 text-lg w-32 rounded text-black border border-indigo-400 hover:text-white hover:bg-indigo-600">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="text/javascript">
    var i = 0;
    $("#add-new-input").click(function() {
        ++i;
        $('#s').text(++i);
        $("#addNewFiled").append('<tr><td><input class="mt-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="product_name" type="text" name="newInputFields[' + i +'][product_name]" autocomplete="product_name"  placeholder="product name" /></td><td><input class="mt-2 ml-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="cost" type="text" name="newInputFields[' + i +'][cost]" autocomplete="cost"  placeholder="cost" /></td><td><button type="button" class="rounded bg-red-500 px-4 py-1 ml-4 text-white remove-new-field">Remove</button></td></tr>');
    });
    $(document).on('click', '.remove-new-field', function() {
        $(this).parents('tr').remove();
    });
</script>
