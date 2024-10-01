@extends('layouts.agenda')

@section('title', 'Agenda Republica Dominicana')

@section('content')
    <header class="grid grid-cols-1 items-center gap-1 py-10 lg:grid-cols-3">
        <div class="flex lg:justify-center lg:col-start-2">
            <img src="{{ asset('images/logo_gp.png') }}" alt="Logo" class="responsive-img" id="logo">
        </div>
    </header>

    <main>
        <div class="search-container" id="search-container">
            <h2 class="text-xl text-black dark:text-white">Agenda Telefonica</h2>
            <input type="text" id="search" class="input-search" placeholder="Buscar..." autofocus>
        </div>

        <div id="results-container" class="mt-4 table-container" style="display: none;">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __("Name") }}</th>
                        <th>{{ __("Job") }}</th>
                        <th>{{ __("Department") }}</th>
                        <th>{{ __("Destination") }}</th>
                        <th>{{ __("Extension") }}</th>
                        <th>{{ __("Email") }}</th>
                        @if($isAuthenticated)
                            <th>{{ __("Actions") }}</th>
                            <th></th>
                        @endif
                    </tr>
                </thead>
                <tbody id="results-body"></tbody>
            </table>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const searchContainer = document.getElementById('search-container');
            const resultsContainer = document.getElementById('results-container');
            const resultsBody = document.getElementById('results-body');
            let isAuthenticated = {{ $isAuthenticated ? 'true' : 'false' }};

            searchInput.addEventListener('input', function() {
                if (this.value.length > 0) {
                    searchContainer.classList.remove('my-5');
                    fetch(`/search/dominicana?query=${encodeURIComponent(this.value)}`)
                        .then(response => response.json())
                        .then(data => {
                            resultsBody.innerHTML = '';
                            if (Array.isArray(data.contacts)) {
                                data.contacts.forEach(contact => {
                                    if (contact && typeof contact === 'object') {
                                        let row = `
                                            <tr>
                                                <td>${contact.name || 'N/A'}</td>
                                                <td>${contact.job || 'N/A'}</td>
                                                <td>${contact.department || 'N/A'}</td>
                                                <td>${contact.destination && contact.destination.name ? contact.destination.name : 'N/A'}</td>
                                                <td>${contact.extension || 'N/A'}</td>
                                                <td>${contact.email || 'N/A'}</td>
                                        `;
                                        if (data.isAuthenticated) {
                                            row += `
                                                <td>
                                                    <button class="btn btn-sm btn-primary" onclick="editModal(${contact.id})">Editar</button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-danger" onclick="deleteContact(${contact.id})">Eliminar</button>
                                                </td>
                                            `;
                                        }
                                        row += `</tr>`;
                                        resultsBody.innerHTML += row;
                                    } else {
                                        console.warn('Contacto inválido:', contact);
                                    }
                                });
                            } else {
                                console.error('La respuesta no contiene un array de contactos válido');
                            }
                            resultsContainer.style.display = 'block';
                        })
                        .catch(error => {
                            console.error('Error en la búsqueda:', error);
                        });
                } else {
                    searchContainer.classList.add('my-5');
                    resultsContainer.style.display = 'none';
                }
            });
        });
    </script>
    
@endsection