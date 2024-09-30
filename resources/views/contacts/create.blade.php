<!--Modal create-->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">New Contact</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"></span></button>
            </div>

            <div class="modal-body">
              <form method="POST" action="{{ route('contacts.store') }}" >
                @csrf
                  <!-- Content ... -->

                  <!-- Name -->
                  <div class="mb-3">
                      <x-input-label class="label" for="name" :value="__('Name')" />
                      <div class="input-group input-group-merge">
                          <x-text-input id="name" class="form-control" type="text" name="name" placeholder="Andrea Garcia" :value="old('name')" required autofocus autocomplete="name" />
                      </div>
                      <x-input-error :messages="$errors->get('name')" class="mt-2" />
                  </div>

                  <!-- JOb -->
                  <div class="mb-3">
                      <x-input-label class="label" for="job" :value="__('Job')" />
                      <div class="input-group input-group-merge">
                          <x-text-input id="job" class="form-control" type="text" name="job" placeholder="Account Manager" :value="old('job')" required autocomplete="job" />
                      </div>
                      <x-input-error :messages="$errors->get('job')" class="mt-2" />
                  </div>

                  <!-- Department -->
                  <div class="mb-3">
                      <x-input-label class="label" for="department" :value="__('Department')" />
                      <div class="input-group input-group-merge">
                          <x-text-input id="department" class="form-control" type="text" name="department" placeholder="Human Resources" :value="old('department')" required autocomplete="department" />
                      </div>
                      <x-input-error :messages="$errors->get('department')" class="mt-2" />
                  </div>

                  <!-- Destination_id -->
                  <div class="mb-3">
                      <x-input-label class="label" for="destination_id" :value="__('Destination')" />
                      <div class="input-group input-group-merge">
                          <select name="destination_id" class="form-control" id="destination_id"
                              aria-label="Default select example">
                              @foreach ($destinations as $destination)
                                  <option value="{{ $destination->id }}">{{ $destination->name }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                      <x-input-error :messages="$errors->get('destination_id')" class="mt-2" />
                  </div>

                  <!-- Extension -->
                  <div class="mb-3">
                      <x-input-label class="label" for="extension" :value="__('Extension')" />
                      <div class="input-group input-group-merge">
                          <x-text-input id="extension" class="form-control" type="number" name="extension" placeholder="142536" :value="old('extension')" required autocomplete="extension" />
                      </div>
                      <x-input-error :messages="$errors->get('extension')" class="mt-2" />
                  </div>

                  <!-- Email -->
                  <div class="mb-3">
                      <x-input-label class="label" for="email" :value="__('Email')" />
                      <div class="input-group input-group-merge">
                          <x-text-input id="email" class="form-control" type="email" name="email" placeholder="email@example.com" :value="old('email')" required autocomplete="email" />
                      </div>
                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>

                  <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
            </div>
        </div>
    </div>
</div>