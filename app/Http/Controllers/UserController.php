<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user): JsonResponse
    {
        return response()->json([
            'userData' => [
                'id' => $user->id,
                'name' => $user->name,
                'surname' => $user->surname,
                'age' => $user->age,
                'email' => $user->email,
            ],
        ]);
    }

    public function update(UpdateUserFormRequest $request, User $user): JsonResponse
    {
        $validated = $request->validated();
        $user->update($validated);

        return response()->json(['message' => 'updated successfully']);
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();
        return response()->json(['message' => 'The user has been deleted successfully']);
    }
}
