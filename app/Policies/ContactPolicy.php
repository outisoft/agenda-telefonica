<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        // Todos los usuarios autenticados pueden ver la lista de contactos
        return true;
    }

    public function view(User $user, Contact $contact)
    {
        // Los usuarios solo pueden ver contactos de su mismo destino,
        // a menos que sean admin o super-admin
        return $user->hasRole(['admin', 'super-admin']) || 
            $user->destination_id === $contact->destination_id;
    }

    public function create(User $user)
    {
        // Solo los usuarios con permiso 'create contacts' pueden crear contactos
        return $user->hasPermissionTo('create contacts');
    }

    public function update(User $user, Contact $contact)
    {
        // Solo los usuarios con permiso 'edit contacts' pueden editar contactos,
        // y solo si pertenecen al mismo destino (excepto admin y super-admin)
        return $user->hasPermissionTo('edit contacts') && 
            ($user->hasRole(['admin', 'super-admin']) || 
                $user->destination_id === $contact->destination_id);
    }

    public function delete(User $user, Contact $contact)
    {
        // Solo los usuarios con permiso 'delete contacts' pueden eliminar contactos,
        // y solo si pertenecen al mismo destino (excepto admin y super-admin)
        return $user->hasPermissionTo('delete contacts') && 
            ($user->hasRole(['admin', 'super-admin']) || 
                $user->destination_id === $contact->destination_id);
    }
}