<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table id="destinations" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __("Destination") }}</th>
                                <th>{{ __("Country") }}</th>
                                <th>{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($destinations as $destination)
                                <tr>
                                    <td>{{ $destination->name }}</td>
                                    <td>{{ $destination->country }}</td>
                                    <td>
                                        <a href="">Edit</a>
                                        <a href="">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __("Destination") }}</th>
                                <th>{{ __("Country") }}</th>
                                <th>{{ __("Actions") }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    new DataTable('#destinations');
</script>