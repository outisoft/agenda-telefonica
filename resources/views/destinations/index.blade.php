<x-app-layout>
@include('destinations.create')
@include('destinations.edit')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="#" class="btn-ico" data-toggle="modal" data-target="#modalCreate"
                        data-placement="top" title="Agregar Nuevo Registro">
                        <i class='bx bx-add-to-queue icon-lg'></i>
                    </a>
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
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editModal{{ $destination->id }}" class="dropdown-item"><i class="bx bx-edit me-1"></i>Editar</a>
                                            
                                                <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item btn-danger"
                                                        onclick="return confirm('Are you sure to delete this destination?')"><i
                                                            class="bx bx-trash me-1"></i>Eliminar</button>
                                                </form>

                                            </div>
                                        </div>
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