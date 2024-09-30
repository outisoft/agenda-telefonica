<x-app-layout>
@include('contacts.create')
@include('contacts.edit')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="#" class="btn-ico" data-toggle="modal" data-target="#modalCreate"
                        data-placement="top" title="Agregar Nuevo Registro">
                        <i class='bx bx-add-to-queue icon-lg'></i>
                    </a>

                    <table id="contacts" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __("Name") }}</th>
                                <th>{{ __("Job") }}</th>
                                <th>{{ __("Department") }}</th>
                                <th>{{ __("Destination") }}</th>
                                <th>{{ __("Extension") }}</th>
                                <th>{{ __("Email") }}</th>
                                <th>{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->job }}</td>
                                    <td>{{ $contact->department }}</td>
                                    <td>{{ $contact->destination->name }}</td>
                                    <td>{{ $contact->extension }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editModal{{ $contact->id }}" class="dropdown-item"><i class="bx bx-edit me-1"></i>Editar</a>
                                            
                                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item btn-danger"
                                                        onclick="return confirm('¿Estás seguro de eliminar este equipo?')"><i
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
                                <th>{{ __("Name") }}</th>
                                <th>{{ __("Job") }}</th>
                                <th>{{ __("Department") }}</th>
                                <th>{{ __("Destination") }}</th>
                                <th>{{ __("Extension") }}</th>
                                <th>{{ __("Email") }}</th>
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
    new DataTable('#contacts');
</script>
