<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">New Destination</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"></span></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('destinations.store') }}" class="mt-6 space-y-6">
                    @csrf
                    <!-- Name -->
                    <div class="mb-3">
                        <x-input-label class="label" for="name" :value="__('Name')" />
                        <div class="input-group input-group-merge">
                            <x-text-input id="name" class="form-control" type="text" name="name" placeholder="Bahia Principe Grand Tulum" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Country -->
                    <div>
                        <x-input-label class="label" for="country" :value="__('Country')" />
                        <div class="input-group input-group-merge">
                            <x-text-input id="country" class="form-control" type="text" name="country" placeholder="Mexico" :value="old('country')" required autocomplete="country" />
                        </div>
                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>