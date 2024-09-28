<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('destinations.create') }}">Agregar</a>
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
                                        <a href="{{ route('destinations.edit', $destination->id) }}">Edit</a>
                                        <form action="{{ route('destinations.destroy', $destination->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure to delete this destination?')">Delete</button>
                                        </form>
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