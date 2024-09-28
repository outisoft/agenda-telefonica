<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('contacts.create') }}">Agregar</a>
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
                                        <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                                        <form action="{{ route('contacts.destroy', $contact->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure to delete this contact?')">Delete</button>
                                        </form>
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